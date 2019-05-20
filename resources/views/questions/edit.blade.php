@extends('layouts.backend')
@section('title', 'Edit question')
@php
/** @var  \App\Question $question */
@endphp
@section('content')
    <h1>Add question</h1>
    <form action="{{ route('questions.update', ['question' => $question]) }}" method="post">
        @csrf
        @method('put')
        <div class="form-group">
            <label for="text">Text</label>
            <textarea
                    class="form-control @error('text') is-invalid @enderror"
                    name="text"
                    id="text">{{ old('text', $question->text) }}</textarea>
            @error('text')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="time">Время</label>
            <input
                    class="form-control @error('time') is-invalid @enderror"
                    type="text"
                    name="time"
                    id="time"
                    value="{{ old('time', $question->time) }}">
            @error('time')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <input class="btn btn-info" type="submit" value="Сохранить">
    </form>
@endsection