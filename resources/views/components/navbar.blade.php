<!-- Navbar -->
<nav id="navbar" class="navbar navbar-expand-lg coderillaNav">
    <!-- Container wrapper -->
    <div id="navbarContainer" class="container-fluid align-items-center">
        <!-- Navbar brand -->
        <a class="navbar-brand me-2 img-fluid text-decoration-none nav-scrolled-link fw-bolder" href="/">
            <img id="logoNavbar" src="/img/gorilla-prova.png" height="65" loading="lazy" style="margin-top: -1px"/>
            <span class="nav-scrolled-link fw-bolder">CODERILLA</span>
        </a>
        <!-- Toggle button -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!-- Collapsible wrapper -->
        <div class="collapse navbar-collapse" id="navbarNav">
            @auth
            {{-- Shop --}}
            <li class=" nav-item dropdown ms-md-3 shopConteiner">
                <a class="text-decoration-none bubbly-button text-white" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" aria-controls="navbarScroll">
                    <i class="fa-solid fa-layer-group text-white"></i> {{__('ui.Negozio')}}
                </a>
                <ul class="dropdown-menu category-menu-cstm shadow">
                    <div class="row justify-content-center align-items-center p-sm-0 p-md-3 navbar-nav-scroll " style="min-height: 60vh;--bs-scroll-height: 100px;">
                        @foreach($categories as $key => $category)
                        <div class="col-6 col-md-4 text-center ">
                            <li class="mt-sm-3 mt-md-3">
                                <a class="dropdown-item nav-link text-decoration-none" href="{{route('categoryShow',compact('category'))}}">
                                    @foreach($categoryIcons as $key => $icon)
                                    @if ($category->name == $icon['name'])
                                    <img src="/img/{{$icon['imgPath']}}" alt="{{$icon['name']}}" class="img-fluid" style="width: 70px; heigth: 70px;">
                                    @endif
                                    @endforeach
                                    <p>{{$category->name}}</p>
                                </a>
                            </li>
                        </div>
                        @endforeach
                    </div>
                    <div class="row justify-content-center ">
                        <div class="col-8 text-center">
                            <hr class="text-black">
                        </div>
                    </div>
                    <div class="row justify-content-center align-item-center px-3">
                        <div class="col-6 text-center">
                            <li class="nav-item">
                                <a class="dropdown-item text-decoration-none" href="{{route('announcement.index')}}">
                                    <img class="img img-fluid" src="/img/search.png" alt="Tutti gli annunci" style="width: 80px; heigth: 80px;">
                                    <p>{{__('ui.TuttiGliAnnunci')}}</p>
                                </a>
                            </li>
                        </div>
                        <div class="col-6 text-center">
                            <li class="nav-item">
                                <a class="dropdown-item text-decoration-none" href="{{route('chiSiamo')}}">
                                    <img class="img img-fluid" src="/img/team.png" alt="Tutti gli annunci" style="width: 80px; heigth: 80px;"><p>Chi siamo</p>
                                </a>
                            </li>
                        </div>
                    </div>
                </ul>
            </li>
            @endauth
            <!-- Left links -->
            @if (Auth::guest())
            <ul class="me-sm-0 mb-sm-0 mb-md-2 mb-lg-0" style="margin-left:20px;">
            </ul> 
            @endif
            {{-- Search Bar --}}
            <ul class="ms-5 me-auto mb-2 mb-lg-0 search-cnt">
                <li class="nav-item">
                    {{-- SEARCH BAR --}}
                    <form class="search-form" action="{{route('announcements.search')}}" method="GET">
                        <input id="search" name="searched" class="form-control" type="search" placeholder="{{__('ui.RicercaNavbar')}}" aria-label="Search">
                        <button class="search-button" type="submit">
                            <i class="fa-solid fa-magnifying-glass"></i>
                        </button>
                    </form>
                </li>
            </ul>
            <!-- Right links -->
            @guest
                <a class="text-decoration-none text-dark px-3 me-2" href="{{route('login')}}">{{__('ui.Accedi')}}</a>
            <button class="bubbly-button me-3" type="button">
                <a class="text-decoration-none text-white" href="{{route('register')}}">{{__('ui.Registrati')}}</a>
            </button>
            @endguest
            @auth
            <li class="nav-item me-md-3 me-lg-0 add-ann-cnt">
                <a class="text-decoration-none bubbly-button text-white add-ann-a" href="{{route('create.announcement')}}" role="button">
                    <i class="fa-regular fa-square-plus"></i> {{__('ui.AggiungiAnnuncio')}}
                </a>
            </li>
            <ul class="navbar-nav user-nav-cnt">
                <li class="nav-item dropdown">
                    <a class="nav-link text-capitalize dropdown-toggle text-decoration-none fw-bolder nav-scrolled-link" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        {{__('ui.Ciao')}} {{Auth::user()->name}}
                    </a>
                    <!-- Dropdown menu -->
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        @if(Auth::user()->is_revisor)
                        <li class="nav-item">
                            <a aria-current="page" href="{{route('revisor.index')}}"  class="nav-link dropdown-item text-decoration-none">
                                <i class="fa-solid fa-user-secret m-2"></i>{{__('ui.ZonaRevisore')}}
                                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                    {{App\Models\Announcement::toBeRevisionedCount()}}
                                    <span class="visually-hidden">unread messages</span>
                                </span>
                            </a>
                        </li>
                        @endif
                        <li class="nav-item">
                            <a class="nav-link dropdown-item text-decoration-none" href="{{route('user.profile')}}">
                                <i class="fa fa-user m-2"></i>{{__('ui.IlMioProfilo')}}
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link dropdown-item text-decoration-none" href="{{route('logout')}}" onclick="event.preventDefault(); 
                            document.getElementById('logout-form').submit();">
                            <i class="fa-solid fa-right-from-bracket m-2"></i>{{__('ui.Esci')}}
                        </a>
                        <form id="logout-form" action="{{route('logout')}}" method="POST" class="d-none">@csrf
                        </form>
                    </li>
                </ul>
            </li>
        </ul>
        @endauth
        
    </div>
    <!-- Collapsible wrapper -->
</div>
<!-- Container wrapper -->
</nav>
<!-- Navbar -->