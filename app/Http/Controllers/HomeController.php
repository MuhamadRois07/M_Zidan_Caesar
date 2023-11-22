<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\tokobunga2;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    //
    public function index() : View
    {
        $tokobunga2 = tokobunga2::get();

        return view('landing', compact('tokobunga2'));
    }

    public function index1() : View
    {
        $tokobunga2 = tokobunga2::get();
        return view('home', compact('tokobunga2'));
    }
    public function index2() : View
    {
        $tokobunga2 = tokobunga2::get();
        return view('homeuser', compact('tokobunga2'));
    }

    public function create() : View
    {
        return view ('create');
    }

    public function store(Request $request) : RedirectResponse
    {
    $this->validate($request,[
        'nama' => 'required',
        'stok' => 'required',
        'harga' => 'required',
        'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $imageName = time().'.'.$image->getClientOriginalExtension();
        $image->storeAs('images', $imageName, 'public');
    } else {
        $imageName = null; // No image uploaded
    }

    tokobunga2::create([
        'nama' => $request->nama,
        'stok' => $request->stok,
        'harga' => $request->harga,
        'image' => $imageName,
    ]);

    return redirect()->route('tokobunga2s.store')->with(['succes' => 'Data Berhasil Disimpan']);
    }

    public function edit(string $id) : View
    {
        $tokobunga2s = tokobunga2::findOrFail($id);

        return view('edit', compact('tokobunga2s'));
    }

    public function destroy(string $id) : RedirectResponse
    {
        $tokobunga2s = tokobunga2::findOrFail($id);
        $tokobunga2s->delete();
        return redirect()->route('tokobunga2s.home')->with(['succes'=>'Data Berhasil Dihapus']);
    }

    public function update(Request $request, $id) :RedirectResponse
    {
    $this->validate($request, [
        'nama' => 'required',
        'stok' => 'required',
        'harga' => 'required',
        'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
     ]);

    $tokobunga2s = tokobunga2::findOrFail($id);
    
    if ($request->hasFile('image')) {
        // Delete the old image if it exists
        if ($tokobunga2s->image) {
            Storage::delete('public/images/' . $tokobunga2s->image);
        }

        $image = $request->file('image');
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $image->storeAs('images', $imageName, 'public');

        $tokobunga2s->image = $imageName; // Update the image file name in the database
    }

    $tokobunga2s->nama = $request->nama;
    $tokobunga2s->stok = $request->stok;
    $tokobunga2s->harga = $request->harga;
    $tokobunga2s->save();
    
    return redirect()->route('tokobunga2s.home')->with('success', 'Bunga berhasil diperbarui.');
    }
}