@extends('layouts/layoutMaster')

@section('title', 'Add User - Apps')

@section('vendor-style')
<link rel="stylesheet" href="{{ asset('assets/vendor/libs/select2/select2.css') }}" />
@endsection

@section('vendor-script')
<script src="{{ asset('assets/vendor/libs/select2/select2.js') }}"></script>
@endsection

@section('content')
<h4 class="py-3 mb-4">
  <span class="text-muted fw-light">User /</span> Add
</h4>

<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Add User</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('user.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" id="name" name="name" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" id="email" name="email" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="phone_number" class="form-label">Phone Number</label>
                            <input type="text" id="phone_number" name="phone_number" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="role_name" class="form-label">Role</label>
                            <select id="role_name" name="role_name" class="form-select" required>
                                @foreach($roles as $role)
                                <option value="{{ $role->role_type }}">{{ $role->role_type }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="department" class="form-label">Department</label>
                            <select id="department" name="department" class="form-select" required>
                                @foreach($departments as $department)
                                <option value="{{ $department->IDDepartement }}">{{ $department->NomDepartement }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" id="password" name="password" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="password_confirmation" class="form-label">Confirm Password</label>
                            <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Add User</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
