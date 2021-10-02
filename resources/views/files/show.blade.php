@extends('layouts.app');

@section("content");
<h1 class="text-center text-info">Show file : {{$file->id}} </h1>
<div class="container col-6">
    <div class="card">
        {{$file->title}}
        <div class="card-body">
            description : {{$file->title}}
            <img class="w-50" src="{{asset("uploades/$file->mainFile")}}">{{$file->mainFile}}
            <a href="{{ route("file.download", $file->id) }}" class="btn btn-block btn-info m-2">Download</a>
        </div>
    </div>
</div>

@endsection
