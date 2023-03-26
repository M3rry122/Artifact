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
        <a href='/games/fps_tps_select' class="btn btn--orange">FPS・TPS</a>
        <a href="" class="btn btn--orange">RPG</a>
        <a href="" class="btn btn--orange">レース</a>
        <a href="" class="btn btn--orange">パーティー</a>
        <a href="" class="btn btn--orange">ボードゲーム</a>
        <a href="" class="btn btn--orange">音ゲー</a>
        <a href="" class="btn btn--orange">パズル</a>
        <a href="" class="btn btn--orange">格ゲー</a>
        <a href="" class="btn btn--orange">育成</a>
        <a href="" class="btn btn--orange">その他</a>
        <div class="footer">
            <a href="/games/mypage">戻る</a>
        </div>
    </body>
</html>
</x-app-layout>