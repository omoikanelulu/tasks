@extends('layouts.app')

@section('content')
    <h1>タスク一覧</h1>

    <table class="table">
        <tr>
            <th>登録日</th>
            <th>タイトル</th>
            <th>期限日</th>
            <th>完了日</th>
        </tr>
        @foreach ($tasks as $task)
            <tr>
                <td>{{ $task->registration_date }}</td>
                <td>{{ $task->title }}</td>
                <td>{{ $task->expiration_date }}</td>
                <td>{{ $task->completion_date }}</td>
                <td>
                    <form action="{{ route('tasks.destroy', $task) }}" method="POST" class="form-inline">
                        @method('DELETE')
                        @csrf
                        <a href="{{ route('tasks.show', $task) }}" class="btn btn-primary">詳細</a>
                        <a href="{{ route('tasks.edit', $task) }}" class="btn btn-warning">修正</a>
                        <button type="submit" onclick="return confirm('本当に削除しますか？');" class="btn btn-danger">削除</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>

    {{ $tasks->links() }}
    
@endsection
