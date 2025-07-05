@extends('layouts.app')

@section('content')
  <a href="{{ route('tasks.index') }}">一覧へ</a>
  <form action="{{ route('tasks.update', $task) }}" method="post">
    @csrf
    @method('PUT')
    <input type="text" name="title" value="{{ $task->title }}">
    <label>
      <input type="checkbox" name="completed" @if($task->completed) checked @endif>
      完了
    </label>
     <div>
      <h3>タグ</h3>
      @foreach ($tags as $tag)
        <label>
          <input type="checkbox" name="tags[]" value="{{ $tag->id }}" @if(isset($task) && $task->tags->contains($tag->id)) checked @endif >
          {{ $tag->name }}
        </label>  
      @endforeach
    </div>
    <button type="submit">更新</button>
  </form>
@endsection