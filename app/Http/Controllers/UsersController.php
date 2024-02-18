<?php

// app/Http/Controllers/UsersController.php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UsersController extends Controller
{
        public function index()
        {
            $users = User::all();
            return view('users.index', compact('users'));
        }
    
        public function create()
        {
            // Formularz dodawania użytkownika
            return view('users.create');
        }
    
        public function store(Request $request)
        {
            // Walidacja i zapis nowego użytkownika
            if(auth()->user()->id==2){
            User::create($request->all());
    
            return redirect()->route('users.index')->with('success', 'User created successfully');
            }else{
                return redirect()->route('home')->with('error', 'You are not authorized to add new user');
            }
        }
    
        public function edit($id)
        {
            $user = User::findOrFail($id);
            return view('users.edit', compact('user'));
        }
    
        public function update(Request $request, $id)
        {
            if(auth()->user()->id==2){
            $user = User::find($id);

            $user->name = $request->input('name');
            $user->email = $request->input('email');
        
            // Sprawdzamy, czy hasło jest obecne przed przypisaniem
            if ($request->filled('password')) {
                $user->password = bcrypt($request->input('password'));
            }
        
            // Usuń istniejące zdjęcie, jeśli istnieje
            $userId = $user->id;
            $existingImagePath = "public/avatar/{$userId}.png";
            if (Storage::exists($existingImagePath)) {
                Storage::delete($existingImagePath);
            }
        
            // Zapisz nowe zdjęcie, jeśli zostało przesłane
            if ($request->hasFile('photo')) {
                $photoPath = $request->file('photo')->storeAs('public/avatar', "{$userId}.png");
        
                // Aktualizuj pole 'img' w tabeli 'users'
                $user->img = "storage/avatar/{$userId}.png";
            }
        
            // Pozostała logika aktualizacji...
        
            $user->save();
            
            return redirect()->route('users.index')->with('success', 'User updated successfully');
            }else{
                return redirect()->route('home')->with('error', 'You are not authorized to update this user');
            }
        }
    
        public function destroy($id)
        {
            if(auth()->user()->id==2){
            $user = User::findOrFail($id);
            $userId = $user->id;
            $existingImagePath = "public/avatar/{$userId}.png";
            if (Storage::exists($existingImagePath)) {
                Storage::delete($existingImagePath);
            }
            $user->delete();
    
            return redirect()->route('users.index')->with('success', 'User deleted successfully');
            }else{
                return redirect()->route('home')->with('error', 'You are not authorized to delete this user');
            }
        }
    }
    
