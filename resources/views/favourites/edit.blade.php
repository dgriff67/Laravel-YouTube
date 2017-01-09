@extends('layouts.app')
@section('title', 'Edit a favourite')

@section('content')
    <div class="container col-md-6">
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
                    <legend>Edit favourite</legend>
                    <div class="form-group">
                        <label for="title">Title</label>
                        <div>
                            <input type="text" class="form-control" id="title" name="title" value="{!! $favourite->title !!}">
                        </div>
                        <div>
                            <input type="hidden" class="form-control" id="videoid" name="videoid" value="{!! $favourite->videoid !!}">
                        </div>
                        <label for="title">New tag</label>
                        <div>
                            <input type="text" class="form-control" placeholder="Enter new tag here or choose from tags below" id="newtag" name="newtag" value="">
                        </div>

                    </div>
                    @foreach($tags->sortBy('name') as $tag)
                        <label class="checkbox-inline">
                            <input type="checkbox"
                            @if ($tag->checked)
                                checked = "checked"
                            @endif
                            name="tag[]" id="tag" value="{!! $tag->id !!}">
                            {!! $tag->name !!}
                        </label>
                    @endforeach

                    <div class="form-group">
                        <div >
                            <button class="btn btn-default">Cancel</button>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </div>
                </fieldset>
            </form>
        </div>
    </div>
@endsection
