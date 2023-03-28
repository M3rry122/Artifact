 <x-app-layout>
    <x-slot name="header">
        　ジャンル選択
    </x-slot>
    <!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>検索</title>
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
        <div>
            @foreach($genres as $genre)
            <a href="/genre_categories/create2/{{ $genre->id }}">{{ $genre->title }}</a>
             @endforeach
        </div>
        <a href="/games/mypage">マイページへ</a>
            <a href="#" onclick="history.back(); return false;">戻る</a>
    </body>
</html>
</x-app-layout>