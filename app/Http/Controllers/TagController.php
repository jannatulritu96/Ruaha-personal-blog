<?php

namespace App\Http\Controllers;

use App\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function index(Request $request)
    {
        $sql = Tag::select('*');
        $render = [];

        if (isset($request->tag_name)) {
            $sql->where('tag_name', 'like', '%'.$request->tag_name.'%');
            $render['tag_name'] = $request->tag_name;
        }
        if (isset($request->status)) {
            $sql->where('status', $request->status);
            $render['status'] = $request->status;
        }

        $data = $sql->paginate(30);
        $data->appends($render);

        $status = (isset($request->status)) ? $request->status : '';
        return view ('admin.tag.index', compact('data','status'));
    }
    public function create(Request $request)
    {
        return view('admin.tag.create');
    }
    public function store(Request $request)
    {
//         dd($request->all());
        $request->validate([
            'tag_name'=>'required',
        ]);

        $check = Tag::where(['tag_name'=> $request->tag_name])->count();
        if($check<=0){
            Tag::create(['tag_name'=> $request->tag_name]);

            session()->flash('success','Tag stored successfully');
        }else{
            session()->flash('error','Tag already exist');
        }

        return redirect()->route('tags.index');
    }

    public function edit($id)
    {
        $tag = Tag::findOrFail($id);
        return view('admin.tag.edit',compact('tag'));
    }

    public function update(Request $request, $id)
    {
//         dd($request->all());
        $tag = Tag::where(['id'=> $id])->update([
            'tag_name' => $request->tag_name,
        ]);
        if ($tag) {
            session()->flash('success','Tag stored successfully');
        } else {
            session()->flash('success','Tag stored successfully');
        }
        return redirect()->route('tags.index');
    }
    public function destroy($id)
    {
        $delete = Assigntag::where('tag_id',$id)->delete();
        $delete = Tag::findOrFail($id)->delete();


        if ($delete == 1) {
            $success = true;
            $message = "User deleted successfully";
        } else {
            $success = true;
            $message = "User not found";
        }

        //  Return response
        return response()->json([
            'success' => $success,
            'message' => $message,
        ]);

    }


}
