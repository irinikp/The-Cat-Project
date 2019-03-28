<?php

namespace App\Http\TheCatApi;

use GuzzleHttp\Client;

class Image
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

    public function search($size = 'full', $limit = 1, $mime_types = 'jpg,png,gif', $format = 'json', $order = 'RANDOM',
                           $page = 0, $category_ids = '', $breed_ids = '')
    {
        return json_decode(($this->client->request(
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
    }

    /**
     * @param int $image_id
     * @return array
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function analysis($image_id)
    {
        return json_decode(($this->client->request(
            'GET',
            "images/$image_id/analysis",
            ['headers' => $this->headers]
        ))->getBody());
    }

    /**
     * @param int $image_id
     * @return array
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function get($image_id)
    {
        return json_decode(($this->client->request(
            'GET',
            "images/$image_id",
            ['headers' => $this->headers]
        ))->getBody());
    }

}