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
        $video = Video::find($id);
        $videos = Video::limit(8)->get(); //Will be updated
        $comments = Video::find($id)->comments;
        return view("video", ['video' => $video, 'videos'=> $videos, 'comments' => $comments]);
    }
}
