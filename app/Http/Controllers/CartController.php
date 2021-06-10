<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    //     $tran = DB::table('transaction')->where('users_id',Auth::user()->id)->pluck('order_id')->toArray();

        
    //    $data =  DB::table('d')->whereNotIn('order_id',$tran)
    //                              ->where('users_id',Auth::user()->id)->get();

    //                              select * from `d` where `order_id` not in (7, 1) and `users_id` = 1

    //                     dd($data);

        $id = Auth::user()->id;
        $data = Cart::with('menu','user')->where('users_id',$id)->where('order_id',null)->get();
        $datacustomer = Menu::findOrFail($id);

        return view('frontend.cart.index')->with([
            'data' => $data,
            'datacustomer' => $datacustomer,
        ]);
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
        $data = Menu::findOrFail($id);
        return view('frontend.cart.index',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $cart = Cart::findOrFail($id);
        $cart->delete();

        return redirect()->route('cart.index');
    }
    public function add(Request $request,$id)
    {

        $data =[
            'menu_id' => $id,
            'users_id' => Auth::user()->id,
        ];

        Cart::create($data);
        return redirect()->route('cart.index');

    }
}
