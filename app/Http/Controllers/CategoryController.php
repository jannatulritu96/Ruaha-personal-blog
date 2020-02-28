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
    public function index()
    {

        $sql = Category::select('*');
        $render = [];

//        if(isset($request->search)){
//            $sql->where(function ($q) use($request){
//                $q->where('name', '=', $request->search)
//                    ->orwhere('email', '=', $request->search)
//                    ->orwhere('phone', '=', $request->search)
//                    ->orwhere('fax', '=', $request->search)
//                    ->orwhere('address', '=', $request->search);
//            });
//        }
//
//        if (isset($request->status)) {
//            $sql->where('status', $request->status);
//        }
//
        $data = $sql->paginate(30);
        $data->appends($render);
//
//        $status = (isset($request->status)) ? $request->status : '';

        return view('admin.category.index',compact('data'));
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
            'name' => $request->name
        ]);

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
        $category  = Category::findOrFail($id);

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
