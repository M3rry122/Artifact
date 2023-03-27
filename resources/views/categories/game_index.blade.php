<x-app-layout>
    <!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <style>
        .btn--orange,
        a.btn--orange {
        color: #fff;
        background-color: #eb6100;
        }
        .btn--orange:hover,
        a.btn--orange:hover {
        color: #fff;
        background: #f56500;
        }
        </style>
    </head>
    <body>
        <div class='games'>
            @foreach ($games as $post)
                <div class='post'>
                     <small>{{ $post->user->name }}</small>
                    <a href="">{{ $post->game->title }}</a>
                    <p class='body'> 
                      <a href="/games/{{ $post->id }}">{{ $post->body }}</a> 
                    </p>
                    <form action="/games/{{ $post->id }}" id="form_{{ $post->id }}" method="post">
                         @csrf
                         @method('DELETE')
                    </form>
                </div>
            @endforeach    
        </div>
        <div class="category">
 
</div>
        <div class="footer">
            <a href="/games/mypage">マイページへ</a>
            <a href="#" onclick="history.back(); return false;">戻る</a>
        </div>
    </body>
</html>
</x-app-layout>