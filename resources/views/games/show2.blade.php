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
                 <button type="button" onclick="deletePost({{ $post->id }})">delete</button> 
         <script>
            function deletePost(id) {
                 'use strict'

            if (confirm('削除すると復元できません。\n本当に削除しますか？')) {
                 document.getElementById(`form_${id}`).submit();
                }
           }
        </script>
                <h3>本</h3>
                <p>{{ $post->body }}</p>    
            </div>
        </div>
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

<form class="mb-4" method="POST" action="{{ route('replies.store') }}">
    @csrf
 
    <input
        name="post_id"
        type="hidden"
        value="{{ $post->id }}"
    >
 
    <div class="form-group">
        <label for="subject">
        名前
        </label>
 
 <input
            id="name"
            name="name"
            class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}"
            value="{{ old('name') }}"
            type="text"
        >
        @if ($errors->has('name'))
         <div class="invalid-feedback">
         {{ $errors->first('name') }}
         </div>
        @endif
    </div>
 
    <div class="form-group">
     <label for="body">
     本文
     </label>
 
        <textarea
            id="reply"
            name="reply"
            class="form-control {{ $errors->has('replies') ? 'is-invalid' : '' }}"
            rows="4"
            >{{ old('reply') }}</textarea>
        @if ($errors->has('replies'))
         <div class="invalid-feedback">
         {{ $errors->first('replies') }}
         </div>
        @endif
    </div>
 
    <div class="mt-4">
     <button type="submit" class="btn btn-primary">
     コメントする
     </button>
    </div>
</form>
 
@if (session('commentstatus'))
    <div class="alert alert-success mt-4 mb-4">
     {{ session('commentstatus') }}
    </div>
@endif
</span>
<div class="footer">
            <a href="/games/mypage">マイページへ</a>
            <a href="#" onclick="history.back(); return false;">一覧に戻る</a>
        </div>
        <form action="/games/{{ $post->id }}" id="form_{{ $post->id }}" method="post">
                         @csrf
                         @method('DELETE')
        </form>
    </body>
</html>