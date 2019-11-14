<?php

namespace App\Http\Controllers;

use App\DC;
use Illuminate\Http\Request;

class DCController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.DController.index');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.DController.create');

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
     * @param  \App\DC  $dC
     * @return \Illuminate\Http\Response
     */
    public function show(DC $dC)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\DC  $dC
     * @return \Illuminate\Http\Response
     */
    public function edit(DC $dC)
    {
        return view('pages.DController.edit');

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\DC  $dC
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DC $dC)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\DC  $dC
     * @return \Illuminate\Http\Response
     */
    public function destroy(DC $dC)
    {
        //
    }
}
