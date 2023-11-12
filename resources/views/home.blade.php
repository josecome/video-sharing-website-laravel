@extends('template')
@section('main')
    <main>
        <div>
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3" style="color: #0606A7; width: 100%; background-color: #D6DCD7; border-radius: 32px;">
                @foreach ($videos as $video)
                    <div class="card" style="width: 18rem; padding: 10px; margin: 10px;">
                        <a href="/videos/{{ $video->id }}">
                        <img  src="{{ asset('/storage/video_images/' . $video->video_image) }} "
                          class="card-img-top"
                          style="width: 260px; height: 200px;"
                          alt="...">
                        </a>
                        <div class="card-body">
                            <h5 class="card-title">{{ $video->title_of_video }}</h5>
                            <p class="card-text">{{ $video->user }}</p>
                            <p class="card-text" style="font-size: 11px;">
                            <i class="bi bi-eye" style="padding-right: 4px;">{{ ' ' . $video->views }}</i> {{ date('d/m/Y', strtotime($video->created_at)) }}
                            </p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </main>
@endsection
