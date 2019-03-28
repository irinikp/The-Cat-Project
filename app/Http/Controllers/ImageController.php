<?php

namespace App\Http\Controllers;

use App\Http\TheCatApi\Image as CatImages;

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
        $images = $image_handler->search(400, 8);
        return response()
            ->view('random-image', ['images' => $images], 200);
    }


    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function show($id)
    {
        $image_handler = new CatImages();
        $image = $image_handler->get($id);
        $analysis = $image_handler->analysis($id);
        return response()->view('image', ['image' => $image, 'analysis' => $analysis], 200);
    }
}
