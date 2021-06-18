<?php

namespace App\Http\Controllers\Admin;

use App\Models\Menu;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MenuBackendController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data =  Menu::all();
        return view('backend.Menu.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.Menu.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

       $data = Menu::create([
            'nama' => $request->nama,
            'harga' => $request->harga,
            'gambar' => $request->file('gambar')->store('assets/images','public'),
            'keterangan' => $request->keterangan,
        ]);
        
        return redirect()->route('backendmenu.index');
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
       $data =  Menu::findOrFail($id);
        return view('backend.Menu.edit',compact('data'));
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

       $data = Menu::where('id', $id)
            ->update([
            'nama' => $request->nama,
            'harga' => $request->harga,
            'keterangan' => $request->keterangan,
      ]);

        if ($request->file('gambar') == null) {
         $file = "";
            }
            else
            {
            $data = Menu::where('id', $id)
                    ->update([
                    'gambar' => $request->file('gambar')->store('assets/images','public'),
            ]);
           }

        return redirect()->route('backendmenu.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Menu::findOrFail($id)->delete();
        return redirect()->route('backendmenu.index');
    }
}
