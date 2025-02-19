<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use illuminate\Support\Facades\Storage;
use Barryvdh\DomPDF\Facade\Pdf;

class PostController extends Controller
{
    public function index()
    {
        //get posts
        $posts = Post::latest()->paginate(5);
        //render view with posts
        return view('posts.index', compact('posts'));
    }
    public function create()
    {
        return view('posts.create');
    }
    public function store(Request $request)
    {
        //validate form
        $request->validate([
            'foto_mahasiswa' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'nim' => 'required|min:5',
            'nama_mahasiswa' => 'required|min:5'
        ]);
        //upload image
        $image = $request->file('foto_mahasiswa');
        $image->storeAs('public/posts', $image->hashName());
        //create post
        Post::create([
            'foto_mahasiswa' => $image->hashName(),
            'nim' => $request->nim,
            'nama_mahasiswa' => $request->nama_mahasiswa
        ]);
        //redirect to index
        return redirect()->route('posts.index')->with([
            'success' => 'Data Berhasil
Disimpan!'
        ]);
    }
    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }
    public function update(Request $request, Post $post)
    {
        //validate form
        $request->validate([
            'foto_mahasiswa' =>
            'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'nim' => 'required|min:5',
            'nama_mahasiswa' => 'required|min:5'
        ]);
        //check if image is uploaded
        if ($request->hasFile('foto_mahasiswa')) {
            //upload new image
            $image = $request->file('foto_mahasiswa');
            $image->storeAs('public/posts', $image->hashName());
            //delete old image
            Storage::delete('public/posts/' . $post->foto_mahasiswa);
            //update post with new image
            $post->update([
                'foto_mahasiswa' => $image->hashName(),
                'nim' => $request->nim,
                'nama_mahasiswa' => $request->nama_mahasiswa
            ]);
        } else {
            //update post without image
            $post->update([
                'nim' => $request->nim,
                'nama_mahasiswa' => $request->nama_mahasiswa
            ]);
        }
        //redirect to index
        return redirect()->route('posts.index')->with([
            'success' => 'Data
Berhasil Diubah!'
        ]);
    }

    public function show($id)
    {
        $post = Post::findOrFail($id);
        return view('posts.show', compact('post'));
    }

    public function destroy(Post $post)
    {
        // Hapus gambar, pastikan Anda memeriksa apakah gambar ada sebelum menghapusnya
        if ($post->image && Storage::exists('public/posts/' . $post->image)) {
            Storage::delete('public/posts/' . $post->image);
        }

        // Hapus post
        $post->delete();

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('posts.index')->with([
            'success' => 'Data Berhasil Dihapus!'
        ]);
    }


    public function downloadPDF()
    {
        $posts = Post::all(); // Fetch all posts (students)
        $pdf = PDF::loadView('posts.download', compact('posts')); // Create PDF from the view
        return $pdf->download('mahasiswa.pdf'); // Download the generated PDF
    }

    // function view_pdf()
    // {
    //     $mpdf = new \Mpdf\Mpdf();
    //     $posts = Post::all();
    //     $mpdf->WriteHTML('<h1>Hello world!</h1>');
    //     $mpdf->Output();
    // }
}
