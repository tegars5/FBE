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
        return view('admin.edit', compact('article'));
    }
    public function update(Request $request, string $id)
    {
        // Validasi input
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validasi foto
        ]);

        // Cari artikel yang akan diperbarui
        $article = Article::findOrFail($id);

        // Perbarui data artikel
        $article->title = $request->input('title');
        $article->description = $request->input('description');

        // Jika ada foto baru, simpan foto dan perbarui path-nya
        if ($request->hasFile('photo')) {
            // Hapus foto lama jika ada
            if ($article->photo) {
                Storage::delete('public/' . $article->photo);
            }
            // Simpan foto baru
            $path = $request->file('photo')->store('articles', 'public');
            $article->photo = $path;
        }

        // Simpan perubahan
        $article->save();

        // Redirect dengan pesan sukses
        return redirect()->route('admin.dashboard')->with('success', 'Artikel berhasil diperbarui!');
    }



    public function destroy(string $id)
    {
        $article = Article::findOrFail($id);

        // Hapus gambar terkait jika ada
        if ($article->photo) {
            Storage::delete('public/' . $article->photo);
        }

        // Hapus artikel dari database
        $article->delete();

        return redirect()->route('admin.dashboard')->with('success', 'Artikel berhasil dihapus!');
    }

    public function home()
    {
        $articles = Article::latest()->get(); // atau ->take(5) untuk batasi jumlah
        return view('home', compact('articles'));
    }

    // Di dalam controller yang menampilkan halaman dengan artikel
    // (misalnya HomeController.php atau PageController.php)

    // Jika ingin membatasi jumlah maksimal artikel dari database
    // Anda bisa gunakan kode berikut sebagai alternatif:
    public function indexAlternative()
    {
        // Batasi hanya mengambil maksimal 10 artikel terbaru
        $articles = Article::latest()->take(10)->get();

        // Kirim data ke view
        return view('home', compact('articles'));
    }
}
