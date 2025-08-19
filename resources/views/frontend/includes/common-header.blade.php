  <!-- ======= Header ======= -->
  <header class="header d-flex align-items-center fixed-top">
      <div class="container-fluid d-flex align-items-center justify-content-between">
          <a href="{{ route('new.home') }}" class="logo d-flex align-items-center  me-auto me-lg-0">
              <i class="bi bi-camera"></i>
              <h1>PhotoFolio</h1>
          </a>

          <nav id="navbar" class="navbar">
              <ul>
                  <li><a href="{{ route('new.home') }}" class="{{ Route::current()->getName() == 'new.home' ? 'active' : '' }}">Home</a></li>
                  <li><a href="{{ route('new.about') }}" class="{{ Route::current()->getName() == 'new.about' ? 'active' : '' }}">About</a></li>
                  {{-- <li class="dropdown"><a href="#"><span>Gallery</span> <i
                class="bi bi-chevron-down dropdown-indicator"></i></a>
            <ul>
              <li><a href="gallery.html">Nature</a></li>
              <li><a href="gallery.html">People</a></li>
              <li><a href="gallery.html">Architecture</a></li>
              <li><a href="gallery.html">Animals</a></li>
              <li><a href="gallery.html">Sports</a></li>
              <li><a href="gallery.html">Travel</a></li>
              <li class="dropdown"><a href="#"><span>Sub Menu</span> <i
                    class="bi bi-chevron-down dropdown-indicator"></i></a>
                <ul>
                  <li><a href="#">Sub Menu 1</a></li>
                  <li><a href="#">Sub Menu 2</a></li>
                  <li><a href="#">Sub Menu 3</a></li>
                </ul>
              </li>
            </ul>
          </li> --}}
                  <li><a href="{{ route('new.gallery') }}" class="{{ Route::current()->getName() == 'new.gallery' ? 'active' : '' }}">Gallery</a></li>
                  <li><a href="{{ route('new.contact') }}"
                          class="{{ Route::current()->getName() == 'new.contact' ? 'active' : '' }}">Contact</a></li>
              </ul>
          </nav><!-- .navbar -->

          <div class="header-social-links">
              <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
              <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
              <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
              <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></i></a>
          </div>
          <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
          <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>

      </div>
  </header><!-- End Header -->
