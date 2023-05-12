<x-layout>
    @auth
        {{-- <div class="btn btn-danger"><a href="{{route('create.announcement')}}">Pubblica annuncio</a></div> --}}
    @endauth
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="my-2 mt-5">Ecco i nostri annunci</h1>
                <div class="row">
                    @forelse($announcements as $announcement)
                    <div class="col-12 col-md-6 col-lg-3 my-4 ">
                    <x-card-announcement :announcement=$announcement>
                    </x-card-announcement>
                    </div>
                    @empty
                    <div class="col-12">
                        <div class="alert alert-warning py-3 shadow">
                            <p class="lead">Non ci sono annunci per questa ricerca</p>
                        </div>
                    </div>
                    @endforelse
                    {{ $announcements->links() }}
                </div>
            </div>
        </div>
    </div>
    </x-layout>