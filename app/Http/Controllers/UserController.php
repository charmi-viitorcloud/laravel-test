<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
// use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Hash;
 use Illuminate\Validation\Rules;
//  use Illuminate\Contracts\Validation\Rule;
 use Illuminate\Validation\Rule;






class UserController extends Controller
{
    /**
     * Display a listing of the user
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $user = User::paginate(10);
        return view('pages.list', ["users" => $user]);
    }

    /**
     * Show the form for creating a new user.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = User::all();
        return view('pages.create', ["users" => $user]);
    }

    /**
     * Store a newly created user in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'firstname' => ['required', 'string','regex:/^[a-zA-Z]+$/u', 'max:255'],
            'lastname' => ['required', 'string', 'regex:/^[a-zA-Z]+$/u','max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            // 'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'dob' => ['required'],
        ]);

        // dd($request->all());
        $user = new User;
        $user->firstname = $request->firstname;
        $user->lastname = $request->lastname;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->password = Hash::make($request->password);
        $user->dob = $request->dob;
        $user->save();

        return redirect()->route('users.index')
            ->with('success', 'User created successfully.');
    }

    /**
     * Display the specified user.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(user $user)
    {
        return User::find($user);
    }

    /**
     * Show the form for editing the specified user.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('pages.edit', compact('user'));
    }

    /**
     * Update the specified resource in user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {

        $request->validate([
            // 'firstname' => ['required', 'string','regex:/^[a-zA-Z]+$/u', 'max:255'],
            // 'lastname' => ['required', 'string', 'regex:/^[a-zA-Z]+$/u','max:255'],
            'email' => 'required|email|unique:users,email,'.$user->id,
            //  'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'dob' => ['required'],
        ]);
        $user->firstname = $request->firstname;
        $user->lastname = $request->lastname;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->password = Hash::make($request->password);
        $user->dob = $request->dob;
        $user->update();

        return redirect()->route('users.index')
            ->with('success', 'User updated successfully');
    }

    /**
     * Remove the specified user from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index')
            ->with('success', 'User deleted successfully');
    }
}
