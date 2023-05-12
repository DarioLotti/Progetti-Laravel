<x-layout>
    <div class="container-fluid ">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8 col-lg-6 text-center m-4">
                <h1 class="bg-warning">{{__('ui.PubblicaAnnuncio')}}</h1>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-10 col-md-3">
                <div class="card mb-4 shadow">
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
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-10 col-md-8 mb-3">
                <nav aria-label="breadcrumb" class="bg-light shadow rounded-3 p-3 mb-4" style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 ">
                        <li class="breadcrumb-item"><a href="{{route('homepage')}}">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Create announcement</a></li>
                        <li class="breadcrumb-item active" aria-current="page">New announcement</li>
                    </ol>
                </nav>
                <livewire:create-announcement/>
            </div>
        </div>
    </div>
</x-layout>
