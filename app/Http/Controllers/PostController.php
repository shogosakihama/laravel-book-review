<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;


class PostController extends Controller
{
  public function getCover(Request $request)
  {
    if($request->content){
      $content = $request->content;
      $data = "https://www.googleapis.com/books/v1/volumes?q=" . $content . "&maxResults=10";
      $data = htmlspecialchars($data);
      $method = "GET";
    
      $client = new \GuzzleHttp\Client();
      
      $response = $client->request($method,$data,['http_errors' => false]);
  
      $posts = $response->getBody();
      $json_decode = json_decode($posts,true);
  
      return view('getCover', ['json_decode' =>$json_decode]);
    }else{
      $json_decode = "";
      return view('getCover', ['json_decode' =>$json_decode]);
    }
    
  }
}