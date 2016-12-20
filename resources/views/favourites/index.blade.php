@extends('layouts.app')
@section('title', 'View all Favourites')
@section('content')

    <div class="container col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h2> Favourites </h2>
                </div>
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
                @if ($favourites->isEmpty())
                    <p> There are no favourites.</p>
                @else
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Title</th>
                                <th>Videoid</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($favourites as $favourite)
                                <tr>
                                    <td>{!! $favourite->id !!} </td>
                                    <td>
                                        <a href="{!! action('FavouritesController@show', $favourite->id) !!}">{!! $favourite->title !!} </a>
                                    </td>
                                    <td>{!! $favourite->videoid !!}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif
            </div>
    </div>

@endsection
