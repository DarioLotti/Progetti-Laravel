<x-layout>
    <div class="container-fluid ">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8 col-lg-6 text-center m-4">
                <h1 class="bg-warning">{{__('ui.Modifica_annuncio')}} {{$announcement->title}}</h1>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-10 col-md-3">
                <div class="card mb-sm-4 mb-md-2 shadow">
                    <div class="card-body">
                        <h5 class="my-3 text-capitalize text-bold">Ciao , {{Auth::user()->name}} 👋</h5>
                        <p>Ricorda alcune regole ...</p>
                        <div class="card-body">
                            <hr>
                            <small class="text-muted">L'annuncio segue degli standard, perciò sarà pubblicato dopo la revisione del nostro team.</small>
                            <hr>
                            <small class="text-muted">Non inserire più volte lo stesso annuncio.</small>
                            <hr>
                            <small class="text-muted">Non utilizzare l'annuncio per fare marketing o pubblicità.</small>
                            <hr>
                        </div>
                        <form action="{{route('announcement.delete', compact('announcement'))}}" method="POST">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-outline-danger">{{__("Elimina l'annuncio")}}</button>
                        </form> 
                    </div>
                </div>
            </div>
            <div class="col-10 col-md-8 mb-3">
                <nav aria-label="breadcrumb" class="bg-light shadow rounded-3 p-3 mb-4" style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 ">
                        <li class="breadcrumb-item"><a href="{{route('homepage')}}">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Edit announcement</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{$announcement->title}}</li>
                    </ol>
                </nav>
                <livewire:edit-announcement announcementId="{{$announcement->id}}"/>
            </div>
        </div>
    </div>
</x-layout>
