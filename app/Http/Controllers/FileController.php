<?php

namespace App\Http\Controllers;

use App\File;
use Illuminate\Http\Request;

class FileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("files.index")->with("files", File::all());

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("files.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $file = new File();
        $file->title = $request->title;
        $file->desc = $request->desc;
        //upload file
        $file_Data = $request->file("mainFile");
        $fileName = $file_Data->getClientOriginalName();
        $file_Data->move(public_path() . '/uploades/', $fileName);
        $file->mainFile = $fileName;
        $file->save();
        return redirect("files");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\File  $file
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $file = File::find($id);
        return view("files.show")->with("file", $file);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\File  $file
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $file = File::find($id);
        return view("files.edit")->with("file", $file);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\File  $file
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, File $file, $id)
    {
        $file = File::find($id);
        $file->title = $request->title;
        $file->desc = $request->desc;
        //upload file
        $file_Data = $request->file("mainFile");
        $fileName = $file_Data->getClientOriginalName();
        $file_Data->move(public_path() . '/uploades/', $fileName);
        $file->mainFile = $fileName;
        $file->save();
        return redirect("files");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\File  $file
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $file = File::find($id);
        $file->delete();
        return redirect("files");
    }

    public function download($id){
        $item = File::where("id", $id)->firstOrfail();
        $itemPath = public_path("uploades/" . $item->mainFile);
        return response()->download($itemPath);
    }
}
