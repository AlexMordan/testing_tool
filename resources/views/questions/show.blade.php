@extends('layouts.backend')
@section('title', 'List questions')
@php
    /** @var  \App\Question $question */
@endphp
@section('content')
    <h1>Вопрос # {{ $question->id }} </h1>
<p><strong>Текст: </strong>{{ $question->text }}</p>
<p><strong>Время: </strong>{{ $question->time }} мин.</p>
<div class="d-flex justify-content-center">
    <a href="{{ route('questions.edit', ['question' => $question]) }}" class="btn btn-primary">Изменить</a>
    <form
            action="{{ route('questions.destroy', ['question' => $question]) }}"
            method="post"
            onsubmit="return confirm('Удалить?')"
    >
        @csrf
        @method('delete')
        <button type="submit" class="btn btn-danger">Удалить</button>
    </form>
</div>
@endsection