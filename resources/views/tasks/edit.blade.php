@extends('layouts.app')

<style>
    input[type="date"] {
        width: 200px;
    }
</style>

@section('content')
    <h1>タスクを修正</h1>

    @if (count($errors) > 0)
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form action="{{ route('tasks.update', $task) }}" method="post">
        @csrf
        @method('PATCH')
        <div class="mb-3">
            <label for="title">タイトル</label>
            <input class="form-control @error('title') is-invalid @enderror" type="text" name="title" id="title"
                value="{{ old('title', $task->title) }}" aria-describedby="validateTitle">
            @error('title')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="expiration_date">期限日</label>
            <input class="form-control @error('expiration_date') is-invalid @enderror" type="date" name="expiration_date"
                id="expiration_date" value="{{ old('expiration_date', $task->expiration_date->format('Y-m-d')) }}"
                aria-describedby="validateTitle">
            @error('expiration_date')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="completion_date">完了日</label>
            <input class="form-control @error('completion_date')is-invalid @enderror" type="date" name="completion_date"
                id="completion_date"
                value="{{ old('completion_date', !is_null($task->completion_date) ? $task->completion_date->format('Y-m-d') : '') }}"
                aria-describedby="validateTitle">
            @error('completion_date')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="description">説明</label>
            <textarea class="form-control @error('description')is-invalid @enderror" name="description" id="description"
                rows="5" aria-describedby="validateTotle">{{ old('description', $task->description) }}</textarea>
            @error('description')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <input type="submit" value="送信" class="btn btn-primary">
            <a href="{{ route('tasks.index') }}" class="btn btn-secondary">戻る</a>
        </div>
    </form>
@endsection
