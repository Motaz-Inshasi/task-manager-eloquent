@extends('layout.app')

@section('content')
    <h1 class="mt-4">Users</h1>

    <div class="row">
        <div class="col-md-8 offset-md-2">

            @if (isset($user))
                <div class="card mb-4">
                    <div class="card-header">Update User</div>
                    <div class="card-body">
                        <form action="{{ url('users/update') }}" method="POST">
                            @csrf
                            <input type="hidden" name="id" value="{{ $user->id }}">
                            <div class="mb-3">
                                <label for="user-name" class="form-label">Name</label>
                                <input type="text" name="name" id="user-name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $user->name) }}">
                                @error('name')
                                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="user-email" class="form-label">Email</label>
                                <input type="text" name="email" id="user-email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email', $user->email) }}">
                                @error('email')
                                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="user-password" class="form-label">New Password (leave empty to keep the current one)</label>
                                <input type="password" name="password" id="user-password" class="form-control @error('password') is-invalid @enderror">
                                @error('password')
                                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary">
                                <i class="fa fa-plus me-1"></i> Update User
                            </button>
                        </form>
                    </div>
                </div>
            @else
                <div class="card mb-4">
                    <div class="card-header">New User</div>
                    <div class="card-body">
                        <form action="{{ url('users/create') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="user-name" class="form-label">Name</label>
                                <input type="text" name="name" id="user-name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}">
                                @error('name')
                                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="user-email" class="form-label">Email</label>
                                <input type="text" name="email" id="user-email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}">
                                @error('email')
                                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="user-password" class="form-label">Password</label>
                                <input type="password" name="password" id="user-password" class="form-control @error('password') is-invalid @enderror">
                                @error('password')
                                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary">
                                <i class="fa fa-plus me-1"></i> Add User
                            </button>
                        </form>
                    </div>
                </div>
            @endif

            <div class="card mb-4">
                <div class="card-header">Current Users</div>
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    <form action="{{ url('users/delete/' . $user->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        <button type="submit" class="btn btn-danger">
                                            <i class="fa fa-trash me-1"></i> Delete
                                        </button>
                                    </form>
                                    <form action="{{ url('users/edit/' . $user->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        <button type="submit" class="btn btn-info">
                                            <i class="fa fa-info me-1"></i> Edit
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
@endsection
