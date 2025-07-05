@extends('layouts.app')

@section('content')
  <a href="{{ route('tasks.index') }}">一覧へ</a>
  <form action="{{ route('tasks.store') }}" method="post">
    @csrf
    <input type="text" name="title" placeholder="タスクを入力">
    <button type="submit">追加</button>
    <div>
      <h3>タグ</h3>
      @foreach ($tags as $tag)
        <label>
          <input type="checkbox" name="tags[]" value="{{ $tag->id }}" @if(isset($task) && $task->tags->contains($tag->id)) checked @endif >
          {{ $tag->name }}
        </label>  
      @endforeach
    </div>
  </form>
@endsection