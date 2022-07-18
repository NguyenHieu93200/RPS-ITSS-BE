<?php

namespace App\Services;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Config;

class FileService 
{
    public function uploadFileToS3($file, $filePath)
    {
        $fileName = $file->getClientOriginalName();
        $fileName = preg_replace('/\s+/', '_', $fileName);
        $randomStr = Str::random(10);
        $filePath = $filePath . '/' . $randomStr;
        return $file->storeAs($filePath, $fileName, 's3');
    }

    public function deleteFileS3($fileUrl)
    {
        $filePath = parse_url($fileUrl)['path'];
        Storage::disk('s3')->delete($filePath);
    }

    function setInputEncoding($file)
    {
        $fileContent = file_get_contents($file);
        $enc = mb_detect_encoding($fileContent, mb_list_encodings(), true);
        Config::set('excel.imports.csv.input_encoding', $enc);
    }
}
