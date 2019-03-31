<?php

namespace App\Http\Controllers;

use App\CatImage;
use App\Http\CatApiIntegrator;
use GuzzleHttp\Exception\GuzzleException;
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
     *
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
     *
     * @return CatImage
     * @throws GuzzleException
     */
    public function show($id)
    {
        $cat_json      = $this->service->get($id);
        $analysis_json = $this->service->analysis($id);
        return CatImage::populate($cat_json, $analysis_json);
    }

}
