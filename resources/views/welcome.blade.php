<x-layout>
    <x-header/>
    {{-- Icon section --}}
    <div class="container-fluid pb-5">
        <div class="row justify-content-evenly align-items-end text-center bg-warning">
            <div class="col-sm-6 col-md-2">
                    <div class="card-body mt-3">
                        <i class="fa-regular fa-credit-card fa-2x text-black"></i>
                        <p class="muted pt-2">{{__('ui.PagamentiSicuri')}}</p>
                    </div>
            </div>
            <div class="col-sm-6 col-md-2">
                    <div class="card-body">
                        <i class="fa-solid fa-truck-fast fa-2x text-black"></i>
                        <p class="muted pt-2">{{__('ui.ConsegnaVeloce')}}</p>
                    </div>
            </div>
            <div class="col-sm-6 col-md-2">
                    <div class="card-body">
                        <i class="fa-solid fa-headset fa-2x text-black"></i>
                        <p class="muted pt-2">{{__('ui.24/7AssistenzaClienti')}}</p>
                    </div>
            </div>
            <div class="col-sm-6 col-md-2">
                    <div class="card-body">
                        <i class="fa-solid fa-handshake-simple fa-2x text-black"></i>
                        <p class="muted pt-2">{{__('ui.NavigazioneFacile')}}</p>
                    </div>
            </div>
            {{-- <div class="col-sm-6 col-md-2 mt-sm-0 mt-md-2">
                    <div class="card-body">
                        <i class="fa-solid fa-arrow-up-from-bracket fa-2x text-black"></i>
                        <p class="muted pt-2">Upload your own announcement</p>
                    </div>
            </div> --}}
        </div>
    </div>
    {{-- New announcemet --}}
    {{-- <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-12 text-center">
                @auth
                <a class="btn btn-custom btn-outline-warning mx-5" href="{{route('create.announcement')}}">{{__('ui.BottonePerAnnunci')}}</a>
                @endauth
            </div>
        </div>
    </div> --}}
    {{-- Latest announcemets --}}
    <div class="container"  id="scrollAncor">
        <div class="row mt-5">
            <div class="col-12">
                <p class="h2 my-2 fw-bold text-center">{{__('ui.Annunci_più_recenti')}}</p>
                <a href="{{route('announcement.index')}}"></a> 
            <div class="row mt-5">
                @foreach($announcements as $announcement)
                <div class="col-12 col-md-6 col-lg-4 my-4 reveal d-flex">
                <x-card-announcement :announcement=$announcement>
                </x-card-announcement>
                </div>
                @endforeach
            </div>
        </div>
      </div>
    </div>
</x-layout>