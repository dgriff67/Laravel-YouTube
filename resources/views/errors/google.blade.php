@extends('layouts.app')
@section('title', 'Google Error')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Error Detail</div>

                <div class="panel-body">
                    There seems to be a problem with Google YouTube Service! {!! $e->getMessage() !!}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
