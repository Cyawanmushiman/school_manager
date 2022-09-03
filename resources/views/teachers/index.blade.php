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

    <div class="teacherList">
        @if (count($teachers) > 0)
            @foreach ( $teachers as  $teacher)
                <a href="{{route('teachers.show', $teacher->id)}}" class="teacherCard">
                    <p class="teacherText">名前：{{$teacher->name}}</p>
                    <p class="teacherText">年齢：{{$teacher->age}}</p>
                    <p class="teacherText">経歴：{{$teacher->career}}</p>
                </a>
            @endforeach
        @else
            まだ講師が登録されていません
        @endif
    </div>
</div>
@endsection
