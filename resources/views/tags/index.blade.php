@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto bg-white shadow-lg rounded-lg p-8 mt-8">
  <div class="flex justify-between items-center mb-6">
    <h1 class="text-2xl font-bold text-gray-800">タグ一覧</h1>
    <div class="flex space-x-3">
      <a href="{{ route('tasks.index') }}" 
         class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded-md transition duration-200 ease-in-out transform hover:scale-105">
        タスク一覧
      </a>
      <a href="{{ route('tags.create') }}" 
         class="bg-purple-500 hover:bg-purple-600 text-white font-bold py-2 px-4 rounded-md transition duration-200 ease-in-out transform hover:scale-105">
        + 新規タグを追加
      </a>
    </div>
  </div>

  @if($tags->count() > 0)
    <div class="space-y-4">
      @foreach ($tags as $tag)
        <div class="border border-gray-200 rounded-lg p-4 hover:shadow-md transition duration-200">
          <div class="flex justify-between items-center">
            <div class="flex items-center">
              <span class="bg-purple-100 text-purple-800 text-lg font-medium px-3 py-1 rounded">
                {{ $tag->name }}
              </span>
              <span class="ml-3 text-sm text-gray-500">
                {{ $tag->tasks->count() }}個のタスクで使用中
              </span>
            </div>
            
            <div class="flex space-x-2">
              <a href="{{ route('tags.edit', $tag) }}" 
                 class="bg-yellow-500 hover:bg-yellow-600 text-white font-bold py-1 px-3 rounded text-sm transition duration-200">
                編集
              </a>
              
              <form action="{{ route('tags.destroy', $tag) }}" method="post" class="inline">
                @csrf
                @method('DELETE')
                <button type="submit" 
                        class="bg-red-500 hover:bg-red-600 text-white font-bold py-1 px-3 rounded text-sm transition duration-200"
                        onclick="return confirm('このタグを削除しますか？')">
                  削除
                </button>
              </form>
            </div>
          </div>
        </div>
      @endforeach
    </div>
  @else
    <div class="text-center py-12">
      <div class="text-gray-400 text-6xl mb-4">🏷️</div>
      <h3 class="text-lg font-medium text-gray-900 mb-2">まだタグがありません</h3>
      <p class="text-gray-500 mb-6">最初のタグを作成してみましょう</p>
      <a href="{{ route('tags.create') }}" 
         class="bg-purple-500 hover:bg-purple-600 text-white font-bold py-2 px-4 rounded-md transition duration-200">
        タグを作成
      </a>
    </div>
  @endif
</div>
@endsection
