<x-layout>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">
                <section>
                    <div class="container py-5">
                        <div class="row">
                            <div class="col">
                                <nav aria-label="breadcrumb" class="bg-light shadow rounded-3 p-3 mb-4" style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                                    <ol class="breadcrumb mb-0">
                                        <li class="breadcrumb-item"><a href="{{route('homepage')}}">Home</a></li>
                                        <li class="breadcrumb-item"><a href="#">User</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">User Profile</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="card mb-4">
                                    <div class="card-body text-center shadow"> 
                                        <img src="/img/default-user.png" alt="avatar"
                                        class="rounded-circle bg-light img-fluid" style="width: 150px;">
                                        <h5 class="my-3">{{Auth::user()->name}}</h5>
                                        <p class="text-muted mb-1">Coderilla.com user</p>
                                        <div class="d-flex justify-content-center mb-2">
                                            {{-- <button type="button" class="btn btn-outline-success">Edit profile</button> --}}
                                            {{-- DELETE ACC MODAL --}}
                                            <button type="button" class="btn btn-danger ms-1" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                Delete profile
                                            </button>
                                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h1 class="modal-title fs-5" id="exampleModalLabel">{{Auth::user()->name}}, vuoi davvero eliminare il tuo account?</h1>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            Ricorda che procedendo all'eliminazione dell'account tutti i tuoi dati e i tuoi annunci saranno cancellati
                                                        </div>
                                                        <div class="modal-footer justify-content-center">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annulla</button>
                                                            {{-- bottone rifiuta --}}
                                                            <form action="{{route('user.delete')}}" method="POST">
                                                                @csrf
                                                                @method('delete')
                                                                <button type="submit" class="btn btn-danger">{{__('Delete')}}</button>
                                                              </form> 
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="card mb-4 mb-lg-0">
                                    <div class="card-body p-0 shadow">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="card-body">
                                                    @if(Auth::user()->is_revisor)
                                                    <a aria-current="page" href="{{route('revisor.index')}}"  class="dropdown-item position-relative">Revisiona annunci
                                                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                                            {{App\Models\Announcement::toBeRevisionedCount()}}
                                                            <span class="visually-hidden">unread messages</span>
                                                        </span>
                                                    </a>
                                                    @else
                                                    <div class="text-center">
                                                        <p>Questa sezione è dedicata al nostro team, vuoi collaborare con noi? Manda la richiesta in un click!</p>
                                                        <a class="btn btn-success" href="{{route('become.revisor')}}">Entra nel nostro Team</a>
                                                    </div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-8">
                                <div class="card mb-4">
                                    <div class="card-body shadow">
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <p class="mb-0">Name</p>
                                            </div>
                                            <div class="col-sm-9">
                                                <p class="text-muted mb-0">{{Auth::user()->name}}</p>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <p class="mb-0">Email</p>
                                            </div>
                                            <div class="col-sm-9">
                                                <p class="text-muted mb-0">{{Auth::user()->email}}</p>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-sm-9">
                                                <p class="text-muted mb-0">Created on {{Auth::user()->created_at->format('d/m/Y')}}</p>
                                            </div>
                                            <div class="col-sm-9">
                                                <p class="text-muted mb-0"></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="card mb-4 mb-md-0">
                                            <div class="card-body shadow">
                                                <p class="mb-4 fw-bold h6">Latest announcements</p>
                                                @forelse ($announcements as $announcement)
                                                <div class="card shadow-0 border rounded-3 mt-2">
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <div class="col-md-12 col-lg-3 col-xl-3 mb-4 mb-lg-0">
                                                                <div class="bg-image hover-zoom ripple rounded ripple-surface">
                                                                    <img class="img w-100" src="{{!$announcement->images()->get()->isEmpty() ? $announcement->images()->first()->getUrl(400,300) : 'https://picsum.photos/200' }}" alt="immmagine annuncio">
                                                                    <a href="{{route('announcement.detail',$announcement)}}">
                                                                        <div class="hover-overlay">
                                                                            <div class="mask" style="background-color: rgba(253, 253, 253, 0.15);"></div>
                                                                        </div>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 col-lg-6 col-xl-6">
                                                                <h5 class="fw-bold">{{$announcement->title}}</h5>
                                                                {{-- <div class="d-flex flex-row">
                                                                    <div class="text-danger mb-1 me-2">
                                                                        <i class="fa fa-star"></i>
                                                                        <i class="fa fa-star"></i>
                                                                        <i class="fa fa-star"></i>
                                                                        <i class="fa fa-star"></i>
                                                                    </div>
                                                                    <span>310</span>
                                                                </div> --}}
                                                                <p class="text-truncate mb-4 mb-md-0">{{$announcement->body}}</p>
                                                            </div>
                                                            <div class="col-md-6 col-lg-3 col-xl-3 border-sm-start-none border-start">
                                                                <div class="d-flex flex-row align-items-center mb-1">
                                                                    <h4 class="mb-1 me-1" style="color:#ff3f40">€ {{$announcement->price}}</h4>
                                                                </div>
                                                                <div class="d-flex flex-column mt-4">
                                                                    <a class="btn btn-warning" href="{{route('announcement.detail',$announcement)}}">Dettaglio</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                @empty
                                                <div>
                                                    <p>Ops, sembra che non hai ancora pubblicato nessun annuncio</p>
                                                </div>
                                                @endforelse
                                                <p class="mt-3">Crea un <a class="text-danger text-decoration-none" href="{{route('create.announcement')}}">nuovo annuncio</a></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
</div>
</x-layout>