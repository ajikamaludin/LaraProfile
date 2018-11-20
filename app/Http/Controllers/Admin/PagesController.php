<?php

namespace App\Http\Controllers\Admin;

use Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Page;

class PagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pages = Page::orderBy('created_at','desc')->paginate(10);
        return view('admin.page-list', ['pages' => $pages]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.page-form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(!empty($request->description)){
            foreach($request->description as $description){
                if(!empty($description)){
                    $descriptions[] = $description;
                }
            }
            if(!isset($descriptions)){
                $descriptions = [""];
            }
        }
        $page = new Page();
        $page->title = $request->input('name');
        $page->body = json_encode([
            'body' => $descriptions,
            'column' => (count($descriptions) == 0) ? 1 : count($descriptions)
        ]);

        $page->slug = str_slug($page->title);
        if($page->save()){
            return redirect()->route('pages.list')->with('success','New Page has been Saved');
        }
        return redirect()->route('pages.list')->with('error','Somethin went wrongs');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $page = Page::find($id);
        $data = json_decode($page->body);
        $column = $data->column;
        $body = $data->body;
        $div = 12 / $column;
        return view('admin.page-view', ['column' => $div, 'body' => $body ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $page = Page::find($id);
        $body = json_decode($page->body);
        $bodys = $body->body;
        $column = 12 / $body->column;
        return view('admin.page-form', ['page' => $page,'bodys' => $bodys, 'column' => $column]);
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
        if(!empty($request->description)){
            foreach($request->description as $description){
                if(!empty($description)){
                    $descriptions[] = $description;
                }
            }
            if(!isset($descriptions)){
                $descriptions = [""];
            }
        }
        $page = Page::find($id);
        $page->title = $request->input('name');
        $page->body = json_encode([
            'body' => $descriptions,
            'column' => (count($descriptions) == 0) ? 1 : count($descriptions)
        ]);

        $page->slug = str_slug($page->title);
        if($page->update()){
            return redirect()->route('pages.list')->with('success','New Page has been Updated');
        }
        return redirect()->route('pages.list')->with('error','Somethin went wrongs');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $page = Page::find($id);
        if($page->delete()){
            return redirect()->route('pages.list')->with('success','Page has been Deleted');
        }
        return redirect()->route('pages.list')->with('error','Somethin went wrongs');
    }
}
