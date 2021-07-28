<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateRequest;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::paginate(10);
        return view('admin.users.list', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request, User $user)
    {
        $path = $request->file('image')->store('images', 'public');
            $user->username = $request->input('username');
            $user->password = $request->input('password');
            $user->email = $request->input('email');
            $user->phone = $request->input('phone');
            $user->image = $path;
            $path = $request->file('image');
            $path->move('img', 'image.jpg');
            $user->save();
            toastr()->success('Thêm người dùng thành công', 'Success');
            return redirect()->route('user.list');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = DB::table('users')->where('id', $id)->get()->first();
        return view('admin.users.profile', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $users = DB::table('users')->where('id', $id)->get()->first();
        return view('admin.users.update', compact('users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, $id)
    {
        $path = $request->file('image')->store('images', 'public');
        $data = [
            'username' => $request->username,
            'password' => $request->password,
            'phone' => $request->phone,
            'image' => $path
        ];
        DB::table('users')->where('id', $id)->update($data);
        toastr()->success('Update thành công', 'Success');
        return redirect()->route('user.list');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('users')->where('id', $id)->delete();
        toastr()->success('Xóa người dùng thành công', 'Success');
        return redirect()->route('user.list');
    }

    public function search(Request $request)
    {
        $text = $request->name;
        $users = User::where('username', 'like', '%' . $text . '%')->get();
        return view('admin.users.search', compact('users'));
    }
}
