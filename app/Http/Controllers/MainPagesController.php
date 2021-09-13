<?php

namespace App\Http\Controllers;


use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Models\Main;

class MainPagesController extends Controller
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

    public function dashboard()
    {
        return view('pages.dashboard');
    }

    public function index()
    {
        $main=Main::first();
        return view('pages.main', compact('main'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|string',
            'sub_title' => 'required|string', 
            'icon' => 'required|string', 
        ]);

        $main=Main::first();
        $main->title=$request->title;
        $main->sub_title=$request->sub_title;
        $main->icon=$request->icon;

        if($request->file('img')){
            $img_file = $request->file('img');
            $img_file->storeAs('public/img/','img.' . $img_file->getClientOriginalExtension());
            $main->img = 'storage/img/img.' . $img_file->getClientOriginalExtension();
        }


        $main->save();

        return redirect()->route('admin.main')->with('success', "Main Page data has been updated successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
