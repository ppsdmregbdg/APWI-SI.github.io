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
                  <h1 class="title2">E - Publikasi</h1>
                </div>
                <div class="layer3">
                  <h2 class="title3">Surat Kabar - PPSDM Regional Bandung</h2>
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

            {{-- Hero Articles --}}
            @if($articles->count())
              <div class="card mb-3">
                @if($articles[0]->image)
                  <div style="max-height: 500px; overflow:hidden;">
                      <img src="{{ asset('storage/' . $articles[0]->image) }}" class="card-img-top" alt="Photo of {{ $articles[0]->title }}">
                  </div>
                @else
                  <img class="card-img-top" src="https://picsum.photos/1200/500" alt="Random Picsum Images">
                @endif
                <div class="card-body">
                  <div class="col-md-12">
                    <span class="mx-2">
                      <i class="bi bi-folder"></i>
                      in <a href="/articles?articlecategory={{ $articles[0]->articlecategory->slug }}" class="text-danger">{{ $articles[0]->articlecategory->name }}</a>
                    </span>
                    <span class="text-muted">
                      <i class="bi bi-calendar"></i>
                      {{ $articles[0]->articlecategory->created_at->diffForHumans() }}
                    </span>
                  </div>
                  <h5 class="card-title mt-3"><a href="/articles/{{ $articles[0]->slug }}" class="text-black">{{ $articles[0]->title }}</a></h5>
                  <p class="card-text">{{ $articles[0]->excerpt }}</p>
                  <a href="/articles/{{ $articles[0]->slug }}" class="btn btn-primary">Readmore</a>
                </div>
              </div>
              
              {{-- Articles --}}
              <div class="row">
                @foreach ($articles->skip(1) as $article)
                <div class="col-md-6 mb-4">
                  <div class="card">
                    <div class="position-absolute px-3 py-2" style="background-color: rgba(0, 0, 0, 0.7)">
                      <span class="text-white">in </span> <a class="text-warning" href="/articles?articlecategory={{ $article->articlecategory->slug }}">{{ $article->articlecategory->name }}</a>
                    </div>
                    <div style="max-height: 300px; overflow:hidden;">
                      @if($article->image)
                        <img src="{{ asset('storage/' . $article->image) }}" class="card-img-top" alt="Photo Of {{ $article->title }}">
                      @else
                        <img class="card-img-top" src="https://picsum.photos/300/300" alt="Random Picsum Images">
                      @endif
                    </div>
                    <div class="card-body">
                      <div class="col-md-12">
                        <span class="text-muted">
                          <i class="bi bi-calendar"></i>
                          {{ $article->articlecategory->created_at->diffForHumans() }}
                        </span>
                      </div>
                      <h5 class="card-title mt-3"><a href="/articles/{{ $article->slug }}" class="text-black">{{ $article->title }}</a></h5>
                      <p class="card-text">{{ $article->excerpt }}</p>
                      <a href="/articles/{{ $article->slug }}" class="btn btn-primary">Readmore</a>
                    </div>
                  </div>
                </div>  
                @endforeach
              </div>
            @else
              <p>Articles Not Found</p>
            @endif
            {{ $articles->appends($_GET)->links() }}
          </div>
          <div class="col-lg-4 col-md-4">
            @include('dashboard.article.partials.sidebar')
          </div>
        </div>
      </div>
    </div><!-- End Blog Page -->

  </main><!-- End #main -->
@endsection