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
        <h1>決剤</h1>
        <div class="couseCard">
            <p class="couseText">講座名:{{$couse->title}}</p>
            <p class="couseText">締め切り日:{{$couse->deadline}}</p>
            <p class="couseText">参加人数:{{$couse->numpeople}}</p>
            <p class="couseText">講座内容:{{$couse->body}}</p>
            <p class="couseText">開催場所:{{$couse->adress}}</p>
            <p class="couseText">開催日時:{{$couse->date}}</p>
            <p class="couseText">講座料金:{{$booking->amount}}</p>
        </div>

        <form action="{{route('payment',$booking->id)}}" method="post" class="center">
            @csrf
            <script type="text/javascript" src="https://checkout.pay.jp/" class="payjp-button"
                data-key="pk_test_82b432d0e9e7b81b2ec75a52" data-text="クレジットカード登録">
            </script>
            <input type="hidden" name="price" value={{$booking->amount}}>
        </form>
    </div>
</div>
@endsection
