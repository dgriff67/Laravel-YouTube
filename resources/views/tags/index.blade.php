@extends('layouts.app')
@section('title', 'View all Tags')
@section('content')

    <div class="container col-md-8">
        <div class="well well bs-component">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h2> Tags </h2>
                </div>
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
                @if ($tags->isEmpty())
                    <p> There are no tags. Create a tag by editing a favourite.</p>
                @else
                    <table class="table">
                        @foreach($tags->sortBy('name') as $tag)
                            <tr>
                                <td>
                                    @foreach($tag->favourite as $favourite)
                                        <a href="{!! action('TagsController@show', $tag->id) !!}"><img src="{!! $favourite->imageUrl !!}" alt="{{ $favourite->title }}" style="width:width;height:height;"></a>
                                    @endforeach
                                </td>
                                <td>
                                    <a href="{!! action('TagsController@show', $tag->id) !!}">{{ $tag->name }} </a>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                @endif
            </div>
        </div>
    </div>

@endsection
