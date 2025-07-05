<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>タスク管理</title>
</head>
<body>
  <h1>タスク一覧</h1>

  <a href="{{ route('tasks.create') }}">+ 新規タスクを追加</a>

  <ul>
    @foreach ($tasks as $task)
      <li>
        <form action="{{ route('tasks.destroy', $task) }}" method="post">
          @csrf
          @method('DELETE')
          <button type="submit">削除</button>
        </form>
        <a href="{{ route('tasks.edit', $task) }}">
          @if ($task->completed)
            <s style="color: gray;">{{ $task->title }}</s>
          @else
            {{ $task->title }}
          @endif
        </a>
      </li>
    @endforeach
  </ul>
</body>