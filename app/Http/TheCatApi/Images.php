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

    public function search($size = 'full', $limit = 1, $mime_types = 'jpg,png,gif', $format = 'json', $order = 'RANDOM',
                           $page = 0, $category_ids = '', $breed_ids = '')
    {
        $function_url = "search";
        $url = self::BASE_URL . self::CLASS_URL . $function_url . "?size=$size&mime_types=$mime_types&format=$format&order=$order&page=$page"
            . "&limit=$limit&category_ids=$category_ids&breed_ids=$breed_ids";
        $images = $this->http_response($url);
        return $images;
    }

    public function analysis($image_id)
    {
        $function_url = "analysis";
        $url = self::BASE_URL . self::CLASS_URL . $image_id . "/" . $function_url;
        $response = $this->http_response($url);
        return $response[0];
    }

}