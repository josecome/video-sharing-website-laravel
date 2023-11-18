@extends('template')
@section('main')
    <main>
        <h3 style="text-align: center;">Drag & Drop to Upload Video</h3>
    <div id="uploadimg" class="center" style="background-color: #F8F9F9; text-align: center;">
        <input type="file" class="upload_file" id="uploadfile" multiple>
        <label for="uploadfile" id="lbluploadfile">
            <i class="bi bi-cloud-arrow-up" style="font-size: 48px; color: greenyellow;"></i><br />
            <span id="choosefile">Choose a File</span>
        </label>
    </div>
    <div id="showimg" class="center" style="display: none; height: 500px;">
        <button id="deleteimg" class="btn btn-danger">Delete Image</button>
        <button id="resizeto50p" class="btn btn-info" style="margin-left: 10px;">Resize to 50%</button>
        <button id="postimg" class="btn btn-primary" style="margin-left: 10px;">Save Image</button>
        <br />
        <!--<img id="imgloaded" src="" style="width: 200px; height: 200px; margin-top: 6px;"/>-->
        <canvas id="imgloaded"  style="margin-top: 6px; border: 1px solid gray;"></canvas>

    </div>
    </main>
@endsection
