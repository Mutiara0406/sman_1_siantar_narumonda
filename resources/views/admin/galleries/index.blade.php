@extends('layouts.admin')

@section('title', 'Galleries')

@section('content')
<div class="app-content-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <h3>Galleries</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item active">Galleries</li>
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
                        <h3 class="card-title">List of Galleries</h3>
                        <div class="card-tools">
                            <a href="{{ route('galleries.create') }}" class="btn btn-primary btn-sm">Create New</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Title</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($galleries as $gallery)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $gallery->title }}</td>
                                    <td>
                                        <a href="{{ route('galleries.show', $gallery->id) }}" class="btn btn-info btn-sm">View</a>
                                        <a href="{{ route('galleries.edit', $gallery->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                        <form action="{{ route('galleries.destroy', $gallery->id) }}" method="POST" style="display:inline-block;">
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
                        {{ $galleries->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
