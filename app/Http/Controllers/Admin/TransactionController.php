<?php

namespace App\Http\Controllers\Admin;

use App\Models\Cart;
use App\Models\Menu;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $data = Transaction::with('cart','menu','user')->get();
        return view('backend.Transaksi.index')->with([
            'data' => $data
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
            DB::table('transaction')->insert([
                'users_id' => $request -> users_id,
                'order_id' => $request -> order_id,
                'address' => $request -> address,
                'phone' => $request -> phone,
                'tanggal' => Carbon::today(),
                'total_price' => $request -> total_price,
            ]);
        return redirect()->route('success');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       $data = Cart::with('menu','user')->where('order_id',$id)->get();
        return view('backend.Transaksi.show')->with([
            'data' => $data
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $data = Transaction::findOrFail($id);
       return view('backend.Transaksi.edit',compact('data'));
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
      $item = Transaction::findOrFail($id)->update([
          'transaction_status' => $request -> transaction_status,
      ]);

      return redirect()->route('transaction.index');
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

        return response()->json([
            'success' => 'Record deleted successfully!'
        ]);

    }
    public function order(Request $request, $id)
    {

        $item = $request -> item;
        $arr = $request -> quantity;
        
       $data = DB::table('cart')->orderBy('order_id','DESC')->where('users_id',Auth::user()->id)->first();
       if ($data -> order_id == null) {
         $orderid = 1;
                for ($i=0; $i < count($item) ; $i++) { 
                        DB::table('cart')
                        ->where('menu_id',$item[$i]['menu_id'])
                        ->where('users_id',Auth::user()->id)
                        ->where('id',$item[$i]['cart_id'])
                        ->update([
                         'order_id' => $orderid,
                        'quantity' => $item[$i]['quantity'],
            ]);


                //  DB::table('cart')->where('menu_id',$item[$i]['menu_id'])
                //              ->where('order_id',$orderid)->update([
                //                     'order_id' => $orderid,
                //                     'quantity' => $item[$i]['quantity'],
                //             ]);

        };
       }
       else{
           $orderid = $data -> order_id + 1;
                 for ($i=0; $i < count($item) ; $i++) { 
                      DB::table('cart')
                      ->where('menu_id',$item[$i]['menu_id'])
                      ->where('users_id',Auth::user()->id)
                       ->where('id',$item[$i]['cart_id'])

                      ->update([
                       'order_id' => $orderid,
                        'quantity' => $item[$i]['quantity'],
            ]);


        };

       }


        $nama = $request -> nama;
        $phone = $request -> phone;
        $address = $request -> address;

        $data = Cart::with('menu','user')->where('users_id',$id)->where('order_id',$orderid)->get();
        return view('frontend.order.index')->with([
            'data' => $data,
            'nama' => $nama,
            'phone' => $phone,
            'address' => $address,
            'order_id' => $orderid,
            
        ]);
    }
}
