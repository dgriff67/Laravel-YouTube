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
                            <input type="search" class="form-control" id="q" name="q" placeholder="Enter search term" name="searchTerm">
                        </div>
                        <div>
                            Max Results: <input type="number" id="maxResults" name="maxResults" min="1" max="10" step="1" value="5">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-lg-8 ">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </fieldset>
            </form>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Videoid</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($searchResponse as $searchResult)
                            @if ($searchResult['id']['kind'] =='youtube#video')
                                <tr>
                                    <td>
                                        <img src="https://img.youtube.com/vi/{!! $searchResult['id']['videoId'] !!}/default.jpg" alt="{!! $searchResult['snippet']['title'] !!}" style="width:width;height:height;"><a >{!! $searchResult['snippet']['title'] !!} </a>
                                    </td>
                                    <td>
                                        {!! $searchResult['id']['videoId'] !!}
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>

        </div>
    </div>
@endsection
