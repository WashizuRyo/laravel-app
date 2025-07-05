@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto bg-white shadow-lg rounded-lg p-8 mt-8">
  <div class="flex justify-between items-center mb-6">
    <h1 class="text-2xl font-bold text-gray-800">タスク一覧</h1>
    <div class="flex space-x-3">
      <a href="{{ route('tags.index') }}" 
         class="bg-purple-500 hover:bg-purple-600 text-white font-bold py-2 px-4 rounded-md transition duration-200 ease-in-out transform hover:scale-105">
        タグ管理
      </a>
      <a href="{{ route('tasks.create') }}" 
         class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded-md transition duration-200 ease-in-out transform hover:scale-105">
        + 新規タスクを追加
      </a>
    </div>
  </div>

  @if($tasks->count() > 0)
    <div class="space-y-4">
      @foreach ($tasks as $task)
        <div class="border border-gray-200 rounded-lg p-4 hover:shadow-md transition duration-200">
          <div class="flex justify-between items-start mb-2">
            <a href="{{ route('tasks.edit', $task) }}" class="flex-1">
              @if ($task->completed)
                <s class="text-gray-500 text-lg">{{ $task->title }}</s>
                <span class="ml-2 bg-green-100 text-green-800 text-xs font-medium px-2 py-1 rounded">完了</span>
              @else
                <span class="text-gray-800 text-lg hover:text-blue-600 transition duration-200">
                  {{ $task->title }}
                </span>
                <span class="ml-2 bg-yellow-100 text-yellow-800 text-xs font-medium px-2 py-1 rounded">未完了</span>
              @endif
            </a>
            
            <form action="{{ route('tasks.destroy', $task) }}" method="post" class="ml-4">
              @csrf
              @method('DELETE')
              <button type="submit" 
                      class="bg-red-500 hover:bg-red-600 text-white font-bold py-1 px-3 rounded text-sm transition duration-200"
                      onclick="return confirm('このタスクを削除しますか？')">
                削除
              </button>
            </form>
          </div>
          
          @if($task->tags->count() > 0)
            <div class="flex flex-wrap gap-2">
              @foreach ($task->tags as $tag)
                <a href="{{ route('tags.show', $tag) }}" 
                   class="bg-blue-100 hover:bg-blue-200 text-blue-800 text-xs font-medium px-2 py-1 rounded transition duration-200">
                  {{ $tag->name }}
                </a>
              @endforeach
            </div>
          @endif
        </div>
      @endforeach
    </div>
  @else
    <div class="text-center py-12">
      <div class="text-gray-400 text-6xl mb-4">📝</div>
      <h3 class="text-lg font-medium text-gray-900 mb-2">まだタスクがありません</h3>
      <p class="text-gray-500 mb-6">最初のタスクを作成してみましょう</p>
      <a href="{{ route('tasks.create') }}" 
         class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded-md transition duration-200">
        タスクを作成
      </a>
    </div>
  @endif
</div>
@endsection