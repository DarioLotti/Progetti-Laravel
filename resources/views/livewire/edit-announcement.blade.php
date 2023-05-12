<div class="form form-control shadow">
    <form wire:submit.prevent="updateAnnouncement">
      @csrf
      <div class="row mb-3 justify-content-evenly">
        <div class="col-10 col-md-3 text-sm-start text-md-end ">
          <label class="form-label" for="title">Titolo dell'articolo</label>
        </div>
        <div class="col-sm-2 col-md-9">
          <input type="text" class="form-control" is-valid wire:model="title" @error('title') is-invalid @enderror placeholder="Titolo dell'articolo" >
          @error('title')
          <small class="text-danger d-block">{{$message}}</small>
          @enderror
        </div>
      </div>
      <div class="row mb-3 d-flex justify-content-evenly">
        <div class="col-10 col-md-3 text-sm-start text-md-end">
          <label class="form-label" for="body">Descrizione</label>
        </div>
        <div class="col-sm-2 col-md-9">
          <textarea cols="15" class="form-control" rows="5" wire:model="body" placeholder="Descrizione dell'articolo ..."></textarea>
          @error('body')
          <small class="text-danger d-block">{{$message}}</small>
          @enderror
        </div>
      </div>
      <div class="row mb-3 d-flex justify-content-sm-start justify-content-md-end">
        <div class="col-10 col-md-4">
          <div class="row">
            <div class="col-10 col-md-3 text-sm-start text-md-end">
              <label class="form-label" for="price">Prezzo</label>           
            </div>
            <div class="col-sm-2 col-md-9">
              <input type="number" class="form-control form-icon-trailing" wire:model="price"  min="1" step="any" >
              @error('price')
              <small class="text-danger d-block">{{$message}}</small>
              @enderror
            </div>
          </div>
        </div>
        <div class="col-10 col-md-6">
          <div class="row">
            <div class="col-10 col-md-3 text-sm-start text-md-end">
              <label class="form-label" for="category">Categoria</label>
            </div>
            <div class="col-sm-2 col-md-9">
              <select wire:model.defer="category" id="category" class="form-select">
                <option value="">Seleziona la categoria</option>
                @foreach ($categories as $category)
                <option value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
              </select>
            </div>
          </div>
        </div>
      </div>
      <div class="row mb-3 d-flex justify-content-evenly">
        <div class="col-10 col-md-3 text-sm-start text-md-end">
          <label class="form-label" for="foto">Foto</label>
        </div>
        <div class="col-sm-2 col-md-9">
          <input wire:model="temporary_images" type="file" name="images" multiple class="form-control shadow @error('temporary_images.*')is-ivalid @enderror" placeholder="img">
          @error('temporary_images.*')
          <p class="text-danger mt-2">{{$message}}</p>
          @enderror
        </div>
      </div>
      @if (!empty($images))
      <div class="row mb-3 d-flex justify-content-evenly">
        <div class="col-10 col-md-3 text-sm-start text-md-end">
          <label class="form-label">Photo preview</label>
        </div>
        <div class="col-sm-2 col-md-9 border-1 rounded">
          <div id="carouselExample" class="carousel slide">
            <div class="carousel-inner">
              @foreach($images as $key => $image)
              <div class="carousel-item active">
                <img src="{{$image->temporaryUrl()}}" class="d-block w-100 img-fluid img-preview" alt="image preview">
              </div>
              <div class="carousel-caption d-none d-md-block">
                <button type="button" class="btn btn-danger" wire:click="removeImage({{$key}})">Elimina</button>
              </div>
              @endforeach
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
          </div>
        </div>
      </div>
      @endif
      <div class="row justify-content-start">
        <div class="col-4 col-md-2 text-center">
          <button type="submit" class="btn btn-success">Aggiorna</button>
        </div>
      </div>
    </form>
  </div>
  
  
  