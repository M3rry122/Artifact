<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Posts</title>
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <h1 class="title">
            {{ $post->title }}
        </h1>
        <div class="content">
            <div class="content__post">
                <small>{{ $post->user->name }}</small>
                <a href="">{{ $post->game->title }}</a>
                <h3>本</h3>
                <p>{{ $post->body }}</p>    
            </div>
        </div>
        <div class="footer">
            <a href="/games/mypage">マイページへ</a>
            <a href="#" onclick="history.back(); return false;">戻る</a>
        </div>
        <div class="edit"><a href="/games/{{ $post->id }}/edit">投稿を編集</a></div>
         <form action="/games/{{ $post->id }}" id="form_{{ $post->id }}" method="post">
                         @csrf
                         @method('DELETE')
                    </form>
         <button type="button" onclick="deletePost({{ $post->id }})">delete</button> 
         <script>
            function deletePost(id) {
                 'use strict'

            if (confirm('削除すると復元できません。\n本当に削除しますか？')) {
                 document.getElementById(`form_${id}`).submit();
                }
           }
        </script>
    </body>
</html>