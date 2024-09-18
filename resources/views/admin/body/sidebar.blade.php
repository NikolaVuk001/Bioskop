<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!-- User details -->


        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title">Pregled Bioskopa</li>

                <li>
                    <a href="{{ route('admin.dasboard') }}" class="waves-effect">
                        <i class="ri-dashboard-line"></i>
                        <span>Administratorski Panel</span>
                    </a>
                </li>



                

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ri-movie-2-line"></i>
                        <span>Filmovi</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">                        
                        <li><a href="{{ route('akutelni.film') }}">Aktuelni Filmovi</a></li>
                        <li><a href="{{ route('uskoro.film') }}">Uskoro Filmovi</a></li>
                        <li><a href="{{ route('neaktivni.film') }}">Neaktivni Filmovi</a></li>
                        <li><a href="{{ route('all.film') }}">Svi Filmovi</a></li>
                        @if (Auth::user()->role === 'admin')
                            <li><a href="{{ route('add.film') }}">Dodaj Film</a></li>
                        @endif
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
                                <li><a href="{{ route('all.trenutne.projekcija') }}">Današnje Projekcije</a></li>
                                <li><a href="{{ route('all.projekcija') }}">Sve Projekcije</a></li>
                            </ul>
                        </li>
                        <li><a href="{{ route('add.projekcija') }}">Dodaj Projekciju</a></li>
                    </ul>
                </li>
















                @if (Auth::user()->role === 'admin')
                    <li class="menu-title">Izgled Sajta</li>

                    <li>
                        <a href="javascript: void(0);" class="has-arrow waves-effect">
                            <i class="ri-slideshow-fill"></i>
                            <span>Pocetna Slider Podesavanja</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                            <li><a href="{{ route('home.slide') }}">Pocetna Slider</a></li>
                        </ul>
                    </li>

                    <li>
                        <a href="javascript: void(0);" class="has-arrow waves-effect">
                            <i class="ri-video-line"></i>
                            <span>Aktuelni Filmovi</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                            <li><a href="{{ route('home.cards') }}">Kartice Filmova</a></li>
                        </ul>
                    </li>

                    <li class="menu-title">Upravljanje Moderatorima</li>

                    <li>
                        <a href="javascript: void(0);" class="has-arrow waves-effect">
                            <i class="ri-user-settings-fill"></i>
                            <span>Moderatori</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                            <li><a href="{{ route('all.moderator') }}">Lista Moderatora</a></li>
                            <li><a href="{{ route('add.moderator') }}">Dodaj Novog Moderatora</a></li>
                        </ul>
                    </li>

                    
                    
                @endif


            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
