<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::orderBy('created_at', 'desc')->paginate(10);
        return view('admin.category-list', ['categories' => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category-form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $image = $request->file('coverImg');
        $category = new Category();
        $category->name = $request->name;
        if($image = $image->move('storage/upload/', str_random(40).'.'.$image->getClientOriginalExtension())){
            $category->cover = $image->getPathname();
            if($category->save()){
                return redirect()->route('categories.list')->with('success','New Category has been Added');
            }
        }
        return redirect()->route('categories.list')->with('danger','Something went wrong');
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
        $category = Category::find($id);
        return view('admin.category-form', ['category' => $category]);
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
        $category = Category::find($id);
        $category->name = $request->name;
        if($request->hasFile('coverImg')){
            $image = $request->file('coverImg');
            if($image = $image->move('storage/upload/', str_random(40).'.'.$image->getClientOriginalExtension())){
                $category->cover = $image->getPathname();
                if($category->update()){
                    return redirect()->route('categories.list')->with('success','Category has been Updated');
                }
            }
            
        }else if($category->update()){
            return redirect()->route('categories.list')->with('success','Category has been Updated');
        }
        return redirect()->route('categories.list')->with('danger','Something went wrong');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Category::find($id)->delete()){
            return back()->with('success','Category has been Deleted');
        }
        return back()->with('danger','Something went wrong');
    }
}
