<?php

namespace App\Http\Controllers;

use App\Models\Guest;
use Illuminate\Http\Request;

class GuestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(Guest::all(), 200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
public function store(Request $request)
{
    
    $validated = $request->validate([
        'name'  => 'required|string|max:50',
        'phone' => 'required|string|max:20',
        'email' => 'required|email|unique:guests,email'
    ]);

    
    $guest = Guest::create([
        'name'  => $validated['name'],
        'phone' => $validated['phone'],
        'email' => $validated['email']
    ]);

    
    return response()->json($guest, 201);
}




    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $guest = Guest::findOrFail($id);
        return response()->json($guest, 200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {

        $guest = Guest::findOrFail($id);
        $guest->update([
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email
        ]);
        return response()->json($guest, 200);
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $guest = Guest::findOrFail($id);
        $guest->delete();
        return response()->json(['message' => 'Guest deleted'], 204);
    }
}
