<?php
/**
 * Created by PhpStorm.
 * User: irinikoutaki
 * Date: 2019-03-06
 * Time: 11:28
 */

namespace App\Http\TheCatApi;


class Images extends Integrator
{
    const CLASS_URL = "images/";

    public function search($size = 'full', $mime_types = 'jpg,png,gif', $format = 'json', $order = 'RANDOM', $page = 0,
                           $limit = 1, $category_ids = '', $breed_ids = '')
    {
        $url = self::BASE_URL . self::CLASS_URL . "search?size=$size&mime_types=$mime_types&format=$format&order=$order&page=$page"
            . "&limit=$limit&category_ids=$category_ids&breed_ids=$breed_ids";
        $response = $this->http_response($url);
//        $url = $response[0]->url;
        return $url;
    }

}