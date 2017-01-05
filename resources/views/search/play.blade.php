@extends('layouts.app')
@section('title', 'Play search result')
@section('content')
    <div class="container col-md-4">
            <div class="well well bs-component">
                @foreach ($errors->all() as $error)
                    <p class="alert alert-danger">{{ $error }}</p>
                @endforeach
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
                <div>
                    @if ($searchResult->kind == 'youtube#video')
                        <iframe frameborder="0" src="https://www.youtube.com/embed/{!! $searchResult->videoid!!}?autoplay=1" allowfullscreen="allowfullscreen" width="320" height="240" frameborder="0">
                        </iframe>
                    @endif
                    @if ($searchResult->kind == 'youtube#playlist')
                        <iframe frameborder="0" src="https://www.youtube.com/embed/videoseries?list={!! $searchResult->videoid!!}&index=0" allowfullscreen="allowfullscreen" width="320" height="240" frameborder="0">
                        </iframe>
                    @endif
                </div>
                <div class="content">
                    <h2 class="header">{!! $searchResult->title !!}</h2>
                </div>
            </div>
    </div>
@endsection
