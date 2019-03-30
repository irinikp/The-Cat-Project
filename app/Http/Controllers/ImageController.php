<?php

namespace App\Http\Controllers;

use App\CatImage;
use App\Http\CatApiIntegrator;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Http\Response;
use Illuminate\Support\Collection;

/**
 * Class ImageController
 * @package App\Http\Controllers
 */
class ImageController extends Controller
{
    /**
     * @var CatApiIntegrator
     */
    protected $service;

    /**
     * ImageController constructor.
     * @param CatApiIntegrator $service
     */
    public function __construct(CatApiIntegrator $service)
    {
        $this->service = $service;
    }

    /**
     * @return Collection<CatImage>
     * @throws GuzzleException
     */
    public function index()
    {
        return CatImage::populateCollection($this->service->search(400, 8));
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return array
     * @throws GuzzleException
     */
    public function show($id)
    {
        $image = $this->service->get($id);
        $analysis = $this->service->analysis($image);

        return ['image' => $image, 'analysis' => $analysis];
    }
}
