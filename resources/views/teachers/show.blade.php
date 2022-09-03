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
        <h1>講師詳細</h1>

        <p>名前：{{$teacher->name}}</p>
        <p>年齢：{{$teacher->age}}</p>
        <p>経歴：{{$teacher->career}}</p>

        <a href="{{route('teachers.edit',$teacher->id)}}" class="teacherEdit">
            編集
        </a>

        <form method="post" action="{{route('teachers.destroy',$teacher->id)}}">
            @csrf
            @method('delete')
            <button type="submit" class="teacherDeleteText" onClick="return confirm('本当に削除しますか？');">削除</button>
        </form>
    </div>
</div>
@endsection
