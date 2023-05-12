<x-layout>
    
    
    <div class="container mt-4">
        <div class="row">
            <div class="col-12">
                <h1>Categoria {{$category->name}}</h1>
            </div>
        </div>
    </div>
    <div class="container">
        
        <div class="row mt-2">
            <div class="col-12">
                
                <div class="row">
                    @forelse($category->announcements as $announcement)
                    <div class="col-12 col-md-4 my-4 reveal mt-5">
                        <div class="card shadow" style="width: 18rem;">
                            <img src="{{!$announcement->images()->get()->isEmpty() ? $announcement->images()->first()->getUrl(400,300) : 'https://picsum.photos/200' }}" class="card-img-top p-3 rounded" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">{{$announcement->title}}</h5>
                                <p class="card-text">{{$announcement->body}}</p>
                                <p class="card-text">{{$announcement->price}}</p>
                                <a href="{{route('announcement.detail',$announcement)}}" class="btn btn-outline-warning">Visualizza</a>
                                <a href="" class="my-2 border-top pt-2 border-dark card-link shadow btn btn-outline-secondary">Categoria:{{$announcement->category->name}}</a>
                                <p class="card-footer mt-2">Pubblicato il:{{$announcement->created_at->format('d/m/Y')}}</p>
                            </div>
                        </div>
                    </div>
                    
                    
                    
                    @empty
                    <div class="col-12">
                        <p class="h3">Non sono presenti annunci per questa categoria</p>
                        <p class="h5"> Publicane uno: <a href="{{route('create.announcement')}}" class="btn btn-warning">Nuovo annuncio</a></p>
                    </div>
                    @endforelse
                </div>
                
            </div>     
        </div>
    </div>     
</x-layout>