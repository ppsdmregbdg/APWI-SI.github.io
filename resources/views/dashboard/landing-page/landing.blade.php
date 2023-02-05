@extends('layouts.master')
@section('content')
<!-- ======= hero Section ======= -->
<section id="hero">
    <div class="hero-container">
      <div id="heroCarousel" class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="5000">

        <ol id="hero-carousel-indicators" class="carousel-indicators"></ol>

        <div class="carousel-inner" role="listbox">

          <div class="carousel-item active" style="background-image: url(assets/img/hero-carousel/1.jfif)">
            <div class="carousel-container">
              <div class="container">
                <h2 class="animate__animated animate__fadeInDown">APWI PPSDM Regional Bandung </h2>
                <p class="animate__animated animate__fadeInUp">Membantu Masyarakat dalam Mencari Informasi Terkait Pelatihan</p>
              </div>
            </div>
          </div>

          <div class="carousel-item" style="background-image: url(assets/img/hero-carousel/2.jpg)">
            <div class="carousel-container">
              <div class="container">
                <h2 class="animate__animated animate__fadeInDown">APWI PPSDM Regional Bandung</h2>
                <p class="animate__animated animate__fadeInUp">Melaksanakan Kegiatan dalam Rangka Pengembangan Kompetensi ASN</p>
              </div>
            </div>
          </div>

        </div>

        <a class="carousel-control-prev" href="#heroCarousel" role="button" data-bs-slide="prev">
          <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
        </a>

        <a class="carousel-control-next" href="#heroCarousel" role="button" data-bs-slide="next">
          <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
        </a>

      </div>
    </div>
  </section><!-- End Hero Section -->

  <main id="main">

    <!-- ======= About Section ======= -->
    <div id="about" class="about-area area-padding">
      <div class="container">
        <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="section-headline text-center">
              <h2>About Widya Iswara</h2>
            </div>
          </div>
        </div>
        <div class="row">
          <!-- single-well start-->
          <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="well-left">
              <div class="single-well">
                <a href="#">
                  <img src="assets/img/about/2.jpg" alt="">
                </a>
              </div>
            </div>
          </div>
          <!-- single-well end-->
          <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="well-middle">
              <div class="single-well">
                <a href="#">
                  <h4 class="sec-head">Visi & Misi</h4>
                </a>
                <p>
                  Visi dari PPSDM Regional Bandung adalah terdepan dalam peningkatan kompetensi dan profesionalitas aparatur kementerian dalam negeri dan pemerintah daerah. Sementara misi dari PPSDM Regional Bandung adalah sebagai berikut:
                </p>
                <ul>
                  <li>
                    <i class="bi bi-check"></i> Mengembangkan program diklat.
                  </li>
                  <li>
                    <i class="bi bi-check"></i> Meningkatkan kapasitas Sumber Daya Manusia (SDM) tenaga kediklatan.
                  </li>
                  <li>
                    <i class="bi bi-check"></i> Meningkatkan koordinasi dan Kerjasama kediklatan.
                  </li>
                  <li>
                    <i class="bi bi-check"></i> Meningkatkan kuantitas dan kualitas sarana dan prasarana diklat.
                  </li>
                  <li>
                    <i class="bi bi-check"></i> Memanfaatkan teknologi komunikasi dan informasi
                  </li>
                </ul>
              </div>
            </div>
          </div>
          <!-- End col-->
        </div>
      </div>
    </div><!-- End About Section -->

    <!-- ======= Team Section ======= -->
    {{-- <div id="team" class="our-team-area area-padding">
      <div class="container">
        <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="section-headline text-center">
              <h2>Our special Team</h2>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-3 col-sm-3 col-xs-12">
            <div class="single-team-member">
              <div class="team-img">
                <a href="#">
                  <img src="assets/img/team/1.jpg" alt="">
                </a>
                <div class="team-social-icon text-center">
                  <ul>
                    <li>
                      <a href="#">
                        <i class="bi bi-facebook"></i>
                      </a>
                    </li>
                    <li>
                      <a href="#">
                        <i class="bi bi-twitter"></i>
                      </a>
                    </li>
                    <li>
                      <a href="#">
                        <i class="bi bi-instagram"></i>
                      </a>
                    </li>
                  </ul>
                </div>
              </div>
              <div class="team-content text-center">
                <h4>Jhon Mickel</h4>
                <p>Seo</p>
              </div>
            </div>
          </div>
          <!-- End column -->
          <div class="col-md-3 col-sm-3 col-xs-12">
            <div class="single-team-member">
              <div class="team-img">
                <a href="#">
                  <img src="assets/img/team/2.jpg" alt="">
                </a>
                <div class="team-social-icon text-center">
                  <ul>
                    <li>
                      <a href="#">
                        <i class="bi bi-facebook"></i>
                      </a>
                    </li>
                    <li>
                      <a href="#">
                        <i class="bi bi-twitter"></i>
                      </a>
                    </li>
                    <li>
                      <a href="#">
                        <i class="bi bi-instagram"></i>
                      </a>
                    </li>
                  </ul>
                </div>
              </div>
              <div class="team-content text-center">
                <h4>Andrew Arnold</h4>
                <p>Web Developer</p>
              </div>
            </div>
          </div>
          <!-- End column -->
          <div class="col-md-3 col-sm-3 col-xs-12">
            <div class="single-team-member">
              <div class="team-img">
                <a href="#">
                  <img src="assets/img/team/3.jpg" alt="">
                </a>
                <div class="team-social-icon text-center">
                  <ul>
                    <li>
                      <a href="#">
                        <i class="bi bi-facebook"></i>
                      </a>
                    </li>
                    <li>
                      <a href="#">
                        <i class="bi bi-twitter"></i>
                      </a>
                    </li>
                    <li>
                      <a href="#">
                        <i class="bi bi-instagram"></i>
                      </a>
                    </li>
                  </ul>
                </div>
              </div>
              <div class="team-content text-center">
                <h4>Lellien Linda</h4>
                <p>Web Design</p>
              </div>
            </div>
          </div>
          <!-- End column -->
          <div class="col-md-3 col-sm-3 col-xs-12">
            <div class="single-team-member">
              <div class="team-img">
                <a href="#">
                  <img src="assets/img/team/4.jpg" alt="">
                </a>
                <div class="team-social-icon text-center">
                  <ul>
                    <li>
                      <a href="#">
                        <i class="bi bi-facebook"></i>
                      </a>
                    </li>
                    <li>
                      <a href="#">
                        <i class="bi bi-twitter"></i>
                      </a>
                    </li>
                    <li>
                      <a href="#">
                        <i class="bi bi-instagram"></i>
                      </a>
                    </li>
                  </ul>
                </div>
              </div>
              <div class="team-content text-center">
                <h4>Jhon Powel</h4>
                <p>Seo Expert</p>
              </div>
            </div>
          </div>
          <!-- End column -->
        </div>
      </div>
    </div><!-- End Team Section --> --}}

    <!-- ======= Blog Section ======= -->
    <div id="blog" class="blog-area">
      <div class="blog-inner area-padding">
        <div class="blog-overly"></div>
        <div class="container ">
          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="section-headline text-center">
                <h2>Latest Newspaper</h2>
              </div>
            </div>
          </div>
          <div class="row">
            <!-- Start Left Blog -->
            @if($recentarticles->count())
              @foreach($recentarticles as $recent)
                <div class="col-md-4 col-sm-4 col-xs-12">
                  <div class="single-blog">
                    <div style="max-height: 200px; overflow:hidden;">
                      @if($recent->image)
                        <img src="{{ asset('storage/' . $recent->image) }}" class="card-img-top" alt="Photo Of {{ $recent->title }}">
                      @else
                        <img class="card-img-top" src="https://picsum.photos/300/300" alt="Random Picsum Images">
                      @endif
                    </div>
                    <div class="blog-meta">
                      <i class="bi bi-calendar"></i>
                          {{ $recent->created_at->diffForHumans() }} in 
                          <span class="text-danger">
                            <a href="/articles?articlecategory={{ $recent->articlecategory->slug }}" class="text-danger">{{ $recent->articlecategory->name }}</a>
                          </span>
                    </div>
                    <div class="blog-text">
                      <h4>
                        <a href="/articles/{{ $recent->slug }}" class="text-black">{{ Str::limit($recent->title, 50) }}</a>
                      </h4>
                      <p>{{ $recent->excerpt }}</p>
                    </div>
                    <span>
                      <a href="/articles/{{ $recent->slug }}" class="ready-btn">Readmore</a>
                    </span>
                  </div>
                  <!-- Start single blog -->
                </div>
              @endforeach
            @else
              <h4 class="text-center">Articles Not Found</h4>
            @endif
            <!-- End Left Blog-->

          </div>
        </div>
      </div>
    </div><!-- End Blog Section -->

  </main><!-- End #main -->

@endsection