<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\StoreUserRequest;
use App\Http\Requests\User\UpdateUserRequest;
use Illuminate\Http\Request;

use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $users = User::where('is_active',1)->get();
        return view('users.index', compact('users'));
    }

    public function indexDeactivated()
    {
        $users = User::where('is_active',0)->get();
        return view('users.index', compact('users'));
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(StoreUserRequest $request)
    {

        $data = [
            'name' => $request->name,
            'surname' => $request->surname,
            'lastname' => $request->lastname,
            'phone' => $request->phone,
            'occupation' => $request->occupation,
            'address' => $request->address,
            'department' => $request->department,
            'salary' => $request->salary,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ];

        $user = User::create($data);
        if ($user) {
            session()->flash('success', 'Successfully created a user');
        } else {
            session()->flash('error', 'Something went wrong while creating the user');
        }

        return redirect()->route('user.index');
    }

    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    public function update(UpdateUserRequest $request, User $user)
    {
        if ($request->has('password') && !empty($request->input('password'))) {
            $rules['password'] = [
                'string',
                'min:8',
                'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*(_|[^\w])).+$/',

            ];

            $customMessages = [
                'password.min' => 'Password should be at least 8 symbols',
                'password.regex' => 'Password should have at least one small letter, one uppercase letter and a special symbol!',
            ];

            $this->validate($request, $rules, $customMessages);
        }

        $data = [
            'name' => $request->name,
            'surname' => $request->surname,
            'lastname' => $request->lastname,
            'phone' => $request->phone,
            'occupation' => $request->occupation,
            'address' => $request->address,
            'department' => $request->department,
            'salary' => $request->salary,
            'email' => $request->email,
        ];

        if ($request->has('password') && !empty($request->input('password'))) {
            $data['password'] = bcrypt($request->password);
        }

        $user->update($data);

        if ($user) {
            session()->flash('success', 'Successfully updated a user');
        } else {
            session()->flash('error', 'Something went wrong while updating the user');
        }

        return redirect()->route('user.index');

    }

    public function activate(User $user)
    {
        $user->update(['is_active' => 1]);
        return 1;
    }

    public function deactivate(User $user)
    {
        $user->update(['is_active' => 0]);
        return 1;
    }

    public function destroy(User $user)
    {

    }
}
