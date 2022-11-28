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
                  <h1 class="title2">My Blog</h1>
                </div>
                <div class="layer3">
                  <h2 class="title3">Profesional Blog Page</h2>
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
          <div class="col-lg-4 col-md-4">
              @include('dashboard.article.partials.sidebar')
          </div>
          
          <!-- Content -->
          <div class="col-md-8 col-sm-8 col-xs-12">
            <h5>{{ $title }}</h5>
            {{-- Hero Articles --}}
            @if($articles->count())
                <div class="card mb-3">
                  <a href="/articles/{{ $articles[0]->slug }}">
                    <img src="/assets/img/blog/1.jpg" class="card-img-top">
                  </a>
                  <div class="card-body">
                    <div class="col-md-12">
                      <span>
                        <i class="bi bi-person"></i>
                        <a href="#" class="text-muted">{{ $articles[0]->user->name }}</a>
                      </span>
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

            <div class="row">
              @foreach ($articles->skip(1) as $article)
                <div class="col-md-12 col-sm-12 col-xs-12">
                  <div class="single-blog">
                    <div class="single-blog-img">
                      <a href="/articles/{{ $article->slug }}">
                        <img src="/assets/img/blog/1.jpg" alt="">
                      </a>
                    </div>
                    <div class="blog-meta">
                      <span class="comments-type">
                        <i class="bi bi-person"></i>
                        <a href="#">{{ $article->user->name }}</a>
                      </span>
                      <span class="comments-type">
                        <i class="bi bi-folder"></i>
                        Category in <a href="/articles?articlecategory={{ $article->articlecategory->slug }}" class="text-danger">{{ $article->articlecategory->name }}</a>
                      </span>
                      <span class="date-type">
                        <i class="bi bi-calendar"></i>2016-03-05 / 09:10:16
                      </span>
                    </div>
                    <div class="blog-text">
                      <h4>
                        <a href="/articles/{{ $article->slug }}">{{ $article->title }}</a>
                      </h4>
                      <p>
                        {{ $article->excerpt }}
                      </p>
                    </div>
                    <span>
                      <a href="/articles/{{ $article->slug }}" class="ready-btn">Read more</a>
                    </span>
                  </div>
                </div>
              @endforeach
            </div>
            @else
              <p>Articles Not Found</p>
            @endif
            {{ $articles->appends($_GET)->links() }}
        </div>
        </div>
      </div>
    </div><!-- End Blog Page -->

  </main><!-- End #main -->
@endsection