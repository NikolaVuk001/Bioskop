<!-- Nav Bar -->

<nav class="navbar navbar-expand-lg main-navbar">
    <div class="container">
        <!-- collapse button -->
        <button class="navbar-toggler " type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav mx-auto">
                
                <!-- Logo -->
                <a href="/" id="Logo" class="nav-brand">
                    <img src="assets/icons/cinema-svgrepo-com.svg" alt="Cinema Logo" height="50px">
                </a>
                <li class="nav-item"><a href="" class="nav-link">Filmovi</a></li>
                <li class="nav-item"><a href="" class="nav-link">Bioskopi</a></li>
                <li class="nav-item"><a href="" class="nav-link">Novosti</a></li>
                <div style="width: 250px;"></div>
                <li class="nav-item searchBar d-md-block d-sm-none hidden-mobile">
                    <form class="d-flex" role="search">
                        <input class="form-control me-3" type="search" placeholder="Search"
                            aria-label="Search">
                        <button type="submit" class="btn btn-default " style="padding-bottom: .7rem;">
                            <img src="assets/icons/search.svg" alt="Search"
                                style="filter: invert(100%) sepia(100%) saturate(0%) hue-rotate(288deg) brightness(102%) contrast(102%); margin-left: -15px; margin-right: 5px;"
                                width="15" height="20">
                        </button>
                    </form>
                </li>

                <div class="vr hidden-xs hidden-mobile"></div>

                <li class="nav-item" style="margin-right: 12px;">
                    <a class="nav-link" href="{{url('/Repertoar')}}" style="display:flex;" >
                        <img src="assets/icons/ticket-perforated.svg" class="ulaznice" width="30" height="30"
                            alt="Tickets"
                            style="filter: invert(100%) sepia(100%) saturate(0%) hue-rotate(288deg) brightness(102%) contrast(102%);">
                        Repertoar
                    </a>
                </li>
                <div class="vr hidden-xs hidden-mobile"></div>

                <li class="nav-item" style="margin-right: 12px;">
                    <a class="nav-link" href="{{url('/login')}}">
                        
                        Login
                    </a>
                </li>
                <div class="vr hidden-xs hidden-mobile"></div>
                <li class="nav-item" style="margin-right: 12px;">
                    <a class="nav-link" href="{{url('/register')}}">
                        
                        Register
                    </a>
                </li>
<li>
    <div class="pt-4 pb-1 border-t border-gray-200 dark:border-gray-600">
        <div class="px-4">
            <div class="font-medium text-base text-gray-800 dark:text-gray-200"></div>
            <div class="font-medium text-sm text-gray-500"></div>
        </div>

        <div class="mt-3 space-y-1">
            <x-responsive-nav-link :href="route('profile.edit')">
                {{ __('Profile') }}
            </x-responsive-nav-link>

            <!-- Authentication -->
            <form method="POST" action="{{ route('logout') }}">
                @csrf

                <x-responsive-nav-link :href="route('logout')"
                        onclick="event.preventDefault();
                                    this.closest('form').submit();">
                    {{ __('Log Out') }}
                </x-responsive-nav-link>
            </form>
        </div>
    </div>
</li>
               

                
            </ul>
        </div>
    </div>
</nav>
