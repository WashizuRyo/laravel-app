@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto bg-white shadow-lg rounded-lg p-8 mt-8">
  <div class="flex justify-between items-center mb-6">
    <h1 class="text-2xl font-bold text-gray-800">タグ編集</h1>
    <a href="{{ route('tags.index') }}" 
       class="text-purple-500 hover:text-purple-700 underline text-sm">
      ← 一覧へ戻る
    </a>
  </div>

  <form action="{{ route('tags.update', $tag) }}" method="post" class="space-y-6">
    @csrf
    @method('PUT')
    
    <div>
      <label for="name" class="block text-sm font-medium text-gray-700 mb-2">
        タグ名
      </label>
      <input type="text" 
             name="name" 
             id="name"
             value="{{ $tag->name }}" 
             class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-purple-500"
             required>
      @error('name')
        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
      @enderror
    </div>

    <div class="bg-gray-50 p-4 rounded-md">
      <h3 class="text-sm font-medium text-gray-700 mb-2">使用状況</h3>
      <p class="text-sm text-gray-600">
        このタグは {{ $tag->tasks->count() }}個のタスクで使用されています
      </p>
    </div>

    <div class="pt-4">
      <button type="submit" 
              class="w-full bg-purple-500 hover:bg-purple-600 text-white font-bold py-2 px-4 rounded-md transition duration-200 ease-in-out transform hover:scale-105">
        タグを更新
      </button>
    </div>
  </form>
</div>
@endsection
