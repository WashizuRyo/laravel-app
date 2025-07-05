@extends('layouts.app')

@section('content')
  <a href="{{ route('tasks.index') }}">一覧へ</a>
  <div>{{ $task->title }}</div>
@endsection