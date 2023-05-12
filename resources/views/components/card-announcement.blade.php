<div class="wrapper">
  <div class="container">
    <div class="top">
      <img class="img mt-3" src="{{!$announcement->images()->get()->isEmpty() ? $announcement->images()->first()->getUrl(400,300) : 'https://picsum.photos/200' }}" alt="immmagine annuncio">
      
      {{-- <img class="img-fluid" src="{{!$announcement->images()->get()->isEmpty() ? Storage::url($announcement->images()->first()->path) : 'https://picsum.photos/350'}}" alt="Immagine annuncio"/> --}}
    </div>
    <div class="bottom">
      <div class="details-cnt d-flex justify-content-around align-items-center">
        <div class="detail">
          <h5>{{$announcement->title}}</h5>
          <h6>€ {{$announcement->price}}</h6>
          <h6> Categoria: {{$announcement->category->name}}</h6>
        </div>
        <div class="show-detail">
          <a href="{{route('announcement.detail',$announcement)}}"><i class="fa-solid fa-share fa-2x ms-2"></i></a>
        </div>
      </div>
    </div>
  </div>
  <div class="inside">
    <div class="icon">
      <i class="fa-solid fa-circle-info"></i>
    </div>
    <div class="contents text-black mt-5">
      <h4 class="muted ">Pubblicato da:</h4>
      @if($announcement->user)
      <p class="lead">{{$announcement->user->name}}</p>
      @endif
      <small class="lead">{{$announcement->updated_at->format('d/m/Y h:m')}}</small>
      <p>{{$announcement->body}}</p>
    </div>
  </div>
</div>