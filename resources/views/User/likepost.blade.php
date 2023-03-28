<x-app-layout>
    <!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
    <div class="own_posts">
        @foreach ($like_posts as $post)
            <div>
                <small>{{ $post->user->name }}</small>
                    <a href="">{{ $post->game->title }}</a>
                    <p class='body'> 
                    <h4><a href="/games/{{ $post->id }}">{{ $post->body }}</a></h4> 
                    </p>
                 <form action="/games/{{ $post->id }}" id="form_{{ $post->id }}" method="post">
                         @csrf
                         @method('DELETE')
                    </form>
            </div>
        @endforeach
   
        <div class='paginate'>
            {{ $like_posts->links() }}
        </div>
    </div>
    </body>
</html>
</x-app-layout>