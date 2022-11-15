@extends('layouts.app')

@section('content')
    <h1>タスク一覧</h1>

    <table>
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
            </tr>
        @endforeach
    </table>
@endsection
