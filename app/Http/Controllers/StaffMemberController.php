<?php

namespace App\Http\Controllers;

use App\Models\Designation;
use App\Models\StaffMember;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;

class StaffMemberController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //all actions requires login
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $staffMembers = StaffMember::paginate(Config::get('constants.DEFAULT_RPP'));
        return view('staff_members.index', [
            'staffMembers' => $staffMembers,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $designations = Designation::getList();
        return view('staff_members.create', compact('designations'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request, [
            'designation_id' => 'required|exists:designations,id',
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'nullable|email',
            'gender' => 'in:M,F',
            'birthdate' => 'nullable|date',
        ]);

        try {
            StaffMember::add($request->except('_token'));
            return back()->with('success', 'Staff member has been added');
        } catch (\Throwable $th) {
            return back()->withErrors([$th->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $staff = StaffMember::find($id);
        return view('staff_members.show', compact('staff'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //get object
        $designations = Designation::getList();
        $staff = StaffMember::find($id);
        return view('staff_members.edit', compact('designations', 'staff'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $this->validate($request, [
            'designation_id' => 'required|exists:designations,id',
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'nullable|email',
            'gender' => 'in:M,F',
            'birthdate' => 'nullable|date',
        ]);

        $staff = StaffMember::find($id);
        try {
            $staff->safeUpdate($request->except(['_method', '_token']));
            return redirect()
                ->route('staff_members.index')
                ->with('success', 'Staff member has been updated');
        } catch (\Throwable $th) {
            return back()->withErrors([$th->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //get object
        $staff = StaffMember::find($id);
        try {
            $staff->delete();
            return redirect()
                ->route('staff_members.index')
                ->with('success', 'Staff member has been deleted');
        } catch (\Throwable $th) {
            return back()->withErrors('Staff member can not be delete');
        }
    }
}
