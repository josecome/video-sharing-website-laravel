<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    function home() {
        $data = Video::all();
        return view("home", ['videos' => $data]);
    }
}
