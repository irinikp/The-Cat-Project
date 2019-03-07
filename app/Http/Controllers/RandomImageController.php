<?php

namespace App\Http\Controllers;

use App\Http\TheCatApi\Images as CatImages;

class RandomImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $image_handler = new CatImages();
        $images = $image_handler->search(400, 5);
//        $url = $images->url;
//        $image_id = $images->id;
//        $analysis = $image_handler->analysis($image_id);
        return response()
            ->view('random-image', ['images' => $images], 200);
    }
}
