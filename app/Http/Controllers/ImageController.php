<?php

namespace App\Http\Controllers;

use App\Http\CatApiIntegrator;

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function index()
    {
        $cat_api = new CatApiIntegrator();
        $cat_collection = $cat_api->search(400, 8);
        return response()
            ->view('random-image', ['cat_collection' => $cat_collection], 200);
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
        $image_handler = new CatApiIntegrator();
        $image = $image_handler->get($id);
        $image = $image_handler->analysis($image);

        return response()->view('image', ['image' => $image], 200);
//        return response()->view('image', ['image' => $image, 'analysis' => $analysis], 200);
    }
}
