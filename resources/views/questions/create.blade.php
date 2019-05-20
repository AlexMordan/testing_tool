@extends('layouts.backend')
@section('title', 'Add question')
@section('content')
    <h1>Add question</h1>
    <form action="{{ route('questions.store') }}" method="post">
        @csrf
        <div class="form-group">
            <label for="text">Text</label>
            <textarea class="form-control @error('text') is-invalid @enderror" name="text" id="text"></textarea>
            @error('text')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="time">Время</label>
            <input class="form-control @error('time') is-invalid @enderror" type="text" name="time" id="time">
            @error('time')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <input class="btn btn-info" type="submit" value="Добавить">
    </form>
@endsection