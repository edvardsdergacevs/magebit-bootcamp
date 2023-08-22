<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Validation\ValidationException;
use Illuminate\Validation\Rules;

class UserController extends Controller
{
    /**
    * Display a listing of the resource.
    */
    public function index(): View
    {
        $users = User::all();

        return view('admin.users', compact('users'));
    }

    /**
    * Show the form for creating a new resource.
    */
    public function create(): View
    {
        return view('admin.user_edit', ['user' => []]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        User::create($request->post());

        return redirect()->route('admin.user.index')->with('status','User has been created successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user): RedirectResponse
    {
        $user->delete();

        return redirect()->route('admin.user.index')
            ->with('success','Company has been deleted successfully');
    }
}
