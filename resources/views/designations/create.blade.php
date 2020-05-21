@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            {{ Form::open(['route' => 'designations.store', 'method' => 'POST']) }}
            <div class="card justify-content-center">
                <div class="card-header text-primary text-bold">
                    <h4>
                        Create New Designation
                        <a class="btn btn-outline-primary float-right" href="{{ route('designations.index') }}">Back</a>
                    </h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            {{ Form::myText('name') }}
                        </div>
                        <div class="col-md-6">
                            <?php
                            $options = Config::get('constants.DESIGNATION_TYPE');
                            ?>
                            {{ Form::mySelect('type', '', $options) }}
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