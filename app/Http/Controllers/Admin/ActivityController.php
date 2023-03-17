<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ActivityRequest;
use App\Models\Activity;
use Illuminate\Http\Request;

class ActivityController extends Controller
{
    public function index()
    {
        $activities = Activity::orderBy('id', 'desc')->get();
        return view('dashboard.activity.index', compact('activities'));
    }

    public function create()
    {
        return view('dashboard.activity.create');
    }

    public function store(ActivityRequest $activityRequest)
    {
        $validated = $activityRequest->validated();

        $activity = Activity::create($validated);

        return redirect()->route('kegiatan.index')->with('status', 'Data Kegiatan Gereja Berhasil di Tambahkan');
    }

    public function edit($id)
    {
        $activity = Activity::find($id);
        return view('dashboard.activity.edit', compact('activity'));
    }

    public function update(ActivityRequest $activityRequest, $id)
    {
        $activity = Activity::find($id);
        $validated = $activityRequest->validated();
        $activity->update($validated);

        return redirect()->route('kegiatan.index')->with('status', 'Data Kegiatan Gereja Berhasil di Edit');
    }

    public function destroy($id)
    {
        Activity::find($id)->delete();

        return redirect()->route('kegiatan.index')->with('status', 'Data Kegiatan Gereja Berhasil di Hapus');
    }
}
