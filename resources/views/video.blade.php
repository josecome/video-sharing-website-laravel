@extends('template')
@section('main')
    <main>
        <table>
            <tr>
                <td style="vertical-align: top;">
                   <video width="800" height="350" style="margin-top: 0px;" controls>
                        <source src="" type="video/mp4">
                    </video>   <br />
                    <h2>{{ $video->title_of_video }}</h2>
        <table>
          <tr>
            <td>
                <a href="" class="userstylepic" style="text-decoration: none; background-color: #aed6f1; width: 28px; height: 28px; float: left; text-align: center; border-radius: 50%; font-size: 18px; padding-left: 10px;">
                <strong style="color: white">
                  {{ mb_substr($video->user->name, 0, 1) }}
                </strong>
              </a>
              <span style="font-size: 22px; font-weight: bold;">{{ $video->user->name }}</span><br />
            </td>
            <td style="width: 300px; text-align: right;">
              <button
              style="margin-right: 20px; padding: 8px; border: 1px solid gray; border-radius: 26px; background-color: #6D6D6C; color: white;">
                Subscribe
              </button>
              <i class="bi bi-hand-thumbs-up" style="padding-right: 10px">

              </i>
              <i class="bi bi bi-heart" style="padding-right: 10px">

              </i>
              <i class="bi bi-hand-thumbs-down" style="padding-right: 10px">

              </i>
            </td>
          </tr>
        </table>
                    <br />
                    <div>
                        @foreach ($comments as $comment)
                        <div class="card w-75 mb-3" style="background-color: #D6DCD7; width: 800px;">
                            <div class="card-body">
                                <p class="card-text">{{ $comment->comment }}</p>
                                              <br />
              <i class="bi bi-hand-thumbs-up" style="padding-right: 10px">

              </i>
              <i class="bi bi bi-heart" style="padding-right: 10px">

              </i>
              <i class="bi bi-hand-thumbs-down" style="padding-right: 10px">

              </i>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </td>
                <td>
                    <div>
                        @foreach ($videos as $video)
                        <div class="card" style="width: 18rem; padding: 10px; margin: 10px;">
                            <a href="/videos/{{ $video->id }}">
                            <img src="{{ asset('/storage/video_images/' . $video->video_image) }}"
                              class="card-img-top"
                              style="width: 260px; height: 200px;"
                              alt="...">
                            </a>
                            <div class="card-body">
                                <h5 class="card-title">{{ $video->title_of_video }}</h5>
                                <p class="card-text">{{ $video->user->name }}</p>
                                <p class="card-text" style="font-size: 11px;">
                                <i class="bi bi-eye" style="padding-right: 4px;">{{ ' ' . $video->views }}</i> {{ date('d/m/Y', strtotime($video->created_at)) }}
                                </p>
                            </div>
                        </div>
                    @endforeach
                    </div>
                </td>
            </tr>
        </table>
    </main>
@endsection
