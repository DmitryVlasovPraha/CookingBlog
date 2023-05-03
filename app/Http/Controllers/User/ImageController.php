<?php

namespace App\Http\Controllers\User;

use App\Helpers\ImageUploader;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ImageController extends Controller {
    public function upload(ImageUploader $imageUploader) {
        return $imageUploader->upload();
    }

    public function remove(ImageUploader $imageUploader) {
        $imageUploader->remove();
    }
}
