<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;

use Illuminate\Http\Request;

class NotesController extends Controller
{
    public function index()
    {    
        $response = Http::get('http://hworks.my.id/api/notes');
        if ($response->successful()) {
            $data = $response->json();
            // dd($data);
            return view('index', compact('data'));
        } else {
            return response()->json(['error' => 'Failed to retrieve data from API'], $response->status());
        }
    }
    public function create()
    {
        return view('create');
    }
    public function store(Request $request)
    {
        $data['title'] = $request->input('title');
        $data['due'] = $request->input('due');
        $data['description'] = $request->input('description');
        $data['status'] = $request->input('status');
        $response = Http::post('http://hworks.my.id/api/notes', $data);
        if ($response->successful()) {
            return redirect('index');
        } else {
            return response()->json(['error' => 'Failed to retrieve data from API'], $response->status());
        }
    }
    public function edit()
    {
        return view('edit');
    }
    public function update()
    {
        return redirect('index');
    }
    public function show($id)
    {
        return view('show');
    }
    public function destroy()
    {
        return redirect('index');
    }
    
}
