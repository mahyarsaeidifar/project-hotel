<?php

use Carbon\Carbon;
use Illuminate\Support\Str;
use Intervention\Image\ImageManager;
use Illuminate\Support\Facades\Storage;


if (! function_exists('uploadImage')) {

    function uploadImage($image)
    {
        $watermark_url =  public_path('images/logo.png');
        $extension = $image->extension();
        $image_name = Str::random(8) . mt_rand(0, 999) . Str::random(8) . mt_rand(1000, 9999) .
            Str::random(8) . Str::random(12) . '.' . $extension;

        // Add a watermark to the image
        if ( file_exists($watermark_url)) {
            $img = ImageManager::gd();
            $image = $img->read($image);
            $image->place($watermark_url, 'bottom-right');
        }

        $year  = Carbon::now()->format('Y');
        $month = Carbon::now()->format('m');

        $folder = "/uploads/img/{$year}/{$month}";
        $path = $folder.'/'.$image_name;

        Storage::disk('local')->put(
            "{$folder}/{$image_name}",
            file_get_contents($image),
            'public'
        );

        return $path;

    }

}





