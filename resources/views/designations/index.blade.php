@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <a class="btn btn-primary float-right" href="{{ route('designations.create') }}">Create New</a>

            <h3 class="text-primary">Designations</h3>
            <div class="section">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Type</th>
                                <th>Total Staff</th>
                                <th>Created</th>
                                <th>Updated</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($designations as $record)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $record->name }}</td>
                                <td>{{ $record->type }}</td>
                                <td>{{ $record->staff_members->count() }}</td>
                                <td>{{ $record->created_at->format('d-m-Y') }}</td>
                                <td>{{ $record->updated_at->format('d-m-Y') }}</td>
                                <td>
                                    <div class="actions">
                                        <a class="btn btn-outline-secondary btn-sm action"
                                            href="{{ route('designations.edit', $record->id) }}">
                                            <i class="material-icons">edit</i>
                                        </a>
                                        {{ Form::open(['method' => 'delete', 'route' => ['designations.destroy', $record], 'class' => 'form-confirm'])}}
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
                {{ $designations->links() }}
            </div>
        </div>
    </div>
</div>
@endsection