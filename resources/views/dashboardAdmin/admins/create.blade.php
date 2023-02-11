@extends('dashboardAdmin.layouts.master-dashboard')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Create New Admin</h1>
    </div>
    <div class="col-lg-8 mb-4">
        <form action="/dashboard/admins" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
              <label for="name" class="form-label">Name<span class="text-danger">*</span></label>
              <input type="text" class="form-control  @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" required>
              @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
              @enderror
            </div>
            <div class="mb-3">
              <label for="username" class="form-label">Username<span class="text-danger">*</span></label>
              <input type="text" class="form-control  @error('username') is-invalid @enderror" id="username" name="username" value="{{ old('username') }}" required>
              @error('username')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
              @enderror
            </div>
            <div class="mb-3">
              <label for="username" class="form-label">E-mail<span class="text-danger">*</span></label>
              <input type="email" class="form-control  @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" required>
              @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
              @enderror
            </div>
            <div class="mb-3">
              <label for="password" class="form-label">Password<span class="text-danger">*</span></label>
              <input type="password" class="form-control  @error('password') is-invalid @enderror" id="password" name="password" required>
              @error('password')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
              @enderror
            </div>
            
            <button type="submit" class="btn btn-primary">Create Admin</button>
        </form>
    </div>
@endsection