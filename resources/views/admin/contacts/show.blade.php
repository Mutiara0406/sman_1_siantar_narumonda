@extends('layouts.admin')

@section('title', 'View Contact')

@section('content')
<div class="app-content-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <h3>View Contact</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('contacts.index') }}">Contacts</a></li>
                    <li class="breadcrumb-item active">View</li>
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
                        <h3 class="card-title">Contact Details</h3>
                    </div>
                    <div class="card-body">
                        <p><strong>Type:</strong> {{ $contact->type }}</p>
                        <p><strong>Label:</strong> {{ $contact->label }}</p>
                        <p><strong>Value:</strong> {{ $contact->value }}</p>
                        <p><strong>Icon:</strong> <i class="{{ $contact->icon }}" style="font-size: 1.5rem;"></i></p>
                        <p><strong>Sort Order:</strong> {{ $contact->sort_order }}</p>
                        <p><strong>Status:</strong> <span class="badge bg-{{ $contact->status == 'active' ? 'success' : 'danger' }}">{{ ucfirst($contact->status) }}</span></p>
                    </div>
                    <div class="card-footer">
                        <a href="{{ route('contacts.index') }}" class="btn btn-secondary">Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
