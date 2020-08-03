@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            {{ Form::model($staff, ['route' => ['staff_members.update', $staff->id], 'method' => 'PATCH']) }}
            <div class="card justify-content-center">
                <div class="card-header text-primary text-bold">
                    <h4>
                        Update Staff Member
                        <a class="btn btn-outline-primary float-right"
                            href="{{ route('staff_members.index') }}">Back</a>
                    </h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            {{ Form::mySelect('designation_id', $staff->designation_id, $designations) }}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            {{ Form::myText('first_name') }}
                        </div>
                        <div class="col-md-4">
                            {{ Form::myText('middle_name') }}
                        </div>
                        <div class="col-md-4">
                            {{ Form::myText('last_name') }}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-8">
                            {{ Form::myEmail('email') }}
                        </div>
                        <div class="col-md-4">
                            {{ Form::myMobile('phone', $staff->phone) }}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            {{ Form::myDate('birthdate', $staff->birthdate) }}
                        </div>
                        <div class="col-md-4">
                            {{ Form::myText('qualification') }}
                        </div>
                        <div class="col-md-4">
                            {{ Form::mySelect('gender', $staff->gender, ['M' => 'Male', 'F' => 'Female']) }}
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    {{ Form::submit('Save', ['class' => 'btn btn-primary']) }}
                </div>
            </div>
            {{ Form::close() }}
        </div>
    </div>
</div>
@endsection