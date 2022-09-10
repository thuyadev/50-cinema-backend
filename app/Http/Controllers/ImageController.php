<?php

namespace App\Http\Controllers;

use App\Utils\ImageManagementUtil;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ImageController extends Controller
{
    protected $imageManagement;

    public function __construct(ImageManagementUtil $imageManagement)
    {
        $this->imageManagement = $imageManagement;
    }
    public function getImage(string $path): string
    {
//        dd('dsaf');
        $image = $this->imageManagement->get($path);
        $type = $this->imageManagement->getMimeType($path);
        $response = Response::make($image, 200)->header("Content-Type", $type);
        return $response;
    }
}
