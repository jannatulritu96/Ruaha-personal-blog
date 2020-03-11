<?php

namespace App\Http\Controllers;

use App\category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $sql = Category::withCount('relPost')->select('*');
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

        return view('admin.category.index',compact('data','status'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
        ]);

        $categories = Category::create([
            'name' => $request->name,
            'slug_name' => str_slug($request->name)
        ]);
//        $slugName = str_slug($request->name);

        if ($categories) {
            session()->flash('success','Category stored successfully');
        } else {
            session()->flash('error','Something is wrong!');
        }
        return redirect()->route('category.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $slug_name
     * @return \Illuminate\Http\Response
     */
    public function show($slug_name)
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
        $category  = Category::where('slug_name',$slug_name)->first();

        return view('admin.category.edit',compact('category'));
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
        $category = Category::where(['id'=> $id])->update([
            'name' => $request->name,
            'slug_name' => str_slug($request->name)
        ]);
        if ($category) {
            session()->flash('success','Category stored successfully');
        } else {
            session()->flash('success','Category stored successfully');
        }
        return redirect()->route('category.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = Category::findOrFail($id)->delete();


        if ($delete == 1) {
            $success = true;
            $message = "Category deleted successfully";
        } else {
            $success = true;
            $message = "Category not found";
        }

        //  Return response
        return response()->json([
            'success' => $success,
            'message' => $message,
        ]);
    }
    public function changeActivity($id)
    {
        $category = Category::find($id);
        $status = 0;
        if ($category->status == 0) {
            $status = 1;
        }
        $category = $category->update(['status' => $status]);

        if ($category) {
            return response()->json(['success' => true, 'Status updated Successfully', 'status' => 200], 200);
        } else {
            return response()->json(['success' => false, 'Whoops! Status not updated', 'status' => 401], 200);
        }
    }
}
