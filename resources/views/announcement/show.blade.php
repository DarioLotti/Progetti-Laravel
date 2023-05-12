<x-layout>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8 text-black mx-5">
                <section class="product">
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <div class="product__photo">
                                <div style="--swiper-navigation-color: #fff; --swiper-pagination-color: #fff" class="swiper mySwiper2">
                                    <div class="swiper-wrapper">
                                        @foreach($announcement->images as $image)    
                                        <div class="swiper-slide">                                 
                                            <img src="{{Storage::url($image->path)}}" class="img-fluid  rounded" alt="" >
                                        </div>
                                        @endforeach
                                    </div>
                                    <div class="swiper-button-next"></div>
                                    <div class="swiper-button-prev"></div>
                                </div>
                                <div thumbsSlider="" class="swiper mySwiper">
                                    <div class="swiper-wrapper">
                                        @foreach($announcement->images as $image)    
                                        <div class="swiper-slide">                                 
                                            <img src="{{Storage::url($image->path)}}" class="img-fluid  rounded" alt="" >
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            @if (Auth::user() == $announcement->user)
                            <div class="edit-gear">
                                <a href="{{route('announcement.edit', compact('announcement'))}}">
                                    <i class="fa-solid fa-gear fa-2x text-secondary" title="Modifica annuncio"></i>
                                </a>
                            </div>
                            @else
                            <div class="edit-gear">
                                <a href="">
                                    <i class="fa-solid fa-gear fa-2x text-secondary" title="Modifica annuncio"></i>
                                </a>
                            </div>
                            @endif
                            <div class="product__info">
                                <div class="title dettaglio-h1">
                                    <h1>{{$announcement->title}}</h1>
                                    <span>COD: {{$announcement->id}}</span>
                                </div>
                                <div class="price">
                                    € <span>{{$announcement->price}}</span>
                                </div>
                                <div class="variant">
                                    <h3>CATEGORY</h3>
                                    <a href="{{route('categoryShow',['category'=>$announcement->category->id])}}">{{$announcement->category->name}}</a>
                                </div>
                                <div class="variant">
                                    <h3 class="mt-3">UPDATE</h3>
                                    @if($announcement->user)
                                    <a href="{{route('user.profile')}}">{{$announcement->user->name}}</a>
                                    @endif
                                    <p>{{$announcement->updated_at->format('d/m/Y h:m')}}</p>
                                </div>
                                <div class="description">
                                    <h3>DESCRIPTION</h3>
                                    <p>{{$announcement->body}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- swiper --}}
                    
                    {{-- <div id="carouselExample" class="carousel slide photo-main">
                        <div class="carousel-inner"> 
                            @foreach($announcement->images as $image)        
                            <div class="carousel-item @if($loop->first)active @endif">
                                <div class="d-flex">
                                    <div class="col-6">
                                        <img src="{{Storage::url($image->path)}}" class="img-fluid p-3 rounded" alt="" >
                                    </div>  
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div> --}}
                    {{-- <div class="controls bar-modify">
                        <i class="fa-solid fa-share-nodes fa-1x"></i>
                        <i class="fa-regular fa-heart fa-1x"></i>
                    </div> --}}
                    {{-- <img src="" alt="{{$announcement->title}}"> --}}
                    {{-- <img class="img" id="immagine" src="{{!$announcement->images()->get()->isEmpty() ? $announcement->images()->first()->getUrl(400,300) : 'https://picsum.photos/200' }}" alt="immmagine annuncio">
                    <div class="photo-album">
                        <ul>
                            @foreach($announcement->images as $image)
                            <li><img class="img" id="img_p" src="{{!$image->get()->isEmpty() ? $image->getUrl(400,300) : 'https://picsum.photos/200' }}" alt="immmagine annuncio"></li>
                            @endforeach
                        </ul>
                    </div>
                </div> --}}
                
            </section>
        </div>
    </div>
</div>

</x-layout>