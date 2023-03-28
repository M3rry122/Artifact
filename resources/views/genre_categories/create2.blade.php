<x-app-layout>
    <x-slot name="header">
        　書き込み
    </x-slot>
    <!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}"><!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Blog</title>
    </head>
    <body>
        <form action="/games" method="POST">
            @csrf
            <div class="game">
               <h2>ゲームタイトル選択</h2>
               <select name="post[game_id]">
                   @foreach($genres as $genre)
            <option value="{{ $genre->id }}">{{ $genre->title }}</option>
            @endforeach
               </select>
            <div class="body">
                <h2>本文</h2>
                <textarea name="post[body]" placeholder="ここに募集内容を書き込んでください">{{ old('post.body') }}</textarea>
                <p class="body__error" style="color:red">{{ $errors->first('post.body') }}</p>
            </div>
            <div class="category">
            </div>
            </div>
            <input type="submit" value="store"/>
        </form>
        <div class="footer">
            <a href="/games/genre_search2">戻る</a>
        </div>
    </body>
</html>
</x-app-layout>