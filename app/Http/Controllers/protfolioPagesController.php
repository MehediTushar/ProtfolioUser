<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;

use App\Models\Protfolio;

class protfolioPagesController extends Controller
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
        $protfolios=Protfolio::all();
      return view('pages.protfolio.view',compact('protfolios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.protfolio.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'title'=>'required|string', 
            'icon'=>'required|string',
            'small_img'=>'required|image',
            'big_img'=>'required|image',
            'description'=>'required|string'
        ]);

        $protfolios= new Protfolio;
        $protfolios->title=$request->title;
        $protfolios->icon=$request->icon;
        $protfolios->description=$request->description;

        $big_file = $request->file('big_img');
        Storage::putFile('public/img/', $big_file);
        $protfolios->big_img ="storage/img/".$big_file->hashName();

        $sm_file = $request->file('small_img');
        Storage::putFile('public/img/', $sm_file);
        $protfolios->small_img ="storage/img/".$sm_file->hashName();

        $protfolios->save();
        return redirect()->route('admin.protfolio.create')->with('success', "New Info Create successfully");

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
        $protfolios=Protfolio::find($id);
        return view('pages.protfolio.edit',compact('protfolios'));
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
        $this->validate($request,[
            'title'=>'required|string', 
            'icon'=>'required|string',
            'small_img'=>'required|image',
            'big_img'=>'required|image',
            'description'=>'required|string'
        ]);

        $protfolios=Protfolio::find($id);
        $protfolios->title=$request->title;
        $protfolios->icon=$request->icon;
        $protfolios->description=$request->description;

        if($request->file('big_img'))
        {
            $big_file = $request->file('big_img');
            Storage::putFile('public/img/', $big_file);
            $protfolios->big_img ="storage/img/".$big_file->hashName();
        }

        if($request->file('small_img'))
        {
            $sm_file = $request->file('small_img');
            Storage::putFile('public/img/', $sm_file);
            $protfolios->small_img ="storage/img/".$sm_file->hashName();
        }

        $protfolios->save();
        return redirect()->route('admin.protfolio.view')->with('success', "New Info Updated successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $protfolios=Protfolio::find($id);
        @unlink(pulic_path($protfolios->big_img));
        @unlink(pulic_path($protfolios->small_img));
        $protfolios->delete();
        return redirect()->route('admin.protfolio.view')->with('success', "Data Delete successfully");

    }
}
