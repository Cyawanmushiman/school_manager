@extends('layouts.adminapp')
@section('content')
<div>
    <div class="logo">
        <a href="{{ url('admin') }}">
            管理画面
        </a>
    </div>

    @if (session('message'))
        {{session('message')}}
    @endif

    <div class="teacherShow">
        <h1>講座詳細</h1>
        <div class="couseCard">
            <p class="couseText">講座名:{{$couse->title}}</p>
            <p class="couseText">締め切り日:{{$couse->deadline}}</p>
            <p class="couseText">参加人数:{{$couse->numpeople}}</p>
            <p class="couseText">講座内容:{{$couse->body}}</p>
            <p class="couseText">開催場所:{{$couse->adress}}</p>
            <p class="couseText">開催日時:{{$couse->date}}</p>
            <p class="couseText">講座料金:{{$couse->amount}}</p>
        </div>

        <form action="{{route('checkCoupon',$couse->id)}}" method="post">
            @csrf
            <label for="coupon">クーポン</label>
            <input type="number" name="coupon">

            <input type="submit" value="決済へ">
        </form>
    </div>
</div>
@endsection
