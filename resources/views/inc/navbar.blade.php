<!-- Nav Bar -->

<nav class="navbar navbar-expand-lg main-navbar">

    <!-- collapse button -->
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav mx-auto">

            <!-- Logo -->
            <a href="{{ url('/') }}" id="Logo" class="nav-brand">
                <img src="{{ asset('assets/icons/cinema-svgrepo-com.svg') }}" alt="Cinema Logo" height="50px">
            </a>
            <li class="nav-item nav_item"><a href="{{ url('/Film/All/U-Ponudi') }}" class="nav-link">Filmovi</a>
            </li>
            <li class="nav-item nav_item"><a href="" class="nav-link">Bioskopi</a></li>
            <li class="nav-item nav_item"><a href="" class="nav-link">Novosti</a></li>
            <div style="width: 250px;"></div>
            <li class="nav-item nav_item searchBar d-md-block d-sm-none hidden-mobile">
                <form class="d-flex" role="search">
                    <input class="form-control me-3" type="search" placeholder="Search" aria-label="Search"
                        style="padding-left: 0.5rem">
                    <button type="submit" class="btn btn-default " style="">
                        <i class="fa-solid fa-magnifying-glass"
                            style="padding-right: 0.5rem; padding-left: 0px; margin-left: 0px"></i>
                    </button>
                </form>
            </li>

            <div class="vr hidden-xs hidden-mobile"></div>

            <li class="nav-item nav_item" style="margin-right: 12px;">
                <a class="nav-link" href="{{ url('/Repertoar') }}" style="display:flex;">
                    <img src="{{ asset('assets/icons/ticket-perforated.svg') }}" class="ulaznice" width="30"
                        height="30" alt="Tickets"
                        style="filter: invert(100%) sepia(100%) saturate(0%) hue-rotate(288deg) brightness(102%) contrast(102%);">
                    Repertoar
                </a>
            </li>
            <div class="vr hidden-xs hidden-mobile"></div>
            @if (Auth::check())
                <div class="vr hidden-xs hidden-mobile"></div>






                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        {{ ucfirst(Auth::user()->name) . ' ' . ucfirst(Auth::user()->surname) }}
                    </a>
                    <ul class="dropdown-menu">
                        <li class=" nav_item" style="margin-right: 12px;">
                            <a class="dropdown-item nav-link" href="{{ url('/Profil') }}">Moj Profil</a>
                        </li>
                        
                        <li class=" nav_item" style="margin-right: 12px;">
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <a class="nav-link" href="route('logout')"
                                    onclick="event.preventDefault();
                                                    this.closest('form').submit();">
                                    Log out
                                </a>
                            </form>
                        </li>


                    </ul>
                </li>
            @else
                <li class="nav-item nav_item" style="margin-right: 12px;">
                    <a class="nav-link" href="{{ url('/login') }}">

                        Login
                    </a>
                </li>
                <div class="vr hidden-xs hidden-mobile"></div>
                <li class="nav-item nav_item" style="margin-right: 12px;">
                    <a class="nav-link" href="{{ url('/register') }}">

                        Register
                    </a>
                </li>
            @endif




        </ul>
    </div>


</nav>
