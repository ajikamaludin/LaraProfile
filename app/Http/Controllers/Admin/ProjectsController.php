<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Validator;
use App\Models\Project;
use App\Models\ProjectImage;

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
        $validator = Validator::make($request->all(), [
            'slideImg' => 'image',
        ]);
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
        return redirect()->route('posts.list')->with('error','Something went wrong');
        
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
        $project = Project::find($id);
        $categories = \App\Models\Category::all(['id','name']);
        return view('admin.project-form',['project' => $project, 'categories' => $categories]);
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
        $project = Project::find($id);
        $project->title = $request->title;
        $project->slug = str_slug($project->title);
        $project->description = $request->description;
        $project->status = $request->status;
        $project->id_category = $request->category;
        if($request->hasFile('slideImg')){
            $slide = $request->file('slideImg');
            if($slide = $slide->move('storage/slide/', str_random(40).'.'.$slide->getClientOriginalExtension())){
                $project->slide = $slide->getPathname();
            }
        }
        $project->tahun_perancangan = $request->tahunPerancangan;
        $project->tahun_pembangunan = $request->tahunPembangunan;
        $project->luas_tanah = $request->luasTanah;
        $project->luas_bangunan = $request->luasBangunan;

        if($project->update()){
            if($project->status){
                return redirect()->route('posts.images', $project->id )->with('success','New Post has been Publish');
            }else{
                return redirect()->route('posts.images', $project->id )->with('success','New Post has been Saved');
            }
        }
        return redirect()->route('posts.list')->with('error','Something went wrong');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $projectImages = ProjectImage::where(['id_project' => $id]);
        if($projectImages->delete()){
            $project = Project::find($id);
            if($project->delete()){
                return redirect()->route('posts.list')->with('success','Post has been Deleted');
            }
        }
        return redirect()->route('posts.list')->with('error','Something went wrong');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function ckupload(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'upload' => 'image',
        ]);
        $image = $request->file('upload');
        $name = str_random(40).'.'.$image->getClientOriginalExtension();
        if($validator->fails()){
            return json_encode([
                'uploaded' => 0,
                'error' => [
                    'message' => 'Must be a image file'
                ]
            ]);
        }
        if($image = $image->move('storage/posts/', $name)){            
            return json_encode([
                'uploaded' => 1,
                'fileName' => $image,
                'url' => '/storage/posts/'.$name,
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
        $project = Project::find($id);
        // $projectImages = ProjectImage::where(['id_project' => $project->id])->orderBy('created_at', 'desc')->get();
        $projectImages = $project->images()->orderBy('created_at','desc')->get();
        return view('admin.project-image-form',['id' => $project->id, 
            'name' => $project->title, 
            'images' => $projectImages 
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function upload(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'file' => 'image',
        ]);
        $project = Project::find($id);
        if($project->count() > 0 && (!$validator->fails())){
            $image = $request->file('file');
            $name = str_random(40).'.'.$image->getClientOriginalExtension();
            if($image = $image->move('storage/posts/', $name)){
                $post_images = new ProjectImage();
                $post_images->id_project = $project->id;
                $post_images->file_name = $image->getPathname();
                if($post_images->save()){
                    return response()->json([
                            'data' => [
                                'id' => $post_images->id,
                                'url' => asset($image->getPathname()),
                            ],
                            'message' => 'Success Added Image',
                            200
                        ], 200);
                }
            }
        }
        //Error Response 500
        return response()->json([
            'Something went wrongs'
        ], 500);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroyImage($idProject, $idImage)
    {
        // TODO : remove image from database, return 200
        $projectImage = ProjectImage::where(['id_project' => $idProject,'id' => $idImage]);
        if($projectImage->count() == 1 && $projectImage->delete()){
            return response()->json([
                'Success Deleted Image'
            ], 200);
        }
        return response()->json([
            'Something went wrongs '
        ], 500);
    }
}
