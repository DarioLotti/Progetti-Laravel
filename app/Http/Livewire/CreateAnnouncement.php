<?php

namespace App\Http\Livewire;


use Livewire\Component;
use App\Models\Category;
use App\Jobs\RemoveFaces;
use App\Jobs\ResizeImage;
use App\Models\Announcement;
use Livewire\WithFileUploads;
use App\Jobs\GoogleVisionLableImage;
use App\Jobs\GoogleVisionSafeSearch;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class CreateAnnouncement extends Component
{
    use withFileUploads;

    public $title;
    public $body;
    public $price;
    public $category;
    public $images =[];
    public $image;
    public $form_id;
    public $temporary_images;
    public $announcement;

    protected $rules=[
        'title' => 'required|min:4',
        'body' => 'required|min:8',
        'price' => 'required|numeric|digits_between:0,8',
        'category' => 'required',
        'images.*' => 'image|max:1024',
        'temporary_images.*' => 'image|max:1024',
    ];

    public function updated($propertyName){
        $this->validateOnly($propertyName);
    }

    public function updatedTemporaryImages()
    {
        if($this->validate([
            'temporary_images.*' => 'image|max:1024',
        ]))
        {
            foreach($this->temporary_images as $image)
            { 
                    $this->images[]=$image;
            }
        }
    }

    public function removeImage($key)
    {
        if(in_array($key, array_keys($this->images))){
            unset($this->images[$key]);
        }
    }

    public function store()
    {
        $this->validate();
        // $category = Category::find($this->category);
        // $announcement = $category->announcements()->create([
        //     'title' => $this->title,
        //     'body' => $this->body,
        //     'price' => $this->price
        // ]);

        $this->announcement = Category::find($this->category)->announcements()->create($this->validate());
        if (count($this->images)) {
            foreach ($this->images as $image) {
                // $this->$announcement->images()->create(['path' => $image->store('images', 'public')]);
                $newFileName = "announcements/{$this->announcement->id}";
                $newImage = $this->announcement->images()->create(['path'=>$image->store($newFileName, 'public')]);
                
                // dispatch(new ResizeImage($newImage->path, 400, 300));
                // dispatch(new GoogleVisionSafeSearch($newImage->id));
                // dispatch(new GoogleVisionLableImage($newImage->id));

                RemoveFaces::withChain([
                    new ResizeImage($newImage->path , 400, 300),
                    new GoogleVisionSafeSearch($newImage->id),
                    new GoogleVisionLableImage($newImage->id)
                ])->dispatch($newImage->id);


            }
            
            File::deleteDirectory(storage_path('/app/livewire-tmp'));
        }
        $this->announcement->user()->associate(Auth::user());
        $this->announcement->save();
        $this->reset();
        return redirect(route('homepage'))->with('message', 'Annuncio inserito, sará pubblicato dopo la revisione');
    }

    public function render()
    {
        $allCategories=Category::all();
        return view('livewire.create-announcement', compact('allCategories'));
    }

}
