<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sql = User::where('type','2')->select('*');
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

        return view('admin.author.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.author.create');
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
            'type'=>'required',
            'email'=>'required',
            'password'=>'required',
            'details'=>'required',
        ]);

        $users = User::create([
            'name' => $request->name,
            'type' => 2,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'details' => $request->details,
        ]);
        if($request->hasFile('image'))
        {
            $photo= $request->file('image');
            $photo->move('assets/user/',$photo->getClientOriginalName());
            $users->image = 'assets/user/'.$photo->getClientOriginalName();
        }
        $users->save();

        if ($users) {
            session()->flash('success','User stored successfully');
        } else {
            session()->flash('error','User is wrong!');
        }
        return redirect()->route('user.index');
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
        $user  = User::findOrFail($id);
        return view('admin.author.edit',compact('user'));

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
        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->type = $request->type;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->details = $request->details;

        if($request->hasFile('image'))
        {
            $photo= $request->file('image');
            $photo->move('assets/user/',$photo->getClientOriginalName());
            $user->image = 'assets/user/'.$photo->getClientOriginalName();
        }
        $user->save();

        if ($user) {
            session()->flash('success','User stored successfully');
        } else {
            session()->flash('success','User stored successfully');
        }
        return redirect()->route('user.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = User::findOrFail($id)->delete();


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
        $user = User::find($id);
        $status = 0;
        if ($user->status == 0) {
            $status = 1;
        }
        $user = $user->update(['status' => $status]);

        if ($user) {
            return response()->json(['success' => true, 'Status updated Successfully', 'status' => 200], 200);
        } else {
            return response()->json(['success' => false, 'Whoops! Status not updated', 'status' => 401], 200);
        }
    }

    public function addDecline(Request $request, $id)
    {
        $user = User::findOrFail($id);
        if ($user->update([
            'permission' => $request->permission
        ])) {
            return response()->json(['status' => 'success']);
        }
        return response()->json(['status' => 'fail']);

//        return redirect()->route('user.index');
    }
}
