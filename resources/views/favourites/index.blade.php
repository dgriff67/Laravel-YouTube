@extends('master')
@section('title', 'View all Favourites')
@section('content')

    <div class="container col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h2> Favourites </h2>
                </div>
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
                            @foreach($tickets as $ticket)
                                <tr>
                                    <td>{!! $favourite->id !!} </td>
                                    <td>{!! $favourite->title !!}</td>
                                    <td>{!! $favourite-videoid !!}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif
            </div>
    </div>

@endsection
