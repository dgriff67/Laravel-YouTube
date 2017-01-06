@extends('layouts.app')
@section('title', 'View all Tags')
@section('content')

    <div class="container col-md-8">
        <div class="well well bs-component">
            <form class="form-horizontal" method="post">
                <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                <fieldset>
                    <legend>Add a Tag</legend>
                    <div class="form-group">
                        <label for="name">Name</label>
                        <div>
                            <input type="text" class="form-control" id="name" placeholder="Name" name="name">
                        </div>
                    </div>

                    <div class="form-group">
                        <div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <button class="btn btn-default">Cancel</button>
                        </div>
                    </div>
                </fieldset>
            </form>
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
                    <p> There are no tags.</p>
                @else
                    <table class="table">
                        @foreach($tags as $tag)
                            <tr>
                                <td>
                                    {!! $tag->name !!}
                                </td>
                            </tr>
                        @endforeach
                    </table>
                @endif
            </div>
        </div>
    </div>

@endsection
