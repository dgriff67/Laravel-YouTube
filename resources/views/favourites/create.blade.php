@extends('master')
@section('title', 'Contact')

@section('content')
    <div class="container col-md-8 col-md-offset-2">
        <div class="well well bs-component">
            <form class="form-horizontal" method="post">
                <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                <fieldset>
                    <legend>Add a Favourite</legend>
                    <div class="form-group">
                        <label for="title" class="col-lg-2 control-label">Title</label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" id="title" placeholder="Title" name="title">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="videoid" class="col-lg-2 control-label">Videoid</label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" id="videoid" placeholder="Videoid" name="videoid">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="use_id" class="col-lg-2 control-label">user_id</label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" id="user_id" placeholder="User_id" name="user_id">
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
        </div>
    </div>
@endsection
