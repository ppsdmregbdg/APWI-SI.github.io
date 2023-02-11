@extends('dashboardAdmin.layouts.master-dashboard')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Edit Password</h1>
    </div>
    <div class="col-lg-8 mb-4">
        <form action="{{ route('change.password') }}" method="POST">
            @csrf
            <div class="mb-3">
              <label for="current_password" class="form-label">Current Password<span class="text-danger">*</span></label>
              <input type="password" class="form-control  @error('current_password') is-invalid @enderror" id="password" name="current_password" required>
              @error('current_password')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
              @enderror
            </div>
            <div class="mb-3">
              <label for="new_password" class="form-label">New Password<span class="text-danger">*</span></label>
              <input type="password" class="form-control  @error('new_password') is-invalid @enderror" id="new_password" name="new_password" required>
              @error('new_password')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
              @enderror
            </div>
            <div class="mb-3">
              <label for="new_confirm_password" class="form-label">Confirm New Password<span class="text-danger">*</span></label>
              <input type="password" class="form-control  @error('new_confirm_password') is-invalid @enderror" id="new_confirm_password" name="new_confirm_password" required>
              @error('new_confirm_password')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
              @enderror
            </div>
            
            <button type="submit" class="btn btn-primary">Update Admin</button>
        </form>
    </div>
@endsection