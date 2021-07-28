<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function formLogin()
    {
        return view('login');
    }


    public function login(Request $request)
    {
        $users = User::all();
//        dd($users);
        $username = $request->input('username');
        $password = $request->input('password');
        foreach ($users as $user) {
            if ($username == $user->username && $password == $user->password) {
                $userLogin = [
                    'id' => $user->id,
                    'username' => $username,
                    'password' => $password,
                    'phone' => $user->phone,
                    'email' => $user->email,
                    'image' => $user->image
                ];
                session()->put('userLogin', $userLogin);
                toastr()->success('Welcome ' . session('userLogin')['username'], 'Success');
                return redirect()->route('home');

            }
        }
        session()->flash('login_error', 'Account not exits');
        return redirect()->route('login');
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        return view('register');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function register(Request $request, User $user)
    {
        $user->username = $request->input('username');
        $user->password = $request->input('password');
        $user->email = $request->input('email');
        $user->phone = $request->input('phone');
        $user->save();
        toastr()->success(' Thêm người dùng thành công', 'Success');
        return redirect()->route('login');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout()
    {
        session()->forget('userLogin');
        return redirect()->route('login');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        return view('admin.users.yourprofile');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
