@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto bg-white shadow-lg rounded-lg p-8 mt-8">
  <div class="flex justify-between items-center mb-6">
    <h1 class="text-2xl font-bold text-gray-800">タグ詳細</h1>
    <div class="flex space-x-3">
      <a href="{{ route('tasks.index') }}" 
         class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-1 px-3 rounded text-sm transition duration-200">
        タスク一覧
      </a>
      <a href="{{ route('tags.index') }}" 
         class="text-purple-500 hover:text-purple-700 underline text-sm">
        ← 一覧へ戻る
      </a>
    </div>
  </div>

  <div class="space-y-6">
    <div>
      <label class="block text-sm font-medium text-gray-700 mb-2">タグ名</label>
      <div class="bg-purple-100 text-purple-800 text-xl font-medium px-4 py-2 rounded inline-block">
        {{ $tag->name }}
      </div>
    </div>

    <div>
      <label class="block text-sm font-medium text-gray-700 mb-2">使用されているタスク</label>
      @if($tag->tasks->count() > 0)
        <div class="space-y-2">
          @foreach ($tag->tasks as $task)
            <div class="border border-gray-200 rounded p-3">
              <div class="flex justify-between items-center">
                <a href="{{ route('tasks.edit', $task) }}" class="flex-1">
                  @if ($task->completed)
                    <s class="text-gray-500">{{ $task->title }}</s>
                    <span class="ml-2 bg-green-100 text-green-800 text-xs font-medium px-2 py-1 rounded">完了</span>
                  @else
                    <span class="text-gray-800 hover:text-blue-600 transition duration-200">
                      {{ $task->title }}
                    </span>
                    <span class="ml-2 bg-yellow-100 text-yellow-800 text-xs font-medium px-2 py-1 rounded">未完了</span>
                  @endif
                </a>
              </div>
            </div>
          @endforeach
        </div>
      @else
        <p class="text-gray-500 italic">このタグはまだどのタスクでも使用されていません</p>
      @endif
    </div>

    <div class="flex gap-4 pt-4">
      <a href="{{ route('tags.edit', $tag) }}" 
         class="bg-yellow-500 hover:bg-yellow-600 text-white font-bold py-2 px-4 rounded">
        編集
      </a>
      
      <form action="{{ route('tags.destroy', $tag) }}" method="post" class="inline">
        @csrf
        @method('DELETE')
        <button type="submit" 
                class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded"
                onclick="return confirm('このタグを削除しますか？')">
          削除
        </button>
      </form>
    </div>
  </div>
</div>
@endsection
