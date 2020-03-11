<?php

namespace App\Http\Controllers;

use App\category;
use App\SubCategory;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $sql = SubCategory::with('relCategory')->select('*');
        $render = [];

        if (isset($request->name)) {
            $sql->where('name', 'like', '%'.$request->name.'%');
            $render['name'] = $request->name;
        }
        if (isset($request->status)) {
            $sql->where('status', $request->status);
            $render['status'] = $request->status;
        }

        $data = $sql->paginate(30);
        $data->appends($render);

        $status = (isset($request->status)) ? $request->status : '';

        return view('admin.sub-category.index',compact('data','status'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::where('status','1')->get();
        return view('admin.sub-category.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

//        dd($request->all());
        $request->validate([
            'cat_id'=>'required',
            'name'=>'required',
        ]);

        $sub_category = SubCategory::create([
            'cat_id' => $request->cat_id,
            'name' => $request->name,
            'slug_name' => str_slug($request->name)
        ]);

        if ($sub_category) {
            session()->flash('success','Sub category stored successfully');
        } else {
            session()->flash('error','Something is wrong!');
        }
        return redirect()->route('sub_category.index');
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
     * @param  int  $slug_name
     * @return \Illuminate\Http\Response
     */
    public function edit($slug_name)
    {
        $sub_category  = SubCategory::where('slug_name',$slug_name)->first();
        $category = Category::where('status','1')->get();
        return view('admin.sub-category.edit',compact('category','sub_category'));
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
        $sub_category = SubCategory::where(['id'=> $id])->update([
            'cat_id'=>$request->cat_id,
            'name' => $request->name,
            'slug_name' => str_slug($request->name)
        ]);
        if ($sub_category) {
            session()->flash('success','Sub category stored successfully');
        } else {
            session()->flash('success','Sub category stored successfully');
        }
        return redirect()->route('sub_category.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = SubCategory::findOrFail($id)->delete();


        if ($delete == 1) {
            $success = true;
            $message = "Sub category deleted successfully";
        } else {
            $success = true;
            $message = "Sub category not found";
        }

        //  Return response
        return response()->json([
            'success' => $success,
            'message' => $message,
        ]);
    }
    public function changeActivity($id)
    {
        $sub_category = SubCategory::find($id);
        $status = 0;
        if ($sub_category->status == 0) {
            $status = 1;
        }
        $sub_category = $sub_category->update(['status' => $status]);

        if ($sub_category) {
            return response()->json(['success' => true, 'Status updated Successfully', 'status' => 200], 200);
        } else {
            return response()->json(['success' => false, 'Whoops! Status not updated', 'status' => 401], 200);
        }
    }
}
