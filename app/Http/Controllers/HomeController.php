<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Project;
use App\Models\Category;
use App\Models\Menu;

class HomeController extends Controller
{
    public function index()
    {
        $projects = Project::orderBy('id', 'desc')->limit(3)->get();
        return view('frontend.index',[
            'setting' => $this->getSetting(), 
            'menus' => $this->getMenu(),
            'projects' => $projects
        ]);
    }

    public function project()
    {
        $categories = Category::all();
        return view('frontend.project-category',[
            'setting' => $this->getSetting(), 
            'menus' => $this->getMenu(),
            'categories' => $categories
        ]);
    }

    public function projectByCategories($id)
    {
        $category = Category::find($id);
        $projects = Project::where(['id_category' => $id])->paginate(12);
        return view('frontend.project-grid',[
            'setting' => $this->getSetting(), 
            'menus' => $this->getMenu(),
            'projects' => $projects,
            'category' => $category
        ]);
    }

    public function projectDetail($slug)
    {
        $project = Project::where(['slug' => $slug])->first();
        dd($project);
        return view('frontend.project-grid',[
            'setting' => $this->getSetting(), 
            'menus' => $this->getMenu(),
            'project' => $project
        ]);
    }

    private function getSetting()
    {
        $setting = DB::table('setting')->first();
        $data = json_decode($setting->link)->link;
        $setting->fb = $data->fb;
        $setting->ig = $data->ig;
        $setting->yt = $data->yt;
        return $setting;
    }

    private function getMenu()
    {
        $menus = Menu::all();
        foreach($menus as $menu){
            $data = json_decode($menu->link);
            $menu->data = $data;
            
            if($menu->data->link == "projects"){
                $menu->data->link = route('project');
            }
        }
        return $menus;
    }
}
