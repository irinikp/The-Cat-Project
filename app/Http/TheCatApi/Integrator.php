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

    protected function http_response($url, $status = null, $wait = 3)
    {
        $failed_response = '';
//        $time = microtime(true);
//        $expire = $time + $wait;
//
//        // we fork the process so we don't have to wait for a timeout
//        $pid = pcntl_fork();
//        if ($pid == -1) {
//            die('could not fork');
//        } else if ($pid) {
            // we are the parent
            $ch = curl_init();
            $request_headers = array('x-api-key:63d6ed7a-1f53-4467-82d7-28795354849c');
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_HTTPHEADER, $request_headers);

            curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
//            return [['url' =>1]];
            $head = curl_exec($ch);
            $response = json_decode($head);
            $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
            curl_close($ch);

            if(!$head)
            {
                return $failed_response;
            }
//
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
//            pcntl_wait($status); //Protect against Zombie children
//        } else {
//            // we are the child
//            while(microtime(true) < $expire)
//            {
//                sleep(0.5);
//            }
//            return $failed_response;
//        }
    }

}