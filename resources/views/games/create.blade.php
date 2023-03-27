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
               <h2>game</h2>
               <select name="post[game_id]">
                   @foreach($games as $genre)
            <option value="{{ $genre->id }}">{{ $genre->title }}</option>
            @endforeach
               </select>
            <div class="body">
                <h2>本文</h2>
                <textarea name="post[body]" placeholder="今日も1日お疲れさまでした。">{{ old('post.body') }}</textarea>
                <p class="body__error" style="color:red">{{ $errors->first('post.body') }}</p>
            </div>
            <div class="category">
            <h2>Category</h2>
            <select name="post[genre_id]">
            @foreach($games as $genre)
            <option value="{{ $genre->id }}">{{ $genre->title }}</option>
            @endforeach
            </select>
            </div>
            </div>
            <input type="submit" value="store"/>
        </form>
        <div class="footer">
            <a href="/">戻る</a>
        </div>
    </body>
</html>
</x-app-layout>