@extends('dashboardAdmin.layouts.master-dashboard')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Welcome Back, {{ auth()->user()->name }}</h1>
    </div>
    <div class="row">
        <div class="col-xl-3 col-md-6">
            <div class="card bg-success text-white mb-4">
                <div class="card-body">
                    <p class="fs-2 d-inline opacity-25">
                        <i data-feather="file-text" class="" style="width: 50px; height: 50px;"></i>
                    </p>
                    <p class="fs-2 d-inline mx-2">{{ $articles->count() }}</p>
                    <p class="fs-5 d-inline">Articles</p>
                </div>
                <div class="card-footer d-flex align-items-center justify-content-center">
                    <a class="small text-white text-decoration-none" href="/dashboard/articles">View more <i data-feather="arrow-right-circle"></i></a>
                    <div class="small text-white"></div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-warning text-white mb-4">
                <div class="card-body">
                    <p class="fs-2 d-inline opacity-25">
                        <i data-feather="file" class="" style="width: 50px; height: 50px;"></i>
                    </p>
                    <p class="fs-2 d-inline mx-2">{{ $moduls->count() }}</p>
                    <p class="fs-5 d-inline">Moduls</p>
                </div>
                <div class="card-footer d-flex align-items-center justify-content-center">
                    <a class="small text-white text-decoration-none" href="/dashboard/moduls">View more <i data-feather="arrow-right-circle"></i></a>
                    <div class="small text-white"></div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-danger text-white mb-4">
                <div class="card-body">
                    <p class="fs-2 d-inline opacity-25">
                        <i data-feather="play" class="" style="width: 50px; height: 50px;"></i>
                    </p>
                    <p class="fs-2 d-inline mx-2">{{ $videos->count() }}</p>
                    <p class="fs-5 d-inline">Videos</p>
                </div>
                <div class="card-footer d-flex align-items-center justify-content-center">
                    <a class="small text-white text-decoration-none" href="/dashboard/videos">View more <i data-feather="arrow-right-circle"></i></a>
                    <div class="small text-white"></div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-primary text-white mb-4">
                <div class="card-body">
                    <p class="fs-2 d-inline opacity-25">
                        <i data-feather="users" class="" style="width: 50px; height: 50px;"></i>
                    </p>
                    <p class="fs-2 d-inline mx-2">{{ $admins->count() }}</p>
                    <p class="fs-5 d-inline">Admins</p>
                </div>
                <div class="card-footer d-flex align-items-center justify-content-center">
                    <a class="small text-white text-decoration-none" href="/dashboard/admins">View more <i data-feather="arrow-right-circle"></i></a>
                    <div class="small text-white"></div>
                </div>
            </div>
        </div>
    </div>
@endsection