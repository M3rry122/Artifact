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
                   <span>
<img src="{{asset('img/nicebutton.png')}}" width="30px">
 
<!-- もし$niceがあれば＝ユーザーが「いいね」をしていたら -->
@if($like)
<!-- 「いいね」取消用ボタンを表示 -->
	<a href="{{ route('unlike', $post) }}" class="btn btn-success btn-sm">
		いいね
		<!-- 「いいね」の数を表示 -->
		<span class="badge">
			{{ $post->likes->count() }}
		</span>
	</a>
@else
<!-- まだユーザーが「いいね」をしていなければ、「いいね」ボタンを表示 -->
	<a href="{{ route('like', $post) }}" class="btn btn-secondary btn-sm">
		いいね
		<!-- 「いいね」の数を表示 -->
		<span class="badge">
			{{ $post->likes->count() }}
		</span>
	</a>
@endif
</span>
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