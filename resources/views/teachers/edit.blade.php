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

    <div class="teacherEdit">
        <h2>講師情報編集</h2>
        <div class="teacherForm">
            <form method="post" action="{{route('teachers.update',$teacher->id)}}">
                @csrf
                @method('put')
                <label for="name">名前</label>
                <input type="text" id="name" name="name" value="{{old('name',$teacher->name)}}">
                <label for="age">年齢</label>
                <input type="number" id="age" name="age" value="{{old('age',$teacher->age)}}">
                <label for="career">経歴</label>
                <textarea type="text" id="career" name="career">{{old('career',$teacher->career)}}</textarea>

                <input type="submit" value="更新する">
            </form>
        </div>
    </div>
</div>
@endsection
