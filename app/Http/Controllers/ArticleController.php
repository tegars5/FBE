<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::all();
        return view('admin.dashboard', compact('articles'));
    }

    public function create()
    {
        return view('admin.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Proses upload gambar jika ada
        $photoPath = null;
        if ($request->hasFile('photo')) {
            $photo = $request->file('photo');
            $photoPath = $photo->store('assets', 'public'); // Simpan gambar di folder public/assets
        }
        Article::create([
            'title' => $request->title,
            'description' => $request->description,
            'photo' => $photoPath, // Simpan path gambar di database
        ]);

        return redirect()->route('admin.dashboard')->with('success', 'Artikel berhasil disimpan!');
    }

    public function show(string $id)
    {
        $article = Article::findOrFail($id);
        return view('articles.show', compact('article'));
    }

    public function edit(string $id)
    {
        $article = Article::findOrFail($id);
        return view('articles.edit', compact('article'));
    }

    public function update(Request $request, string $id)
    {
        $article = Article::findOrFail($id);

        // Validasi input
        $validatedData = $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Proses upload gambar baru jika ada
        $photoPath = $article->photo; // Defaultnya menggunakan foto lama
        if ($request->hasFile('photo')) {
            // Hapus foto lama jika ada
            if ($photoPath) {
                Storage::delete('public/' . $photoPath);
            }

            $photo = $request->file('photo');
            $photoPath = $photo->store('assets', 'public'); // Simpan gambar baru di folder public/assets
        }

        // Perbarui artikel dengan data baru
        $article->update([
            'title' => $request->title,
            'description' => $request->description,
            'photo' => $photoPath, // Perbarui path gambar di database
        ]);

        return redirect()->route('admin.dashboard')->with('success', 'Artikel berhasil diperbarui!');
    }


    public function destroy(string $id)
    {
        $article = Article::findOrFail($id);
        $article->delete();
        return redirect()->route('admin.dashboard')->with('success', 'Artikel berhasil dihapus!');
    }
    public function home()
    {
        $articles = Article::latest()->get(); // atau ->take(5) untuk batasi jumlah
        return view('home', compact('articles'));
    }
    
}
