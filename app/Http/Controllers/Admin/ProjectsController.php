<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
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
        $slide = $request->file('slideImg');
        $project = new Project();
        $project->title = $request->title;
        $project->slug = str_slug($project->title);
        $project->description = $request->description;
        $project->status = $request->status;
        $project->id_category = $request->category;
        if($slide = $slide->move('storage/slide/', str_random(40).'.'.$slide->getClientOriginalExtension())){
            $project->slide = $slide->getPathname();

            $project->tahun_perancangan = $request->tahunPerancangan;
            $project->tahun_pembangunan = $request->tahunPembangunan;
            $project->luas_tanah = $request->luasTanah;
            $project->luas_bangunan = $request->luasBangunan;

            if($project->save()){
                if($project->status){
                    return redirect()->route('posts.images', $project->id )->with('success','New Post has been Publish');
                }else{
                    return redirect()->route('posts.images', $project->id )->with('success','New Post has been Saved');
                }
            }
        }
        return redirect()->route('posts.list')->with('danger','Something went wrong');
        
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

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function ckupload(Request $request)
    {
        $image = $request->file('upload');
        $name = str_random(40).'.'.$image->getClientOriginalExtension();
        if($image = $image->move('storage/posts/', $name)){            
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

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function ckbrowser()
    {
        $datas = [];
        $directory = 'public/posts/';
        $files = Storage::allFiles($directory);
        foreach ($files as $file) {
            $datas[] = Storage::url($file);    
        }
        return view('admin.file-manager', ['files' => $datas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function images($id)
    {
        return view('admin.project-image-form',['id' => $id]);
    }

    public function upload(Request $request)
    {
        return response()->json([
            'tmp-attr' => implode(" - ",$request->file()),
            'success',
            200
        ]);
    }
}
