@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto bg-white shadow-lg rounded-lg p-8 mt-8">
  <div class="flex justify-between items-center mb-6">
    <h1 class="text-2xl font-bold text-gray-800">新規タグ作成</h1>
    <a href="{{ route('tags.index') }}" 
       class="text-purple-500 hover:text-purple-700 underline text-sm">
      ← 一覧へ戻る
    </a>
  </div>

  <form action="{{ route('tags.store') }}" method="post" class="space-y-6">
    @csrf
    
    <div>
      <label for="name" class="block text-sm font-medium text-gray-700 mb-2">
        タグ名
      </label>
      <input type="text" 
             name="name" 
             id="name"
             placeholder="新しいタグ名を入力してください" 
             class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-purple-500"
             required>
      @error('name')
        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
      @enderror
    </div>

    <div class="pt-4">
      <button type="submit" 
              class="w-full bg-purple-500 hover:bg-purple-600 text-white font-bold py-2 px-4 rounded-md transition duration-200 ease-in-out transform hover:scale-105">
        タグを作成
      </button>
    </div>
  </form>
</div>
@endsection
