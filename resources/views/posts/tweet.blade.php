<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <div class='posts'>
            @foreach ($posts as $post)
                <div class='post'>
                    <p class='body'> 
                      <a href="/posts/{{ $post->id }}">{{ $post->body }}</a> 
                    </p>
                </div>
            @endforeach    
        </div>
        <div class='paeginate'>{{ $posts->links()}}</div>
        <a href='/posts/create'>create</a>
    </body>
</html>