@extends('templates.main')
@section('news-feed')
    <div class="container d-flex">
        <div class="container">
            <h1>Main News</h1>

            <div class="container">
                @foreach ($mainNewsToSend as $article)
                    <h4><a href="{{$article['url']}}">{{$article['title']}}</a></h4>
                    <p>Publication Date: {{$article['publishedAt']}}</p>
                    <h5>Author: {{$article['author']}}</h5>
                    <img src="{{ $article['urlToImage']}}" alt="image" style="width: 500px; height: 250px;">
                    <p>{{$article['description']}}</p>

                    <br>
                    <br>
                @endforeach
            </div>
        </div>
    
        <div class="container">
            <h1>Side News</h1>

            @foreach ($sideNews['articles'] as $article)
                <a href="{{$article['url']}}" class="link-secondary link-offset-2 link-underline link-underline-opacity-0">
                    <div class="container">
                        <h6 class="mb-0">{{$article['title']}}</h6>
                        <p class="mb-0">Author: {{$article['author']}}</p>
                        <p class="mb-0">{{$article['description']}}</p>
                    </div>
                </a>

                <br>
            @endforeach
        </div>
    </div>
@endsection