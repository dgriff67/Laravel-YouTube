@extends('layouts.app')
@section('title', 'View all Tags')
@section('content')

    <div class="container col-md-8 col-md-offset-2">
        <form class="form-horizontal" method="post">
            <input type="hidden" name="_token" value="{!! csrf_token() !!}">
            <fieldset>
                <legend>Add a Tag</legend>
                <div class="form-group">
                    <label for="name" class="col-lg-2 control-label">Name</label>
                    <div class="col-lg-10">
                        <input type="text" class="form-control" id="name" placeholder="Name" name="name">
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-lg-10 col-lg-offset-2">
                        <button class="btn btn-default">Cancel</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
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
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Title</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($tags as $tag)
                                <tr>
                                    <td>{!! $tag->id !!} </td>
                                    <td>
                                        {!! $tag->name !!}
                                    </td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif
            </div>

    </div>

@endsection
