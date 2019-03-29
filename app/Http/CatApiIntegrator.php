<?php

namespace App\Http;

use App\CatImage;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Support\Collection;

class CatApiIntegrator
{
    const BASE_URL = "https://api.thecatapi.com/v1/";
    const CLASS_URL = "images/";

    protected $client;
    protected $headers;

    public function __construct()
    {
        $this->client = new Client([
            'base_uri' => self::BASE_URL,
            'timeout' => 2.0
        ]);
        $this->headers = ['x-api-key:' . $_ENV['CAT_API_KEY']];
    }

    /**
     * @param string $size
     * @param int $limit
     * @param string $mime_types
     * @param string $format
     * @param string $order
     * @param int $page
     * @param string $category_ids
     * @param string $breed_ids
     *
     * @return Collection<CatImage>
     *
     * @throws GuzzleException
     */
    public function search($size = 'full', $limit = 1, $mime_types = 'jpg,png,gif', $format = 'json', $order = 'RANDOM',
                           $page = 0, $category_ids = '', $breed_ids = '')
    {
        $response = json_decode(($this->client->request(
            'GET',
            "images/search",
            [
                'query' => [
                    'size' => $size,
                    'mime_types' => $mime_types,
                    'format' => $format,
                    'order' => $order,
                    'page' => $page,
                    'limit' => $limit,
                    'category_ids' => $category_ids,
                    'breed_ids' => $breed_ids
                ],
                'headers' => $this->headers
            ]
        ))->getBody());
        $cat_collection = new Collection();
        foreach ($response as $cat_array) {
            $cat = new CatImage();
            $cat->populate($cat_array);
            $cat_collection->add($cat);
        }
        return $cat_collection;
    }

    /**
     * @param CatImage $image
     *
     * @return CatImage
     *
     * @throws GuzzleException
     */
    public function analysis($image)
    {
        $response = json_decode(($this->client->request(
            'GET',
            "images/$image->id/analysis",
            ['headers' => $this->headers]
        ))->getBody());
        $image->populate_analysis($response);
        return $image;
    }

    /**
     * @param int $image_id
     *
     * @return CatImage
     *
     * @throws GuzzleException
     */
    public function get($image_id)
    {
        $response = json_decode(($this->client->request(
            'GET',
            "images/$image_id",
            ['headers' => $this->headers]
        ))->getBody());
        $cat_image = new CatImage();
        $cat_image->populate($response);
        return $cat_image;
    }

}