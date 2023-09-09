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
    public function edit($id)
    {
        $response = Http::get('http://hworks.my.id/api/notes/'.$id);
        if ($response->successful()) {
            $data = $response->json();
            // dd($data);
            return view('edit', compact('data'));
        } else {
            return response()->json(['error' => 'Failed to retrieve data from API'], $response->status());
        }
    }
    public function update(Request $request, $id)
    {
        $data['title'] = $request->input('title');
        $data['due'] = $request->input('due');
        $data['description'] = $request->input('description');
        $data['status'] = $request->input('status');
        // dd($data);
        $response = Http::put('http://hworks.my.id/api/notes/'.$id, $data);
        if ($response->successful()) {
            return redirect('index');
        } else {
            return response()->json(['error' => 'Failed to retrieve data from API'], $response->status());
        }
        return redirect('index');
    }
    public function show($id)
    {
        $response = Http::get('http://hworks.my.id/api/notes/'.$id);
        if ($response->successful()) {
            $data = $response->json();
            // dd($data);
            return view('show', compact('data'));
        } else {
            return response()->json(['error' => 'Failed to retrieve data from API'], $response->status());
        }
        return view('show');
    }
    public function destroy($id)
    {
        $response = Http::delete('http://hworks.my.id/api/notes/'. $id);

        // Memeriksa respons dari API
        if ($response->successful()) {
            return redirect('index')->with('success', 'Data produk berhasil dihapus.');
        } else {
            return redirect()->back()->with('error', 'Gagal menghapus data. Silakan coba lagi.');
        }
    }
    
}
