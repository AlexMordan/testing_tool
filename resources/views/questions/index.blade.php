@extends('layouts.backend')
@section('title', 'List questions')
@section('content')
    <div class="d-flex justify-content-between mt-3">
        <h1>List questions:</h1>
        <a class="btn badge-info" href="{{ route('questions.create') }}">Добавить</a>
    </div>
    <table class="table">
        <thead>
        <tr>
            <th>#</th>
            <th>Текст</th>
            <th>Время</th>
            <th>Кол-во</th>
            <th>Действия</th>
        </tr>
        </thead>
        <tbody>
        @php
            /** @var \App\Question[] $questions */
        @endphp
            @foreach($questions as $question)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $question->text }}</td>
                    <td>{{ $question->time }}</td>
                    <td>
                        <a href="{{ route('questions.show', ['question' => $question]) }}" class="btn btn-info">Просмотр</a>
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
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $questions->links() }}
@endsection