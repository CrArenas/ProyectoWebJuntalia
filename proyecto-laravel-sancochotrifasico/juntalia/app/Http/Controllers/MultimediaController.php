<?php

namespace App\Http\Controllers;

use App\Models\multimedia;
use Illuminate\Http\Request;

class MultimediaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $multimedias = multimedia::all();
        return view('multimedias.index', compact('multimedias'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $multimedia = new multimedia();
        $multimedia->source_url = $request->source_url;
        $multimedia->save();
        return redirect()->route('multimedias.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(multimedia $multimedia)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(multimedia $multimedia)
    {
        $multimedia = multimedia::find($id);
        return view('multimedias.edit', compact('multimedia'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, multimedia $multimedia)
    {
        $multimedia->source_url = $request->source_url;
        $multimedia->save();
        return redirect()->route('multimedias.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(multimedia $multimedia)
    {
        $multimedia->delete();
        return redirect()->route('multimedias.index');
    }
}
