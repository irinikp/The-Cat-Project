<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RandomImageController extends Controller
{

    private function http_response($url, $status = null, $wait = 3)
    {
        $failed_response = '';
        $time = microtime(true);
        $expire = $time + $wait;

        // we fork the process so we don't have to wait for a timeout
        $pid = pcntl_fork();
        if ($pid == -1) {
            die('could not fork');
        } else if ($pid) {
            // we are the parent
            $ch = curl_init();
            $request_headers = array('x-api-key:63d6ed7a-1f53-4467-82d7-28795354849c');
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_HTTPHEADER, $request_headers);

            curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
            $head = curl_exec($ch);
            $response = json_decode($head);
//            print($head);
//            print_r($response);
            $url = $response[0]->url;
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
                    return $url;
                }
                else
                {
                    return $failed_response;
                }
            }
            elseif($status == $httpCode)
            {
                return $url;
            }

            return $failed_response;
            pcntl_wait($status); //Protect against Zombie children
        } else {
            // we are the child
            while(microtime(true) < $expire)
            {
                sleep(0.5);
            }
            return $failed_response;
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $response = $this->http_response('https://api.thecatapi.com/v1/images/search?size=400&mime_types=jpg,png,gif&format=json&order=RANDOM&page=0&limit=1&category_ids=&breed_ids=');
        return response()
            ->view('random-image', ['response' => $response], 200);
    }
}
