<?php

namespace App\Http\Controllers;

use App\Models\Couse;
use App\Models\Booking;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function apply($id)
    {
        $couse = Couse::findOrFail($id);
        return view('booking.apply', [
            'couse' => $couse,
        ]);
    }

    public function checkCoupon(Request $request, $id)
    {
        $couse = Couse::findOrFail($id);
        $price = $couse->amount;
        if ($request->coupon == '777') {
            $price -= 500;
        }

        session()->put([
            'couse' => $couse,
            'price' => $price,
        ]);

        return redirect()->route('confirm');
    }

    public function confirm()
    {
        $couse = session()->get('couse');
        $price = session()->get('price');
        // dd($couse,$price);
        $booking = Booking::create([
            'course_id' => $couse->id,
            'user_id' => 1,
            'coupon' => 777,
            'amount' => $price,
            'message' => 'テスト',
        ]);
        return view('booking.confirm', [
            'booking' => $booking,
            'couse' => $couse,
        ]);
    }

    public function payment(Request $request)
    {
        $all = $request->all();
        $secret = "sk_test_16ff0f9962c2940fba4a5f7e";
        \Payjp\Payjp::setApiKey($secret);
        $description = 'テスト';
        //ユーザーの作成
        $customer = \Payjp\Customer::create(array('card' => $all['payjp-token'], 'description' => $description));
        //チャージの作成
        $charge = \Payjp\Charge::create(array('customer' => $customer->id, 'amount' => $request->price, 'currency' => 'jpy', 'description' => $description));
        dump($charge);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function destroy($id)
    {
        //
    }
}
