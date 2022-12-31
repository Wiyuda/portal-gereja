<?php

namespace App\Http\Controllers\Admin;

use App\Models\Banner;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class BannerController extends Controller
{
    public function index()
    {
        $banners = Banner::all();
        return view('dashboard.banner.banner', compact('banners'));
    }

    public function create()
    {
        $statuses = ['Active', 'Non Active'];
        return view('dashboard.banner.create', compact('statuses'));
    }

    public function store(Request $request)
    {

        $validate = $request->validate([
            'image_1' => 'image|file|max:1024|mimes:jpeg,jpg,png|required',
            'title_1' => 'required',
            'deskripsi_1' => 'required',
            'image_2' => 'image|file|max:1024|mimes:jpeg,jpg,png|required',
            'title_2' => 'required',
            'deskripsi_2' => 'required',
            'image_3' => 'image|file|max:1024|mimes:jpeg,jpg,png,|required',
            'title_3' => 'required',
            'deskripsi_3' => 'required',
            'status' => 'required'
        ]);

        $fileExtenstion = $request->image_1->getClientOriginalExtension();
        $image_1 = $request->image_1->storeAs('banner', 'banner'. '-' .time(). '.' .$fileExtenstion);

        $fileExtenstion = $request->image_2->getClientOriginalExtension();
        $image_2 = $request->image_2->storeAs('banner', 'banner'. '-' .time(). '.' .$fileExtenstion);

        $fileExtenstion = $request->image_3->getClientOriginalExtension();
        $image_3 = $request->image_3->storeAs('banner', 'banner'. '-' .time(). '.' .$fileExtenstion);

        Banner::create([
            'image_1' => $image_1,
            'title_1' => $request->title_1,
            'deskripsi_1' => $request->deskripsi_1,
            'image_2' => $image_2,
            'title_2' => $request->title_2,
            'deskripsi_2' => $request->deskripsi_2,
            'image_3' => $image_3,
            'title_3' => $request->title_3,
            'deskripsi_3' => $request->deskripsi_3,
            'status' => $request->status
        ]);

        return redirect()->route('banner.index')->with('status', 'Data Banner Berhasil di Tambahkan');

    }

    public function show($id)
    {
        $banner = Banner::find($id);
        return view('dashboard.banner.detail', compact('banner'));
    }

    public function edit($id)
    {

        $statuses = ['Active', 'Non Active'];
        $banners = Banner::find($id);
        return view('dashboard.banner.edit', compact('banners', 'statuses'));

    }

    public function update(Request $request, $id)
    {

        $validate = $request->validate([
            'image_1' => 'image|file|max:1024|mimes:jpeg,jpg,png|required',
            'title_1' => 'required',
            'deskripsi_1' => 'required',
            'image_2' => 'image|file|max:1024|mimes:jpeg,jpg,png|required',
            'title_2' => 'required',
            'deskripsi_2' => 'required',
            'image_3' => 'image|file|max:1024|mimes:jpeg,jpg,png,|required',
            'title_3' => 'required',
            'deskripsi_3' => 'required',
            'status' => 'required'
        ]);

        $fileExtenstion = $request->image_1->getClientOriginalExtension();
        $image_1 = $request->image_1->storeAs('banner', 'banner'. '-' .time(). '.' .$fileExtenstion);

        $fileExtenstion = $request->image_2->getClientOriginalExtension();
        $image_2 = $request->image_2->storeAs('banner', 'banner'. '-' .time(). '.' .$fileExtenstion);

        $fileExtenstion = $request->image_3->getClientOriginalExtension();
        $image_3 = $request->image_3->storeAs('banner', 'banner'. '-' .time(). '.' .$fileExtenstion);

        Banner::find($id)->update([
            'image_1' => $image_1,
            'title_1' => $request->title_1,
            'deskripsi_1' => $request->deskripsi_1,
            'image_2' => $image_2,
            'title_2' => $request->title_2,
            'deskripsi_2' => $request->deskripsi_2,
            'image_3' => $image_3,
            'title_3' => $request->title_3,
            'deskripsi_3' => $request->deskripsi_3,
            'status' => $request->status
        ]);

        return redirect()->route('banner.index')->with('status', 'Data Banner Berhasil di Update');
    }

    public function destroy($id)
    {

        Banner::find($id)->delete(); 
        return redirect()->route('banner.index')->with('status', 'Data Banner Berhasil di Hapus');

    }
}
