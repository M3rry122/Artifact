<x-app-layout>
    <x-slot name="header">
        　mypage
    </x-slot>
    <!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <p>{{ Auth::user()->name }}</p>
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
        <div class='paeginate'>{{ $games->links()}}</div>
        <script>
            function deletePost(id) {
                 'use strict'

            if (confirm('削除すると復元できません。\n本当に削除しますか？')) {
                 document.getElementById(`form_${id}`).submit();
                }
           }
        </script>
        <small>{{ $post->user->name }}</small>
    </body>
</html>
</x-app-layout>