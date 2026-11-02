@extends('layouts.admin')

@section('title', 'Contacts')

@section('content')
<div class="app-content-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <h3>Contacts</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item active">Contacts</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="app-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">List of Contacts</h3>
                        <div class="card-tools">
                            <a href="{{ route('contacts.create') }}" class="btn btn-primary btn-sm">Create New</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Type</th>
                                    <th>Label</th>
                                    <th>Value</th>
                                    <th>Icon</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($contacts as $contact)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $contact->type }}</td>
                                    <td>{{ $contact->label }}</td>
                                    <td>{{ $contact->value }}</td>
                                    <td>
                                        @if ($contact->icon)
                                            <i class="{{ $contact->icon }}" style="font-size: 1.5rem;"></i>
                                        @else
                                            <span class="text-muted">No Icon</span>
                                        @endif
                                    <td>
                                        <span class="badge bg-{{ $contact->status == 'active' ? 'success' : 'danger' }}">
                                            {{ ucfirst($contact->status) }}
                                        </span>
                                    </td>
                                    <td>
                                        <a href="{{ route('contacts.show', $contact->id) }}" class="btn btn-info btn-sm">View</a>
                                        <a href="{{ route('contacts.edit', $contact->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                        <form action="{{ route('contacts.destroy', $contact->id) }}" method="POST" style="display:inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer">
                        {{ $contacts->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection