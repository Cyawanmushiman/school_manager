@extends('layouts.adminapp')
@section('content')
<div>
    <div class="logo">
        <a href="{{ url('admin') }}">
            管理画面
        </a>
    </div>
    <h3>講座作成</h3>

    @if (session('message'))
        {{session('message')}}
    @endif

    <div class="couseCreate">
        <p>講座情報を入力してください</p>
        <div class="couseForm">
            <form method="post" action="{{route('couses.store')}}">
                @csrf
                <label for="teacherName">講師名</label>
                <select name="teacher_id">
                    @foreach ($teachers as $teacher)
                        <option value={{ $teacher->id }}>{{ $teacher->name }}</option>
                    @endforeach
                </select>
                <br>

                <label for="title">講座名</label>
                <input type="text" id="name" name="title">
                <label for="deadline">締め切り日</label>
                <input type="date" id="deadline" name="deadline">
                <label for="numpeople">参加人数</label>
                <input type="number" id="numpeople" name="numpeople">
                <label for="adress">開催場所</label>
                <input type="text" id="adress" name="adress">
                <label for="date">開催日</label>
                <input type="date" id="date" name="date">
                <label for="body">講座内容</label>
                <textarea type="text" id="body" name="body"></textarea>
                <label for="amount">講座料金</label>
                <input type="number" id="amount" name="amount">

                <input type="submit" value="保存する">
            </form>
        </div>
    </div>
</div>
@endsection
