@extends('layouts.admin')

@section('title', 'Edit Contact')

@section('content')
<div class="app-content-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <h3>Edit Contact</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('contacts.index') }}">Contacts</a></li>
                    <li class="breadcrumb-item active">Edit</li>
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
                        <h3 class="card-title">Edit Contact</h3>
                    </div>
                    <form action="{{ route('contacts.update', $contact->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="card-body">
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <div class="form-group">
                                <label for="type">Type</label>
                                <select name="type" id="type" class="form-control" required>
                                    <option value="phone" {{ old('type', $contact->type) == 'phone' ? 'selected' : '' }}>Phone</option>
                                    <option value="email" {{ old('type', $contact->type) == 'email' ? 'selected' : '' }}>Email</option>
                                    <option value="address" {{ old('type', $contact->type) == 'address' ? 'selected' : '' }}>Address</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="label">Label</label>
                                <input type="text" name="label" id="label" class="form-control" value="{{ old('label', $contact->label) }}" required>
                            </div>
                            <div class="form-group">
                                <label for="value">Value</label>
                                <textarea name="value" id="value" class="form-control" rows="3" required>{{ old('value', $contact->value) }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="icon">Icon</label>
                                <div class="d-flex align-items-center">
                                    <select name="icon" id="icon" class="form-control me-3" onchange="updateIconPreview()">
                                        <option value="fas fa-phone" {{ old('icon', $contact->icon) == 'fas fa-phone' ? 'selected' : '' }}>📞 Phone</option>
                                        <option value="fas fa-envelope" {{ old('icon', $contact->icon) == 'fas fa-envelope' ? 'selected' : '' }}>✉️ Email</option>
                                        <option value="fas fa-map-marker-alt" {{ old('icon', $contact->icon) == 'fas fa-map-marker-alt' ? 'selected' : '' }}>📍 Location</option>
                                    </select>
                                    <i id="icon-preview" class="{{ old('icon', $contact->icon) }}" style="font-size: 1.5rem;"></i>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="sort_order">Sort Order</label>
                                <input type="number" name="sort_order" id="sort_order" class="form-control" value="{{ old('sort_order', $contact->sort_order) }}">
                            </div>
                            <div class="form-group">
                                <label for="status">Status</label>
                                <select name="status" id="status" class="form-control">
                                    <option value="active" {{ old('status', $contact->status) == 'active' ? 'selected' : '' }}>Active</option>
                                    <option value="inactive" {{ old('status', $contact->status) == 'inactive' ? 'selected' : '' }}>Inactive</option>
                                </select>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Update</button>
                            <a href="{{ route('contacts.index') }}" class="btn btn-secondary">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function updateIconPreview() {
        const selectedIcon = document.getElementById('icon').value;
        const iconPreview = document.getElementById('icon-preview');
        iconPreview.className = selectedIcon;
    }
</script>
@endsection
