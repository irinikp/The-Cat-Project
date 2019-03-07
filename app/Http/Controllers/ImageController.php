<?php

namespace App\Http\Controllers;

use App\Http\TheCatApi\Images as CatImages;

class ImageController extends Controller
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


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $image_handler = new CatImages();
        $image = $image_handler->get($id);
        return response()->view('image', ['image' => $image], 200);
    }
}
