<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Models\Project;
class ProjectsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::orderBy('created_at','desc')->paginate(10);
        return view('admin.project-list', ['projects' => $projects]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = \App\Models\Category::all(['id','name']);
        return view('admin.project-form',['categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function ckupload(Request $request)
    {
        $image = $request->file('upload');
        $name = str_random(40).'.'.$image->getClientOriginalExtension();
        if($image = $image->move('storage/upload/', $name)){            
            return json_encode([
                'uploaded' => 1,
                'fileName' => $image,
                'url' => '/storage/upload/'.$name,
            ]);
        }
        return json_encode([
            'uploaded' => 0,
            'error' => [
                'message' => 'Sorry Something went wrong.'
            ]
        ]);
    }

    public function ckbrowser()
    {
        $datas = [];
        $directory = 'public/upload/';
        $files = Storage::allFiles($directory);
        foreach ($files as $file) {
            $datas[] = Storage::url($file);    
        }
        return view('admin.file-manager', ['files' => $datas]);
    }
}
