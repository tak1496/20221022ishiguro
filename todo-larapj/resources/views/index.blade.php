@extends('layouts.default')

@section('title', 'Todo List')

@section('content')
<div class="todo">
  @if (count($errors) > 0)
  <ul>
    <li>{{$errors->first('content')}}</li>
  </ul>
  @endif
  <form action="/add" method="post" class="flex between mb-30">
    @csrf
    <input type="text" class="input-add" name="content" />
    <input class="button-add" type="submit" value="追加" />
  </form>

  <table>
    <tr>
      <th>作成日</th>
      <th>タスク名</th>
      <th>更新</th>
      <th>削除</th>
    </tr>
    @foreach($todos as $todo)
    <tr>
      <td>{{ $todo->created_at }}</td>
      <form action="/update?id={{$todo->id}}" method="post">
        @csrf
        <td>
          <input type="text" class="input-update" value="{{ $todo->task_name }}" name="content" />
        </td>
        <td>
          <button class="button-update">更新</button>
        </td>
      </form>
      <td>
        <form action="/delete?id={{$todo->id}}" method="post">
          @csrf
          <button class="button-delete">削除</button>
        </form>
      </td>
    </tr>
    @endforeach
  </table>
</div>
</div>
@endsection