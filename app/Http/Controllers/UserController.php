<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Tables\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use ProtoneMedia\Splade\Facades\Toast;
use ProtoneMedia\Splade\SpladeTable;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('users.index', [
            'users' => Users::class,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $gender = [
            'Male' => 'Male',
            'Female' => 'Female',
        ];
        //
        return view('users.create',[
        'gender' => $gender
    ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        // dd($request->all());
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'gender' => $request->gender,
            'password' => Hash::make($request->password)
        ]);
        Toast::title('User Data Tersimpan')->autoDismiss(3);
        // return redirect()->route('user.index');
        return to_route('users.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        $gender = [
            'Male' => 'Male',
            'Female' => 'Female',
        ];
        //
        return view('users.edit',[
            'user' => $user,
            'gender' => $gender
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //
        $user->update([
            'name'=> $request->name,
            'email'=> $request->email,
            'gender' => $request->gender,
            'password'=> Hash::make($request->password)
        ]);
        Toast::title('User Data Update')->autoDismiss(3);

        return to_route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
        $user->delete();
        Toast::title('User Data Terhapus')->danger()->autoDismiss(3);
        // return redirect()->route('user.index');
        return to_route('users.index');
    }
}
