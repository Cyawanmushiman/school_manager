@extends('layouts.adminapp')
@section('content')
<div>
  <nav class="">
    <div class="container">
      <a href="{{ url('admin') }}">
        管理画面
      </a>

      <a href="{{route('teachers.create')}}">講師作成</a>
      <a href="{{route('teachers.index')}}">講師一覧</a>
    </div>
  </nav>
</div>
@endsection
