<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    function home() {
        $data = Video::limit(8)->get();
        return view("home", ['videos' => $data]);
    }
    function video(int $id) {
        $data = Video::find($id);
        $data2 = Video::limit(8)->get(); //Will be updated
        return view("video", ['video' => $data, 'videos'=> $data2]);
    }
}
