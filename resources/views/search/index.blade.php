@extends('layouts.app')
@section('title', 'Search')

@section('content')
    <div class="container col-md-8 ">
        <div class="well well bs-component">
            <form class="form-horizontal" method="post">
                @foreach ($errors->all() as $error)
                    <p class="alert alert-danger">{{ $error }}</p>
                @endforeach
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
                <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                <fieldset>
                    <legend>Search</legend>
                    <div class="form-group">
                        <div class="col-lg-8">
                            <input type="search" class="form-control" id="q" placeholder="Enter search term" name="q" value="{{ old('q')}}">
                        </div>
                        <div>
                            Max Results: <input type="number" id="maxResults" name="maxResults" min="1" max="10" step="1" value="{{ old('maxResults') ? old('maxResults') : 5 }}">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-lg-8 ">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </fieldset>
            </form>
            @if ($searchResponse === NULL)
            @else
                <table class="table">
                    <thead>
                        <tr>
                            <th>Image</th>
                            <th>Title</th>
                            <th>Action</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach($searchResponse as $searchResult)
                            <tr>
                                <td>
                                    <img src="{!! $searchResult['snippet']['thumbnails']['default']['url'] !!}" alt="{!! $searchResult['snippet']['title'] !!}" style="width:width;height:height;">
                                </td>
                                <td>
                                    {!! $searchResult['snippet']['title'] !!}
                                </td>
                                <td>
                                    <form action="{{ route('favourite.store') }}" method="post">
                                        <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                                        <div class="form-group">
                                            <input type="hidden" value="{!! $searchResult['snippet']['title'] !!}" name="title">
                                            <input type="hidden" value="{!! $searchResult['snippet']['thumbnails']['default']['url'] !!}" name="imageUrl">
                                            <input type="hidden" value="{!! $searchResult['id']['kind'] !!}" name="kind">
                                            @if ($searchResult['id']['kind'] =='youtube#video')
                                                <input type="hidden" value="{!! $searchResult['id']['videoId'] !!}" name="videoid">
                                            @endif
                                            @if ($searchResult['id']['kind'] =='youtube#channel')
                                                <input type="hidden" value="{!! $searchResult['id']['channelId'] !!}" name="videoid">
                                            @endif
                                            @if ($searchResult['id']['kind'] =='youtube#playlist')
                                                <input type="hidden" value="{!! $searchResult['id']['playlistId'] !!}" name="videoid">
                                            @endif
                                        </div>
                                        <button type="submit" class="btn btn-primary">Add Favourite</button>

                                    </form>
                                </td>
                            </tr>

                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
@endsection
