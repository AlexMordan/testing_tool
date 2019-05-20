@extends('layouts.frontend')
@section('title', 'start test')

@section('content')
    <form action="" method="post">
        @csrf
        <select name="student" id="student">
            @php /** @var \App\Student[] $students */ @endphp
            @foreach($students as $student)
                <option value="{{ $student->id }}">{{ $student->name }}</option>
            @endforeach
        </select>
        <input type="submit" value="Начать">
    </form>
@endsection