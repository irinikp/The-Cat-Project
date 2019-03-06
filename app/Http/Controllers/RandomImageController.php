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
//        $image_searcher = new CatImages();
//        $response = $image_searcher->search(400);
        $response = "http://www.texasforthem.org/wp-content/uploads/2016/03/Feral-Cat-1.jpg";
        return response()
            ->view('random-image', ['response' => $response], 200);
    }
}
