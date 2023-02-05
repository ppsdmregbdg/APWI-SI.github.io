@extends('layouts.master')
@section('content')
<main id="main">
    <!-- ======= Blog Header ======= -->
    <div class="header-bg page-area">
      <div class="container position-relative">
        <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="slider-content text-center">
              <div class="header-bottom">
                <div class="layer2">
                  <h1 class="title2">E - Learning</h1>
                </div>
                <div class="layer3">
                  <h2 class="title3">Kumpulan Modul - PPSDM Regional Bandung</h2>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div><!-- End Blog Header -->

    <!-- ======= Blog Page ======= -->
    <div class="blog-page area-padding">
      <div class="container">
        <div class="row">
          <!-- Content -->
          <div class="col-md-8 col-sm-8 col-xs-12">
            <h5>{{ $title }}</h5>

            {{-- Hero elearnings --}}
            @if($moduls->count())
              <div class="row">
                @foreach ($moduls as $modul)
                <div class="card mb-3">
                <div class="card-body">
                  <div class="col-md-12">
                    <h5 class="card-title mt-1">
                      <img src="/assets/img/file-logo.png" heigth="30" width="30">
                      {{ $modul->title }}
                      <a href="{{ asset( 'storage/' . $modul->file) }}" class="badge bg-success" download="">Download</a>
                    </h5>
                    <span class="mx-2">
                      <i class="bi bi-folder"></i>
                      in <a href="/elearnings?articlecategory={{ $modul->articlecategory->slug }}" class="text-danger">{{ $modul->articlecategory->name }}</a>
                    </span>
                    <span class="text-muted">
                      <i class="bi bi-calendar"></i>
                      {{ $modul->created_at->diffForHumans() }}
                    </span>
                  </div>
                </div>
              </div>
                @endforeach
              </div>
            @else
              <p>Modul Not Found</p>
            @endif
            {{ $moduls->appends($_GET)->links() }}
          </div>
          <div class="col-lg-4 col-md-4">
            @include('dashboard.elearning.partials.sidebar')
          </div>
        </div>
      </div>
    </div><!-- End Blog Page -->

  </main><!-- End #main -->
@endsection