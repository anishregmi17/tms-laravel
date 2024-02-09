<?php

namespace App\Http\Controllers;

use App\Models\AboutFeature;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class AboutFeatureController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $aboutFeatures = new AboutFeature;
        $aboutFeatures = $aboutFeatures->paginate(3);

        return view('admin.about_features.index', compact('aboutFeatures'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.about_features.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate(
            [
                'icon' => 'required',
                'title' => 'required',
                'description' => 'required',
            ]
        );

        // if ($request->hasFile('icon') && $request->file('icon')->isValid()) {
        if ($request->icon != NULL) {
            // The file is valid and can be uploaded
            $fileName = $request->id . "-" . time() . '.' . $request->icon->extension();
            $request->icon->move(public_path('uploads'), $fileName);
            }

        $aboutFeatures = new AboutFeature;
        $aboutFeatures->icon = $fileName;
        $aboutFeatures->title = $request->title;
        $aboutFeatures->description = $request->description;

        $aboutFeatures->save();
        notify()->success('Data is added successfully!');
        return redirect()->route('about-feature.index');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $aboutFeatures = new AboutFeature;
        $aboutFeatures = $aboutFeatures->where('id', $id)->first();

        return view('admin.about_features.view', compact('aboutFeatures'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $aboutFeatures = new AboutFeature;
        $aboutFeatures = $aboutFeatures->where('id', $id)->first();

        return view('admin.about_features.edit', compact('aboutFeatures'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $aboutFeatures = new AboutFeature;
        $aboutFeatures = $aboutFeatures->where('id', $id)->First();
       
        if ($request->icon != NULL) {
            $fileName = $request->title . "-" . time() . '.' . $request->icon->extension();
            File::delete(public_path('uploads/' . $aboutFeatures->icon));
            $request->icon->move(public_path('uploads'), $fileName);
            $aboutFeatures::where('id', $id)
                ->update([
                    'icon' => $fileName,
                ]);
        }



        $aboutFeatures->title = $request->title;
        $aboutFeatures->description = $request->description;
        $aboutFeatures->update();

        notify()->success('Data is updated successfully!');

        return redirect()->route('about-feature.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $aboutFeatures = new AboutFeature;
        $aboutFeatures = $aboutFeatures->where('id', $id)->first();
        $aboutFeatures->delete();

        notify()->success('Data is deleted successfully!');

        return redirect()->route('about-feature.index');
    }
}