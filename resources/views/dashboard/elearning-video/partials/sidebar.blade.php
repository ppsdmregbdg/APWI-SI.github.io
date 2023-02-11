<div class="page-head-blog">
    <div class="single-blog-page">
      <!-- search option start -->
      <form action="/videos">
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
        <h4>recent video</h4>
        <div class="recent-post">
          <!-- start single post -->
          @foreach($recentvideos as $recent)
            <div class="recent-single-post">
              <div class="post-img">
                <iframe class="col-md-12" width="140" height="75" src="{{ $recent->link }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
              </div>
              <div class="pst-content" style="word-wrap: break-word">
                <p><a href="{{ $recent->link }}" style="word-wrap: break-word">{{ $recent->title }}</a></p>
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
        <h4>Categories</h4>
        <ul>
          @foreach($recentarticlecategories as $recentcategories)
            <li>
              <a href="/videos?articlecategory={{ $recentcategories->slug }}" style="word-wrap: break-word">{{ $recentcategories->name }}</a>
            </li>
          @endforeach
        </ul>
      </div>
    </div>
  </div>
  <!-- End left sidebar -->