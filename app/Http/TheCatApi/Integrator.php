<?php
/**
 * Created by PhpStorm.
 * User: irinikoutaki
 * Date: 2019-03-06
 * Time: 11:33
 */

namespace App\Http\TheCatApi;


class Integrator
{
    const BASE_URL = "https://api.thecatapi.com/v1/";

    protected function http_response($url, $status = null)
    {
        $failed_response = '';
            $ch = curl_init();
            $request_headers = array('x-api-key:'.$_ENV['CAT_API_KEY']);
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_HTTPHEADER, $request_headers);

            curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
            $head = curl_exec($ch);
            $response = json_decode($head);
            $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
            curl_close($ch);

            if(!$head)
            {
                return $failed_response;
            }

            if($status === null)
            {
                if($httpCode < 400)
                {
                    return $response;
                }
                else
                {
                    return $failed_response;
                }
            }
            elseif($status == $httpCode)
            {
                return $response;
            }

            return $failed_response;
    }

}