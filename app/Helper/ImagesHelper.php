<?php

namespace App\Helper;

trait ImagesHelper
{
    public function storeMedia($request): string
    {
        $folderPath = public_path('tmp/uploads');

        if (!file_exists($folderPath)) {
            mkdir($folderPath, 0777, true);
        }

        $base64Image = explode(";base64,", $request->image);
        $explodeImage = explode("image/", $base64Image[0]);
        $imageType = $explodeImage[1];
        $image_base64 = base64_decode($base64Image[1]);
        $fileName = uniqid() . '.' . $imageType;
        $file = $folderPath . '/' . $fileName;
        file_put_contents($file, $image_base64);

        return 'tmp/uploads/' . $fileName;
    }
}
