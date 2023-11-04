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
}
