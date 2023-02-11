@extends('dashboardAdmin.layouts.master-dashboard')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">All Admins</h1>
    </div>
    <div class="table-responsive col-lg-6 mb-4">
        <a href="/dashboard/admins/create" class="btn btn-primary mb-3">Create New Admin</a>
        <a href="/dashboard.admins.editPassword" class="btn btn-warning mb-3 mx-2 text-white">Change My Password</a>
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col" class="text-center">#</th>
              <th scope="col" class="text-center">Name</th>
              <th scope="col" class="text-center">Username</th>
              <th scope="col" class="text-center">Email</th>
              <th scope="col" class="text-center">Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach($admins as $admin)
                <tr>
                    <td class="px-2">{{ $loop->iteration }}.</td>
                    <td class="px-2">{{ $admin->name }}</td>
                    <td class="px-2">{{ $admin->username }}</td>
                    <td class="px-2">{{ $admin->email }}</td>
                    <td>
                        <a href="/dashboard/admins/{{ $admin->id }}/edit" class="badge bg-warning"><span data-feather="edit"></span></a>
                        <form action="/dashboard/admins/{{ $admin->id }}" method="POST" class="d-inline">
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
      {{ $admins->links() }}
    </div>
@endsection