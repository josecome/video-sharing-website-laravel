<?php

namespace App\Http\Controllers;

use App\Models\Video;
use App\Models\Like;
use App\Models\Comment;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    function home() {
        $data = Video::limit(8)->get();
        return view("home", ['videos' => $data]);
    }
    function video(int $id) {
        $video = Video::find($id);
        $videos = Video::where('id', '<>', $id)->limit(8)->get(); //Will be updated
        $comments = Comment::where('video_id', '=', $id)->with('likes')->get();
        $likes = Like::where('likeable_id', '=', $id)->where('likeable_type', '=', 'App\Models\Video')->whereIn('type', ['like', 'love', 'sad'])->get();
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
