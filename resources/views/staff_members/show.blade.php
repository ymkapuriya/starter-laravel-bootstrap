@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card justify-content-center">
                <div class="card-header text-primary text-bold">
                    <h4>
                        Staff Member Detail
                        <a class="btn btn-outline-primary float-right"
                            href="{{ route('staff_members.index') }}">Back</a>
                    </h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-8">
                            @include('components.view.info', [
                            'label' => 'Name of Staff',
                            'content' => $staff->full_name,
                            'classes' => 'text-primary'
                            ])
                        </div>
                        <div class="col-md-4">
                            @include('components.view.info', [
                            'label' => 'Designation',
                            'content' => $staff->designation->name,
                            ])
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-8">
                            @include('components.view.info', [
                            'label' => 'Email Address',
                            'content' => $staff->email,
                            'classes' => 'text-secondary'
                            ])
                        </div>
                        <div class="col-md-4">
                            @include('components.view.info', [
                            'label' => 'Phone',
                            'content' => $staff->phone,
                            ])
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            @include('components.view.info', [
                            'label' => 'Birthdate',
                            'content' => $staff->formatted_birthdate,
                            ])
                        </div>
                        <div class="col-md-4">
                            @include('components.view.info', [
                            'label' => 'Qualification',
                            'content' => $staff->qualification,
                            ])
                        </div>
                        <div class="col-md-4">
                            @include('components.view.info', [
                            'label' => 'Gender',
                            'content' => $staff->full_gender,
                            ])
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <a class="btn btn-secondary btn-sm action"
                        href="{{ route('staff_members.edit', $staff->id) }}">
                        <i class="material-icons">edit</i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection