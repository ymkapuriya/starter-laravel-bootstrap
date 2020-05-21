@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <a class="btn btn-primary float-right" href="{{ route('staff_members.create') }}">Create New</a>

            <h3 class="text-primary">Staff List</h3>
            <div class="section">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Designation</th>
                                <th>Gender</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Birthdate</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($staffMembers as $record)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $record->full_name }}</td>
                                <td>{{ $record->designation->name }}</td>
                                <td>{{ $record->gender }}</td>
                                <td>{{ $record->email }}</td>
                                <td>{{ $record->phone }}</td>
                                <td>{{ $record->formatted_birthdate }}</td>
                                <td>
                                    <div class="actions">
                                        <a class="btn btn-outline-primary btn-sm action"
                                            href="{{ route('staff_members.show', $record->id) }}">
                                            <i class="material-icons">info</i>
                                        </a>
                                        <a class="btn btn-outline-secondary btn-sm action"
                                            href="{{ route('staff_members.edit', $record->id) }}">
                                            <i class="material-icons">edit</i>
                                        </a>
                                        {{ Form::open(['method' => 'delete', 'route' => ['staff_members.destroy', $record], 'class' => 'form-confirm'])}}
                                        <button type="submit" class="btn btn-outline-danger btn-sm action">
                                            <i class="material-icons">delete</i>
                                        </button>
                                        {{ Form::close() }}
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="section">
                {{ $staffMembers->links() }}
            </div>
        </div>
    </div>
</div>
@endsection