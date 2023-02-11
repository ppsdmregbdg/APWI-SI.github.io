@extends('dashboardAdmin.layouts.master-dashboard')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">All Modules</h1>
    </div>
    <div class="table-responsive col-lg-8 mb-4">
        <a href="/dashboard/moduls/create" class="btn btn-primary mb-3">Add New Module</a>
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col" class="text-center">#</th>
              <th scope="col" class="text-center">Title</th>
              <th scope="col" class="text-center">Category</th>
              <th scope="col" class="text-center">File</th>
              <th scope="col" class="text-center">Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach($moduls as $modul)
                <tr>
                    <td class="px-2">{{ $loop->iteration }}.</td>
                    <td class="px-2">{{ $modul->title }}</td>
                    <td class="px-2">{{ $modul->articlecategory->name }}</td>
                    <td class="px-2"><a href="{{ asset( 'storage/' . $modul->file) }}" class="badge bg-success" download="">Download</a></td>
                    <td>   
                        <a href="/dashboard/moduls/{{ $modul->slug }}/edit" class="badge bg-warning"><span data-feather="edit"></span></a>
                        <form action="/dashboard/moduls/{{ $modul->slug }}" method="POST" class="d-inline">
                            @method('delete')
                            @csrf
                            <button class="badge bg-danger border-0" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')"><span data-feather="x-circle"></span></button>
                        </form>  
                    </td>  
                </tr>
            @endforeach
          </tbody>
        </table>
    </div>
    <div class="d-flex">
      {{ $moduls->links() }}
    </div>
@endsection