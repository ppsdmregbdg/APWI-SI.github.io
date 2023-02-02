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
                  <h2 class="title3">Kumpulan Video - PPSDM Regional Bandung</h2>
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
            @if($videos->count())
            <div class="row">
            @foreach ($videos as $video)
              <div class="row col-md-6 mx-0">
                <div class="card mb-3">
                  <div class="card-body">
                    <div class="col-md-12">
                      <h5 class="card-title mt-1">
                        <iframe class="col-md-12" width="280" height="150" src="{{ $video->link }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                      </h5>
                      <span class="mx-2">
                        <i class="bi bi-folder"></i>
                        in <a href="/videos?articlecategory={{ $video->articlecategory->slug }}" class="text-danger">{{ $video->articlecategory->name }}</a>
                      </span>
                      <span class="text-muted">
                        <i class="bi bi-calendar"></i>
                        {{ $video->created_at->diffForHumans() }}
                      </span>
                      <h5 class="mt-2">{{ $video->title }}</h5>
                    </div>
                  </div>
                </div>
              </div>
              @endforeach
            </div>
            @else
              <p>elearnings Not Found</p>
            @endif
            {{ $videos->appends($_GET)->links() }}
          </div>
          <div class="col-lg-4 col-md-4">
            @include('dashboard.elearning-video.partials.sidebar')
          </div>
        </div>
      </div>
    </div><!-- End Blog Page -->

  </main><!-- End #main -->
@endsection