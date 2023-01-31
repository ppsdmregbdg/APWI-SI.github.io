@extends('dashboardAdmin.layouts.master-dashboard')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Add New Modul</h1>
    </div>
    <div class="col-lg-8 mb-4">
        <form action="/dashboard/moduls" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
              <label for="title" class="form-label">Title<span class="text-danger">*</span></label>
              <input type="text" class="form-control  @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title') }}" required>
              @error('title')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
              @enderror
            </div>
            <div class="mb-3">
              <label for="slug" class="form-label">Slug<span class="text-danger">*</span></label>
              <input type="text" class="form-control  @error('slug') is-invalid @enderror" id="slug" name="slug" value="{{ old('slug') }}" required>
              @error('slug')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
              @enderror
            </div>
            <div class="mb-3">
                <label for="articlecategory" class="mb-2"> Category <span class="text-danger">*</span></label><br />
                <select class="form-select" name="articlecategory_id">
                    @foreach($articlecategories as $articlecategory)
                        @if(old('articlecategory_id') == $articlecategory->id)
                            <option value="{{ $articlecategory->id }}" selected>{{ $articlecategory->name }}</option>
                        @else
                            <option value="{{ $articlecategory->id }}">{{ $articlecategory->name }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="file" class="mb-2"> Modul File <span class="text-danger">*</span></label><br />
                <input type="file" id="file" name="file" class="form-control @error('file') is-invalid @enderror" value="{{ old('file') }}" required />
                <small class="text-muted">Maximal Images 1 Mb</small>
                @error('file')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Upload</button>
        </form>
    </div>
    <script>
        const title = document.querySelector('#title');
        const slug = document.querySelector('#slug');

        title.addEventListener('change', function() {
            fetch('/dashboard/articles/checkSlug?title=' + title.value)
                .then(response => response.json())
                .then(data => slug.value = data.slug)
        });

        document.addEventListener('trix-file-accept', function(e) {
            e.preventDefault();
        });
    </script>
@endsection