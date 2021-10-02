@extends('layouts.app');

@section("content");
<h1 class="text-center text-info">Edit File : {{$file->id}}</h1>
<div class="container col-6">
    <div class="card">
        <div class="card-body">
            <form action="{{ route("file.update", $file->id) }}" method="POST" encType="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label>File Title</label>
                    <input type="text" name="title" value="{{$file->title}}" class="form-control">
                </div>
                <div class="form-group">
                    <label>File desc</label>
                    <input type="text" name="desc" value="{{$file->desc}}" class="form-control">
                </div>
                <div class="form-group">
                    <label>Upload File : {{$file->mainFile}}</label>
                    <input type="file" name="mainFile" class="form-control">
                </div>
                <button class="btn btn-info">Update Data</button>
            </form>
        </div>
    </div>
</div>

@endsection
