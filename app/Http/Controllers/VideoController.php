<?php

namespace App\Http\Controllers;

use App\Models\Video;
use App\Models\Like;
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
        $likes = Like::whereIn('type', ['like', 'love', 'sad'])->get();
        $like = count($likes->where('type', 'like'));
        $love = count($likes->where('type', 'love'));
        $sad = count($likes->where('type', 'sad'));

        return view("video", [
            'video' => $video,
            'videos'=> $videos,
            'comments' => $comments,
            'like'=> $like,
            'love'=> $love,
            'sad'=> $sad,
        ]);
    }
}
