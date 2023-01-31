<div class="page-head-blog">
    <div class="single-blog-page">
      <!-- search option start -->
      <form action="/articles">
        @if(request('articlecategory'))
          <input type="hidden" name="articlecategory" value="{{ request('articlecategory') }}">
        @endif
        
        <div class="search-option">
          <input type="text" placeholder="Search..." name="search" value="{{ request('search') }}">
          <button class="button" type="submit">
            <i class="bi bi-search"></i>
          </button>
        </div>
      </form>
      <!-- search option end -->
    </div>
    <div class="single-blog-page">
      <!-- recent start -->
      <div class="left-blog">
        <h4>recent article</h4>
        <div class="recent-post">
          <!-- start single post -->
          @foreach($recentarticles as $recent)
            <div class="recent-single-post">
              <div class="post-img">
                @if($recent->image)
                  <img src="{{ asset('storage/' . $recent->image) }}" alt="Photo Of {{ $recent->title }}" class="img-fluid" style="max-height: 250px;">
                @else
                  <img src="https://picsum.photos/500/500" alt="Random Picsum Images">
                @endif
              </div>
              <div class="pst-content" style="word-wrap: break-word">
                <p><a href="/articles/{{ $recent->slug }}" style="word-wrap: break-word">{{ $recent->title }}</a></p>
                <p class="text-muted" style="font-size: 11px">{{ $recent->excerpt }}</p>
              </div>
            </div>
          @endforeach
          <!-- End single post -->
        </div>
      </div>
      <!-- recent end -->
    </div>
    <div class="single-blog-page">
      <div class="left-blog">
        <h4>Article Categories</h4>
        <ul>
          @foreach($recentarticlecategories as $recentcategories)
            <li>
              <a href="/articles?articlecategory={{ $recentcategories->slug }}" style="word-wrap: break-word">{{ $recentcategories->name }}</a>
            </li>
          @endforeach
        </ul>
      </div>
    </div>
    <div class="single-blog-page">
      <div class="left-blog">
        <h4>Ilmiah</h4>
        <ul>
          <li>
            <a href="" style="word-wrap: break-word">Jurnal</a>
          </li>
          <li>
            <a href="" style="word-wrap: break-word">Buku</a>
          </li>
        </ul>
      </div>
    </div>
  </div>
  <!-- End left sidebar -->