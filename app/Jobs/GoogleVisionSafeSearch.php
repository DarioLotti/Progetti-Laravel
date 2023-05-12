<?php

namespace App\Jobs;

use App\Models\Image;
use Google\Cloud\Vision\V1\ImageAnnotatorClient;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldBeUnique;




class GoogleVisionSafeSearch implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $announcement_image_id;
  
    public function __construct($announcement_image_id)
    {
        $this->announcement_image_id = $announcement_image_id;
    }

   
    public function handle(): void
    {
        $i= Image::find($this->announcement_image_id);
        if(!$i) {
            return;
        }
        $image = file_get_contents(storage_path('app/public/' . $i->path));
        putenv('GOOGLE_APPLICATION_CREDENTIALS=' .  base_path('presto.json'));


        $imageAnnotator = new ImageAnnotatorClient();
        $response = $imageAnnotator->safeSearchDetection($image);
        $imageAnnotator->close();

        $safe = $response->getSafeSearchAnnotation();

        $adult=$safe->getAdult();
        $medical=$safe->getMedical();
        $racy=$safe->getRacy();
        $violence=$safe->getViolence();
        $spoof=$safe->getSpoof();

        $likelihoodName=[
            'text-secondary fas fa-circle' , 'text-success fas fa-circle', 'text-success fas fa-circle', 'text-warning fas fa-circle' , 'text-warning fas fa-circle', 'text-danger fas fa-circle'
        ];
        $i->adult=$likelihoodName[$adult];
        $i->medical=$likelihoodName[$medical];
        $i->racy=$likelihoodName[$racy];
        $i->violence=$likelihoodName[$violence];
        $i->spoof=$likelihoodName[$spoof];
        $i->save();
    }
}