@extends('dashboardAdmin.layouts.master-dashboard')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Edit Category</h1>
    </div>
    <div class="col-lg-8 mb-4">
        <form action="/dashboard/articlecategories/{{ $articlecategory->slug }}" method="POST">
            @method('patch')
            @csrf
            <div class="mb-3">
              <label for="name" class="form-label">Category Name<span class="text-danger">*</span></label>
              <input type="text" class="form-control  @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $articlecategory->name) }}" required>
              @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
              @enderror
            </div>
            <div class="mb-3">
              <label for="slug" class="form-label">Slug<span class="text-danger">*</span></label>
              <input type="text" class="form-control  @error('slug') is-invalid @enderror" id="slug" name="slug" value="{{ old('slug', $articlecategory->slug) }}" required>
              @error('slug')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
              @enderror
            </div>
            
            <button type="submit" class="btn btn-primary">Update Category</button>
        </form>
    </div>
    <script>
        const name = document.querySelector('#name');
        const slug = document.querySelector('#slug');

        name.addEventListener('change', function() {
            fetch('/dashboard/articlecategories/checkSlug?name=' + name.value)
                .then(response => response.json())
                .then(data => slug.value = data.slug)
        });
        
    </script>
@endsection