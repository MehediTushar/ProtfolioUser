<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;

use App\Models\About;

class AboutPagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware(['auth:sanctum', 'verified']);
    }
    
    public function view()
    {
        $abouts=About::all();
        return view('pages.about.view', compact('abouts'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.about.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|string',
            'icon' => 'required|string', 
            'description' => 'required|string', 
        ]);

        $abouts=new About;
        $abouts->title=$request->title;
        $abouts->icon=$request->icon;
        $abouts->description=$request->description;

        $pdf_file = $request->file('resume');
        Storage::putFile('public/pdf/', $pdf_file);
        $abouts->resume ="storage/pdf/".$pdf_file->hashName();

        $abouts->save();
        return redirect()->route('admin.about.create')->with('success', "New Info Create successfully");

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $abouts=About::find($id);
        return view('pages.about.edit', compact('abouts'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required|string',
            'icon' => 'required|string', 
            'description' => 'required|string', 
        ]);

        $abouts=About::find($id);
        $abouts->title=$request->title;
        $abouts->icon=$request->icon;
        $abouts->description=$request->description;

        if($request->file('resume'))
        {
            $pdf_file = $request->file('resume');
            Storage::putFile('public/pdf/', $pdf_file);
            $abouts->resume ="storage/pdf/".$pdf_file->hashName();
        }
        

        $abouts->save();
        return redirect()->route('admin.about.view')->with('success', "New Info Updated successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $abouts=About::find($id);
        @unlink(public_path($abouts->resume));
        $abouts->delete();
        return redirect()->route('admin.about.view')->with('success', "Data Delete successfully");
    }
}
