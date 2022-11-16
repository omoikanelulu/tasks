@extends('layouts.app')

<style>
    input[type="date"] {
        width: 200px;
    }
</style>

@section('content')
    <h1>タスクを新規追加</h1>

    <form action="{{ route('tasks.store') }}" method="post">
        @csrf
        <div class="mb-3">
            <label for="title">タイトル</label>
            <input class="form-control" type="text" name="title" id="title" value="{{ old('title') }}">
        </div>
        <div class="mb-3">
            <label for="expiration_date">期限日</label>
            <input class="form-control" type="date" name="expiration_date" id="expiration_date"
                value="{{ old('expiration_date') }}">
        </div>
        <div class="mb-3">
            <label for="completion_date">完了日</label>
            <input class="form-control" type="date" name="completion_date" id="completion_date"
                value="{{ old('completion_date') }}">
        </div>
        <div class="mb-3">
            <label for="description">説明</label>
            <textarea class="form-control" name="description" id="description" value="{{ old('description') }}" rows="5"></textarea>
        </div>
        <div class="mb-3">
            <input type="submit" value="送信" class="btn btn-primary">
            <a href="{{ route('tasks.index') }}" class="btn btn-secondary">戻る</a>
        </div>
    </form>
@endsection
