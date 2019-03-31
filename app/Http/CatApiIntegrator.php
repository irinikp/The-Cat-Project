<?php

namespace App\Http;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

class CatApiIntegrator
{
    const BASE_URL  = "https://api.thecatapi.com/v1/";
    const CLASS_URL = "images/";

    protected $client;
    protected $headers;

    public function __construct()
    {
        $this->client  = new Client([
            'base_uri' => self::BASE_URL,
            'timeout'  => 2.0
        ]);
        $this->headers = ['x-api-key:' . env('CAT_API_KEY')];
    }

    /**
     * @param string $size
     * @param int    $limit
     * @param string $mime_types
     * @param string $format
     * @param string $order
     * @param int    $page
     * @param string $category_ids
     * @param string $breed_ids
     *
     * @return mixed the value encoded in <i>json</i> in appropriate
     * PHP type. Values true, false and
     * null (case-insensitive) are returned as <b>TRUE</b>, <b>FALSE</b>
     * and <b>NULL</b> respectively. <b>NULL</b> is returned if the
     * <i>json</i> cannot be decoded or if the encoded
     * data is deeper than the recursion limit.
     *
     * @throws GuzzleException
     */
    public function search($size = 'full', $limit = 1, $mime_types = 'jpg,png,gif', $format = 'json', $order = 'RANDOM',
                           $page = 0, $category_ids = '', $breed_ids = '')
    {
        return json_decode(($this->client->request(
            'GET',
            "images/search",
            [
                'query'   => [
                    'size'         => $size,
                    'mime_types'   => $mime_types,
                    'format'       => $format,
                    'order'        => $order,
                    'page'         => $page,
                    'limit'        => $limit,
                    'category_ids' => $category_ids,
                    'breed_ids'    => $breed_ids
                ],
                'headers' => $this->headers
            ]
        ))->getBody());
    }

    /**
     * @param int $id
     *
     * @return mixed the value encoded in <i>json</i> in appropriate
     * PHP type. Values true, false and
     * null (case-insensitive) are returned as <b>TRUE</b>, <b>FALSE</b>
     * and <b>NULL</b> respectively. <b>NULL</b> is returned if the
     * <i>json</i> cannot be decoded or if the encoded
     * data is deeper than the recursion limit.
     *
     * @throws GuzzleException
     */
    public function analysis($id)
    {
        return json_decode(($this->client->request(
            'GET',
            "images/$id/analysis",
            ['headers' => $this->headers]
        ))->getBody());
    }

    /**
     * @param int $image_id
     *
     * @return mixed the value encoded in <i>json</i> in appropriate
     * PHP type. Values true, false and
     * null (case-insensitive) are returned as <b>TRUE</b>, <b>FALSE</b>
     * and <b>NULL</b> respectively. <b>NULL</b> is returned if the
     * <i>json</i> cannot be decoded or if the encoded
     * data is deeper than the recursion limit.
     *
     * @throws GuzzleException
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