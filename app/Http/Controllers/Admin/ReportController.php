<?php

namespace App\Http\Controllers\Admin;

use App\Models\Report;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rules\Exists;

class ReportController extends Controller
{
    public function index()
    {
        $reports = Report::orderBy('id', 'desc')->get();
        return view('dashboard.report.index', compact('reports'));
    }

    public function create()
    {
        return view('dashboard.report.create');
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'title' => 'required',
            'thumbnail' => 'required|image|max:1024|mimes:jpeg,jpg,png',
            'news' => 'required'
        ]);

        $extenstion = $request->file('thumbnail')->getClientOriginalExtension();
        $imageName = 'thumbnail' . '-' . rand() . '.' .$extenstion;
        $path = $request->file('thumbnail')->storeAs('thumbnail', $imageName, 'public');

        $report = Report::create([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'thumbnail' => $imageName,
            'news' => $request->news
        ]);

        return redirect()->route('berita.index')->with('status', 'Berita Baru Gereja Berhasil di Tambahkan');
    }

    public function edit($id)
    {
        $report = Report::find($id);
        return view('dashboard.report.edit', compact('report'));
    }

    public function update(Request $request, $id)
    {
        $validate = $request->validate([
            'title' => 'required',
            'thumbnail' => 'required|image|max:1024|mimes:jpeg,jpg,png',
            'news' => 'required'
        ]);

        $thumbnailOld = Report::find($id);
        $pathOld = public_path('storage/thumbnail/'. $thumbnailOld->thumbnail);

        $extenstion = $request->file('thumbnail')->getClientOriginalExtension();
        $imageName = 'thumbnail' . '-' . rand() . '.' .$extenstion;
        $path = $request->file('thumbnail')->storeAs('thumbnail', $imageName, 'public');

        if(File::exists($pathOld)) {
            File::delete($pathOld);
        };

        $report = Report::find($id)->update([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'thumbnail' => $imageName,
            'news' => $request->news
        ]);

        return redirect()->route('berita.index')->with('status', 'Berita Baru Gereja Berhasil di Update');
    }

    public function destroy($id)
    {
        $report = Report::find($id)->delete();
        return redirect()->route('berita.index')->with('status', 'Berita Baru Gereja Berhasil di Hapus');
    }
}
