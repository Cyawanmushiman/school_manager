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

    <div class="teacherCreate">
        <p>講師の情報を入力してください</p>
        <div class="teacherForm">
            <form method="post" action="{{route('teachers.store')}}">
                @csrf
                <label for="name">名前</label>
                <input type="text" id="name" name="name">
                <label for="age">年齢</label>
                <input type="number" id="age" name="age">
                <label for="career">経歴</label>
                <textarea type="text" id="career" name="career"></textarea>

                <input type="submit" value="保存する">
            </form>
        </div>
    </div>
</div>
@endsection
