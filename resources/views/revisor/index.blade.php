<x-layout>
    <div class="container-fluid text-center mt-4">
        <div class="row justify-content-center">
            <div class="col-12 p-5">
                <h1 class="bg-warning">{{$announcement_to_check ?'Ecco l\'annuncio da revisionare':'Non ci sono annunci da revisionare' }}</h1>
                @if (!$announcement_to_check)
                <h2 class="">In attesa di annunci ...</h2>
                @endif
            </div>
            @if (!$announcement_to_check)
            <div class="col-12 d-flex justify-content-center">
                <img src="/img/attesa_annuncio.png" class="img-fluid revisor-img" alt="attesa annuncio">
            </div>
            @endif
        </div>
    </div>
    @if($announcement_to_check)
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-10 col-md-2">
                <div class="card mb-4 shadow">
                    <div class="card-body">
                        <h5 class="my-3 text-capitalize text-bold">Ciao , {{Auth::user()->name}} 👋</h5>
                        <div class="card-body">
                            <p>Hai {{App\Models\Announcement::toBeRevisionedCount()}}<span class="visually-hidden">unread messages</span> Annunci da revisionare</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-10 col-md-8">
                <div class="card mb-3 shadow">
                    <div class="row g-0">
                        <div class="col-md-6">
                            <div id="carouselExample" class="carousel slide">
                                @if($announcement_to_check->images)
                                <div class="carousel-inner">
                                    @foreach($announcement_to_check->images as $image)
                                    <div class="carousel-item @if($loop->first)active @endif">
                                        <div class="d-flex">
                                            <div class="col-6">
                                                <img src="{{Storage::url($image->path)}}" class="img-fluid p-3 rounded" alt="" >
                                            </div>
                                            <div class="col-6">
                                                <div>
                                                    @if($image->labels)
                                                    @foreach($image->labels as $label)
                                                    <p class="d-inline">{{$label}},</p>
                                                    @endforeach
                                                    
                                                    @endif
                                                </div>
                                                <div class="card-body ">
                                                    <h6 class='tc-accent'>Revisione Immagini</h6>
                                                    <p>Adulti:
                                                        <i class="{{$image->adult}}"></i>
                                                    </p>
                                                    <p>Satira:
                                                        <i class="{{$image->spoof}}" ></i>
                                                    </p>
                                                    <p>Medicina:
                                                        <i class="{{$image->medical}}" ></i>
                                                    </p>
                                                    <p>Violenza:
                                                        <i class="{{$image->violence}}" ></i>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                                @endif
                                <div class="d-flex justify-content-between">
                                    <button class="carousel-control-prev position-static" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                                        {{-- <span class="carousel-control-prev-icon" aria-hidden="true"></span> --}}
                                        <i class="fa-solid fa-arrow-left text-warning"></i>
                                        <span class="visually-hidden">Previous</span>
                                    </button>
                                    <button class="carousel-control-next position-static" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                                        {{-- <span class="carousel-control-next-icon" aria-hidden="true"></span> --}}
                                        <i class="fa-solid fa-arrow-right text-warning"></i>
                                        <span class="visually-hidden">Next</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card-body align-items-center">
                            <h5 class="card-title">{{$announcement_to_check->title}}</h5>
                            <p class="card-text">{{$announcement_to_check->body}}</p>
                            <p class="card-text"><small class="text-body-secondary">Last updated {{$announcement_to_check->created_at->format('d/m/Y')}}</small></p>
                            <div class="d-flex card-text">
                                {{-- bottone accetta --}}
                                <form action="{{route('revisor.accept_announcement',['announcement'=>$announcement_to_check])}}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" class="btn btn-success shadow">Accetta</button>
                                </form>    
                                {{-- MODAL --}}
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-danger ms-md-3" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    Rifiuta
                                </button>
                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Sei sicuro?</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                Vuoi davvero rifiutare? <span class="text-bald">{{$announcement_to_check->user->name}}</span> announcement ?
                                            </div>
                                            <div class="modal-footer justify-content-center">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annulla</button>
                                                {{-- bottone rifiuta --}}
                                                <form action="{{route('revisor.reject_announcement',['announcement'=>$announcement_to_check])}}" method="POST">
                                                    @csrf
                                                    @method('PATCH')
                                                    <button type="submit" class="btn btn-danger shadow">Conferma</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- END MODAL --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center align-items-center">
            <div class="col-10">
                <div class="card text-center">
                    <div class="card-header">
                        <ul class="nav nav-tabs card-header-tabs" id="myTab">
                            <li class="nav-item">
                                <a href="#home" class="nav-link active text-black" data-bs-toggle="tab">Accettati</a>
                            </li>
                            <li class="nav-item">
                                <a href="#profile" class="nav-link text-black" data-bs-toggle="tab">Rifiutati</a>
                            </li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="home">
                                <h6 class="card-text">Ecco gli ultimi annunci che hai accettato</h6>
                                {{-- qui da mettere un foreach con la card degli ultimi annunci accettati --}}
                            </div>
                            <div class="tab-pane fade" id="profile">
                                <h6 class="card-text">Ecco gli ultimi annunci che hai rifiutato</h6>
                                {{-- @if(Session::has($announcement)->where('is_accepted', false))
                                @foreach ($announcement as  $announcement)
                                <div class="col-10 col-md-6">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="card-title">
                                                <h5>{{$announcement_to_check->title}}</h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                                @endif --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif
</div>
</x-layout>

