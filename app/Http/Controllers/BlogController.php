<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use function PHPSTORM_META\elementType;

class BlogController extends Controller
{
    use ValidatesRequests;

    public function index()
    {
        return view('blog');
    }

    public function admin_index()
    {
        $title = 'Blog';
        $blog = Blog::all();
        return view('admin.blog.index', compact('title', 'blog'));
    }

    public function admin_create()
    {
        $title = 'Upload Blog';
        return view('admin.blog.create', compact('title'));
    }

    public function admin_store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'slug' => 'required',
            'content' => 'required',
            'thumbnail' => 'required'
        ]);

        $imageName = time() . '.' . $request->thumbnail->getClientOriginalExtension();
        $request->thumbnail->move(public_path('assets/image/blog'), $imageName);

        $obat = Blog::create([
            'id_author' => Auth::user()->id,
            'title' => $request->title,
            'slug' => $request->slug,
            'content' => $request->content,
            'thumbnail' => $imageName
        ]);

        if ($obat) {
            return redirect()->route('dashboard.blog.index')->with('message', 'Blog Berhasil Diupload!');
        } else {
            return redirect()->route('dashboard.blog.tambah')->with('error', 'Terjadi Kesalahan Saat Mengupload Blog!');
        }
    }

    public function admin_edit(string $id)
    {
        $title = 'Edit Blog';
        $blog = Blog::findOrFail($id);
        return view('admin.blog.edit', compact('title', 'blog'));
    }

    public function admin_update(Request $request, string $id)
    {
        $blog = Blog::findOrFail($id);
        $this->validate($request, [
            'title' => 'required',
            'slug' => 'required',
            'content' => 'required',
            'thumbnail' => 'nullable|required'
        ]);

        if ($request->hasFile('thumbnail')) {
            if ($blog->thumbnail && file_exists(public_path('assets/image/blog/' . $blog->thumbnail))) {
                unlink(public_path('assets/image/blog/' . $blog->thumbnail));
            }

            $imageName = time() . '.' . $request->thumbnail->getClientOriginalExtension();
            $request->thumbnail->move(public_path('assets/image/blog'), $imageName);

            $blog->update([
                'id_author' => Auth::user()->id,
                'title' => $request->title,
                'slug' => $request->slug,
                'content' => $request->content,
                'thumbnail' => $imageName
            ]);
        } else {
            $blog->update([
                'title' => $request->title,
                'slug' => $request->slug,
                'content' => $request->content
            ]);
        }

        if ($blog) {
            return redirect()->route('dashboard.blog.index')->with('message', 'Blog Berhasil Diupload!');
        } else {
            return redirect()->route('dashboard.blog.edit', $blog->id)->with('error', 'Terjadi Kesalahan Saat Mengupload Blog!');
        }
    }

    public function admin_destroy(string $id)
    {
        $blog = Blog::findOrFail($id);
        if ($blog->thumbnail && file_exists(public_path('assets/image/blog/' . $blog->thumbnail))) {
            unlink(public_path('assets/image/blog/' . $blog->thumbnail));
        }
        $blog->delete();
        return redirect()->route('dashboard.blog.index');
    }
}
