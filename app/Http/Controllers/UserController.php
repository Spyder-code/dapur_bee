<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Repositories\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    private $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }


    public function index()
    {
        $data = $this->userService->all();
        return view('admin.user.index', compact('data'));
    }


    public function create()
    {
        return view('admin.user.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8'
        ]);

        $data = $request->all();
        $data['password'] = Hash::make($data['password']);
        $this->userService->store($data);
        return redirect()->route('user.index')->with('success','User has success created');
    }


    public function show(User $user)
    {
        return view('admin.user.show', compact('user'));
    }


    public function edit(User $user)
    {
        return view('admin.user.edit', compact('user'));
    }


    public function update(Request $request, User $user)
    {
        $data = $request->all();
        if($request->password){
            $data['password'] = Hash::make($data['password']);
        }else{
            unset($data['password']);
        }
        $this->userService->update($data,$user->id);
        return redirect()->route('user.index')->with('success','User has success updated');
    }


    public function destroy(User $user)
    {
        $this->userService->destroy($user->id);
        return redirect()->route('user.index')->with('success','User has success deleted');
    }

    public function dataTable()
    {
        return $this->userService->dataTable();
    }
}
