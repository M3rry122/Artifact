<x-app-layout>
    <x-slot name="header">
        　tweet
    </x-slot>
    <!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <div class='games'>
            @foreach ($games as $post)
                <div class='post'>
                    <p class='body'> 
                      <a href="/games/{{ $post->id }}">{{ $post->body }}</a> 
                    </p>
                    <form action="/games/{{ $post->id }}" id="form_{{ $post->id }}" method="post">
                         @csrf
                         @method('DELETE')
                     <button type="button" onclick="deletePost({{ $post->id }})">delete</button> 
                    </form>
                </div>
            @endforeach    
        </div>
        <div class='paeginate'>{{ $games->links()}}</div>
        <a href='/games/create'>create</a>
        <script>
            function deletePost(id) {
                 'use strict'

            if (confirm('削除すると復元できません。\n本当に削除しますか？')) {
                 document.getElementById(`form_${id}`).submit();
                }
           }
        </script>
        <p>ログインユーザー：{{ Auth::user()->name }}</p>
    </body>
</html>
</x-app-layout>