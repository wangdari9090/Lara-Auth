<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Model;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
   public function index(Request $request)
{
    // Start a query on the User model
    $query = User::query();

    // Check if the user has typed anything in the search box
    if ($request->filled('search')) {
        $search = $request->search;
        
        $query->where(function($q) use ($search) {
            $q->where('name', 'LIKE', "%{$search}%")
              ->orWhere('email', 'LIKE', "%{$search}%")
              ->orWhere('id', 'LIKE', "%{$search}%");
        });
    }
    $users = $query->orderBy('id', 'desc')->paginate(10)->withQueryString();

    return view('users.index', compact('users'));
}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'role' => 'required|string',
            'password' => 'required|string|min:8|confirmed',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('users.index')->with('success', 'User created successfully.');
    }

 /**
 * Show the form for editing the specified resource.
 */
public function edit(string $id)
{
    $user = User::findOrFail($id);
    return view('users.edit', compact('user'));
}

/**
 * Update the specified resource in storage.
 */
    public function update(Request $request, string $id)
    {
        // 1. Find the specific instance first
        $user = User::findOrFail($id);

        // 2. Validate
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
        ]);

        // 3. Save the data to that specific instance
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save(); // Use save() instead of update() to avoid static collision

        return redirect()->route('users.index')->with('success', 'User updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::findOrFail($id);
        
        if (auth()->id() == $user->id) {
            return redirect()->route('users.index')->with('error', 'You cannot delete your own account.');
        }

        $user->delete();
        return redirect()->route('users.index')->with('success', 'User deleted successfully.');
    }
}