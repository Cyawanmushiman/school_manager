@extends('layouts.adminapp')
@section('content')
<div>
    <div class="logo">
        <a href="{{ url('admin') }}">
            管理画面
        </a>
    </div>

    <h3>講座一覧</h3>

    @if (session('message'))
        {{session('message')}}
    @endif

    <div class="couseList">
        @if (isset($couses))
            @foreach ( $couses as  $couse)
                <a href="{{route('couses.show', $couse->id)}}" class="couseCard">
                    <p class="couseText">講座名:{{$couse->title}}</p>
                    <p class="couseText">締め切り日:{{$couse->deadline}}</p>
                    <p class="couseText">参加人数:{{$couse->numpeople}}</p>
                    <p class="couseText">講座内容:{{$couse->body}}</p>
                    <p class="couseText">開催場所:{{$couse->adress}}</p>
                    <p class="couseText">開催日時:{{$couse->date}}</p>

                </a>
            @endforeach
        @else
            まだ講座がありません
        @endif
    </div>
</div>
@endsection
