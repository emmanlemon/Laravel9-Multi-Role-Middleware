<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Shops;
use Illuminate\Support\Facades\DB;

class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $shops = Shops::all();
        // return view('superadmin.shop', compact('shops'));
        $usersAndShops = DB::table('users')
                        ->join('shops', 'users.id', '=', 'shops.users_id')
                        ->select('users.*', 'shops.*')
                        ->get();
        // $shops = Shops::with('user')->get();
        return view('superadmin.shop', compact('usersAndShops'));
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
        $shops = Shops::create($request->all());
        return redirect()->back()->with('message', 'Shop Created Successfully.');
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
    public function update(Request $request, Shops $shops)
    {
        $shops->update($request->all());
        return redirect()->back()->with('message', 'Shops Updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Shops $shops)
    {
        $shops->delete();
        return redirect()->back()->with('message', 'Shops Deleted Successfully.');
    }
}
