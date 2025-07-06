@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto bg-white shadow-lg rounded-lg p-8 mt-8">
  <div class="flex justify-between items-center mb-6">
    <h1 class="text-2xl font-bold text-gray-800">タスク編集</h1>
    <a href="{{ route('tasks.index') }}" 
       class="text-blue-500 hover:text-blue-700 underline text-sm">
      ← 一覧へ
    </a>
  </div>

  @if ($errors->any())
    <ul class="mb-2">
        @foreach ($errors->all() as $error)
            <li class="text-red-600">{{ $error }}</li>
        @endforeach
    </ul>
  @endif


  <form action="{{ route('tasks.update', $task) }}" method="post" class="space-y-6">
    @csrf
    @method('PUT')
    
    <div class="mb-2">
      <label for="title" class="block text-sm font-medium text-gray-700 mb-2">
        タスク名
      </label>
      <input type="text" 
             name="title" 
             id="title"
             value="{{ old('title') }}" 
             class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
    </div>

    <div class="flex items-center mb-4">
      <input type="checkbox" 
             name="completed" 
             id="completed"
             @if(old('completed', $task->completed_at)) checked @endif
             class="h-4 w-4 text-green-600 border-gray-300 rounded focus:ring-green-500">
      <label for="completed" class="ml-2 text-sm font-medium text-gray-700">
        完了済み
      </label>
    </div>

    <div>
      <h3 class="text-sm font-medium text-gray-700 mb-3">タグを選択</h3>
      <div class="space-y-2">
        @foreach ($tags as $tag)
          <label class="flex items-center">
            <input type="checkbox" 
                   name="tags[]" 
                   value="{{ $tag->id }}" 
                   @if(old('tags') ? in_array($tag->id, old('tags')) : isset($task) && $task->tags->contains($tag->id)) checked @endif
                   class="h-4 w-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
            <span class="ml-2 text-sm text-gray-700">{{ $tag->name }}</span>
          </label>  
        @endforeach
      </div>
    </div>

    <div class="pt-4">
      <button type="submit" 
              class="w-full bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded-md transition duration-200 ease-in-out transform hover:scale-105">
        更新する
      </button>
    </div>
  </form>
</div>
@endsection