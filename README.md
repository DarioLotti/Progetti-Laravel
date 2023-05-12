USER STORY 6
-Moficato per l'installazione di SPATIE IMAGE il file php.ini -> accedere a php.ini -> decommentare extension:exif
-Lanciare il comando composer require spatie/image
-Modificare in .env QUEUE_CONNCECTION =sync -> QUEUE_CONNCECTION =database
-Lanciare da terminale il comando php artisan queue:table
-Lanciare da terminale il comando php artisan queue:work (lasciare in background)
-Lanciare da terminale il comando php artisan migrate (o un migrate:fresh)