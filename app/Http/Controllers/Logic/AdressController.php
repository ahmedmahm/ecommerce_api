<?php

namespace App\Http\Controllers\Logic;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Address;
use Illuminate\Support\Facades\DB;

class AdressController extends Controller
{

    /**
     * Middleware Security
     * AdressController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = auth()->user()->id;
        return DB::table('addresses')->where('user_id',$user_id)->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user_id = auth()->user()->id;
        $addresses = DB::table('addresses')->where(['user_id'=>$user_id,'type'=>0])->get();
        if(count($addresses) >= 1 && $request['type'] == 0){
            return response(['msg'=>'primary Address exists'],404);
        }else{
            $data = [
                'user_id' => $user_id,
                'type'    => $request['type'],
                'street'  => ucfirst($request['street']),
                'plz'     => $request['plz'],
                'city'    => ucfirst($request['city']),
                'country' => ucfirst($request['country'])
            ];
            try {
                Address::create($data);
                return response(['msg'=>'Address Added'],201);
            }catch (\Exception $e){
                return response(['msg'=>'Error'],500);
            }
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Address $address)
    {
        return $address;
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
    public function update(Request $request,Address $address)
    {
        $user_id = auth()->user()->id;
        $primary_addresses = DB::table('addresses')->where(['user_id'=>$user_id,'type'=>0])->get();
        if(count($primary_addresses) >= 1 && $request['type'] == 0){
            return response()->json($address, 404);
        }else{
            $address->update($request->all());
            return response()->json($address, 200);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Address $address
     * @return \Illuminate\Http\Response
     */
    public function destroy(Address $address)
    {
        $address->delete();
        return response()->json(null, 204);
    }
}
