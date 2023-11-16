<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Http\Request;
use App\Http\Resources\VideoResource;

class ApiController extends Controller
{
    function home() {
        $data = Video::limit(8)->get();
        return json_decode($data);
    }
    function video(int $id) {
        return new VideoResource(Video::findOrFail($id));
    }
    function OptionsOfVideos(int $id) {
        $data = Video::all()->random(10);
        return json_decode($data);
    }
}
