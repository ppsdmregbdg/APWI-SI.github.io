@extends('dashboardAdmin.layouts.master-dashboard')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">All Categories</h1>
    </div>
    <div class="table-responsive col-lg-6 mb-4">
        <a href="/dashboard/articlecategories/create" class="btn btn-primary mb-3">Create New Category</a>
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Category Name</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach($articlecategories as $articlecategory)
                <tr>
                    <td>{{ $loop->iteration }}.</td>
                    <td>{{ $articlecategory->name }}</td>
                    <td>
                        <a href="/dashboard/articlecategories/{{ $articlecategory->slug }}/edit" class="badge bg-warning"><span data-feather="edit"></span></a>
                        <form action="/dashboard/articlecategories/{{ $articlecategory->slug }}" method="POST" class="d-inline">
                            @method('delete')
                            @csrf
                            <button class="badge bg-danger border-0" onclick="return confirm('Menghapus kategori ini akan menghapus keseluruhan data juga!')"><span data-feather="x-circle"></span></button>
                        </form>  
                    </td>  
                </tr>
            @endforeach
          </tbody>
        </table>
        <div class="d-flex">
            {{ $articlecategories->links() }}
        </div>
    </div>
@endsection