@extends('layouts.app')

<style>
    input[type="date"] {
        width: 200px;
    }
</style>

@section('content')
    <h1>タスクを新規追加</h1>

    @if (count($errors) > 0)
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form action="{{ route('tasks.store') }}" method="post"">
        @csrf
        <div class="mb-3">
            <label for="title">タイトル</label>
            <input class="form-control @error('title') is-invalid @enderror" type="text" name="title" id="title"
                value="{{ old('title') }}" aria-describedby="validateTitle">
            @error('title')
                <div class="invalid-feedback" id="validateTitle">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="expiration_date">期限日</label>
            <input class="form-control @error('expiration_date') is-invalid @enderror" type="date" name="expiration_date"
                id="expiration_date" value="{{ old('expiration_date') }} aria-describedby="validateTitle"">
            @error('expiration_date')
                <div class="invalid-feedback" id="validateTitle">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="completion_date">完了日</label>
            <input class="form-control @error('completion_date') is-invalid @enderror" type="date" name="completion_date"
                id="completion_date" value="{{ old('completion_date') }}" aria-describedby="validateTitle">
            @error('completion_date')
                <div class="invalid-feedback" id="validateTitle">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="description">説明</label>
            <textarea class="form-control @error('description') is-invalid @enderror" name="description" id="description"
                aria-describedby="validateTitle" rows="5">{{ old('description') }}</textarea>
            @error('description')
                <div class="invalid-feedback" id="validateTitle">
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
