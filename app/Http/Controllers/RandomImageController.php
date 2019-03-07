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
        $response = $image_handler->search(400);
        $url = $response->url;
        $image_id = $response->id;
        $analysis = $image_handler->analysis($image_id);
        return response()
            ->view('random-image', ['url' => $url, 'analysis' => $analysis], 200);
    }
}
