@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto bg-white shadow-lg rounded-lg p-8 mt-8">
  <div class="flex justify-between items-center mb-6">
    <h1 class="text-2xl font-bold text-gray-800">新規タスク作成</h1>
    <a href="{{ route('tasks.index') }}" 
       class="text-blue-500 hover:text-blue-700 underline text-sm">
      ← 一覧へ戻る
    </a>
  </div>

  <form action="{{ route('tasks.store') }}" method="post" class="space-y-6">
    @csrf
    
    <div>
      <label for="title" class="block text-sm font-medium text-gray-700 mb-2">
        タスク名
      </label>
      <input type="text" 
             name="title" 
             id="title"
             placeholder="新しいタスクを入力してください" 
             class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
             required>
      @error('title')
        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
      @enderror
    </div>

    <div>
      <h3 class="text-sm font-medium text-gray-700 mb-3">タグを選択</h3>
      <div class="space-y-2">
        @foreach ($tags as $tag)
          <label class="flex items-center">
            <input type="checkbox" 
                   name="tags[]" 
                   value="{{ $tag->id }}" 
                   @if(isset($task) && $task->tags->contains($tag->id)) checked @endif
                   class="h-4 w-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
            <span class="ml-2 text-sm text-gray-700">{{ $tag->name }}</span>
          </label>  
        @endforeach
      </div>
    </div>

    <div class="pt-4">
      <button type="submit" 
              class="w-full bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded-md transition duration-200 ease-in-out transform hover:scale-105">
        タスクを作成
      </button>
    </div>
  </form>
</div>
@endsection