<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Page;
use App\Models\Menu;
class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menus = Menu::all(); 
        return view('admin.menu',['menus' => $menus]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $menus = Menu::all(); 
        if(count($menus) >= 4){
            return redirect()->route('menu.list')->with('error','This Version only support 4 menu please Edit Or Delete');
        }
        $pages = Page::all();
        return view('admin.menu-form',['pages' => $pages]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $menu = new Menu();
        $menu->name = $request->name;
        if($request->active == 'page'){
            $menu->link = json_encode(['link' => $request->page,'status' => 'page']);
        }else if($request->active = 'ext-link'){
            $menu->link = json_encode(['link' => $request->url,'status' => 'link']);
        }
        if($menu->save()){
            return redirect()->route('menu.list')->with('success','New Menu has been Saved');
        }
        return redirect()->route('menu.list')->with('error','Something went wrong');
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
        $menu = Menu::find($id);
        $pages = Page::all();
        $data = json_decode($menu->link);
        if($data->status == "link"){
            $menu->url = $data->link;
        }else if($data->status == "page"){
            $menu->page = $data->link;
        }
        return view('admin.menu-form',['menu' => $menu, 'pages' => $pages]);
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
        $menu = Menu::find($id);
        $menu->name = $request->name;
        if($request->active == 'page'){
            $menu->link = json_encode(['link' => $request->page,'status' => 'page']);
        }else if($request->active = 'ext-link'){
            $menu->link = json_encode(['link' => $request->url,'status' => 'link']);
        }
        if($menu->update()){
            return redirect()->route('menu.list')->with('success','New Menu has been Updated');
        }
        return redirect()->route('menu.list')->with('error','Something went wrong');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Menu::find($id)->delete()){
            return redirect()->route('menu.list')->with('success','New Menu has been Deleted');
        }
        return redirect()->route('menu.list')->with('error','Something went wrong');
    }
}
