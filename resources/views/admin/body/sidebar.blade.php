<div class="vertical-menu">

  <div data-simplebar class="h-100">

      <!-- User details -->
  

      <!--- Sidemenu -->
      <div id="sidebar-menu">
          <!-- Left Menu Start -->
          <ul class="metismenu list-unstyled" id="side-menu">
              <li class="menu-title">Menu</li>

              <li>
                  <a href="{{asset('dashboard')}}" class="waves-effect">
                      <i class="ri-dashboard-line"></i><span class="badge rounded-pill bg-success float-end">3</span>
                      <span>Dashboard</span>
                  </a>
              </li>

              
  
              <li>
                  <a href="javascript: void(0);" class="has-arrow waves-effect">
                      <i class="ri-slideshow-fill"></i>
                      <span>Pocetna Slider Podesavanja</span>
                  </a>
                  <ul class="sub-menu" aria-expanded="false">
                      <li><a href="{{route('home.slide')}}">Pocetna Slider</a></li>
                  </ul>
              </li>

              <li>
                <a href="javascript: void(0);" class="has-arrow waves-effect">
                    <i class="ri-video-line"></i>
                    <span>Pocetna Kartice Podesavanja</span>
                </a>
                <ul class="sub-menu" aria-expanded="false">
                    <li><a href="{{route('home.cards')}}">Kartice Filmova</a></li>
                </ul>
            </li>

              <li>
                <a href="javascript: void(0);" class="has-arrow waves-effect">
                    <i class="ri-movie-2-line"></i>
                    <span>Filmovi</span>
                </a>
                <ul class="sub-menu" aria-expanded="false">
                    <li><a href="{{route('all.film')}}">Svi Filmovi</a></li>
                    <li><a href="{{route('add.film')}}">Dodaj Film</a></li>
                    
                    
                </ul>
            </li>


            <li>
                <a href="javascript: void(0);" class="has-arrow waves-effect">
                    <i class="ri-projector-2-fill"></i>
                    <span>Projekcije</span>
                </a>
                <ul class="sub-menu" aria-expanded="false">
                    <li>
                        <a href="javascript: void(0);" class="has-arrow">Pregled Projekcija</a>
                        <ul class="sub-menu" aria-expanded="false">
                            <li><a href="{{route('all.trenutne.projekcija')}}">Trenutne Projekcije</a></li>
                            <li><a href="{{route('all.projekcija')}}">Sve Projekcije</a></li>
                        </ul>
                    </li>
                    <li><a href="{{route('add.projekcija')}}">Dodaj Projekciju</a></li>
                </ul>
            </li>
















              <li class="menu-title">Pages</li>

              <li>
                  <a href="javascript: void(0);" class="has-arrow waves-effect">
                      <i class="ri-account-circle-line"></i>
                      <span>Authentication</span>
                  </a>
                  <ul class="sub-menu" aria-expanded="false">
                      <li><a href="{{route('admin.logout')}}">Login</a></li>
                      <li><a href="register">Register</a></li>
                      <li><a href="auth-recoverpw.html">Recover Password</a></li>
                      <li><a href="auth-lock-screen.html">Lock Screen</a></li>
                  </ul>
              </li>

              <li>
                  <a href="javascript: void(0);" class="has-arrow waves-effect">
                      <i class="ri-profile-line"></i>
                      <span>Utility</span>
                  </a>
                  <ul class="sub-menu" aria-expanded="false">
                      <li><a href="pages-starter.html">Starter Page</a></li>
                      <li><a href="pages-timeline.html">Timeline</a></li>
                      <li><a href="pages-directory.html">Directory</a></li>
                      <li><a href="pages-invoice.html">Invoice</a></li>
                      <li><a href="pages-404.html">Error 404</a></li>
                      <li><a href="pages-500.html">Error 500</a></li>
                  </ul>
              </li>


          </ul>
      </div>
      <!-- Sidebar -->
  </div>
</div>