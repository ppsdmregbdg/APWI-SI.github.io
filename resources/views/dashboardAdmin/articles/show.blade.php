@extends('dashboardAdmin.layouts.master-dashboard')
@section('content')
    <div class="">
        <div class="container col-xxl-8 py-4">
            <a href="/dashboard/articles" class="btn btn-success mb-3"><span data-feather="arrow-left"></span> Back to Article</a>
            <a href="/dashboard/articles/{{ $article->slug }}/edit" class="btn btn-warning mb-3"><span data-feather="edit"></span> Edit</a>
            <form action="/dashboard/articles/{{ $article->slug }}" method="POST" class="d-inline">
                @method('delete')
                @csrf
                <button class="btn btn-danger mb-3" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')"><span data-feather="x-circle"></span> Delete</button>
            </form>  
            <div class="d-flex justify-content-between">
                <p>Penulis : {{ $article->user->name }}</p>
                <p>{{ substr($article->created_at,0,10) }}</p>
            </div>
            <div class="row justify-content-center g-5">
                <div class="col-lg-12">
                    <h1 class="display-5 fw-bold lh-1" style="word-wrap: break-word">{{$article->title}}</h1>
                    <div class="img-fluid my-5" style="">
                        @if($article->image)
                            <div style="max-height: 500px; overflow:hidden;">
                                <img src="{{ asset('storage/'. $article->image) }}" class="card-img-top img-fluid rounded-3" alt="Photo of {{ $article->title }}">
                            </div>
                        @else
                            <img src="https://picsum.photos/1200/400" class="card-img-top img-fluid rounded-3" alt="Random Picsum Images">
                        @endif
                        
                    </div>
                    
                    <div class="body-word mb-3 px-3" style="word-wrap: break-word">
                        {!! $article->body !!}
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection