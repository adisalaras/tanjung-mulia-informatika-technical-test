<?php

namespace App\Http\Controllers;

use App\Models\AuthenticatedSession;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use PharIo\Manifest\Email;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('auth.login');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    { 
         $validated= $request->validate([
                'email'=> 'required|string|max:255',
                'password' => 'required|string',
                'remember' => 'required|string',
                
            ]);
    
            DB::beginTransaction();
            try{
                
    
                $newProject =AuthenticatedSession::create($validated);
    
                DB::commit();
                return redirect()->route('admin.projects.index')->with('succes', 'Project Created Succesfully');
            }
            catch(\Exception $e){
                DB::rollBack();
    
                return redirect()->back()->with('error', 'System eror'.$e->getMessage());
        }
    
    }

    /**
     * Display the specified resource.
     */
    public function show(AuthenticatedSession $authenticatedSession)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AuthenticatedSession $authenticatedSession)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, AuthenticatedSession $authenticatedSession)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AuthenticatedSession $authenticatedSession)
    {
        //
    }

    public function register(){
        return view('auth.register');
    }

    public function storeRegister(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'terms' => 'accepted',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Login the user
        auth()->login($user);
    }
}
