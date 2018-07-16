@extends('layout')

@section('content')
    @include('errors')
    <div class="container">
        <h3>Отделы</h3>
        <a href="{{ route('departments.create') }}" class="btn btn-success">Добавить</a>
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <table class="table">
                    <thead>
                    <tr>
                        <td>Номер</td>
                        <td>Название</td>
                        <td>Количество работников</td>
                        <td>Максимальная зарплата</td>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($departments as $department)
                        <tr>
                            <td>{{$department->id}}</td>
                            <td>{{$department->name}}</td>
                            <td>{{$department->employees_count}}</td>
                            <td>{{$department->max_salary}}</td>
                            <td><a href="{{route('departments.edit', $department->id)}}" class="btn btn-success">Редактировать</a></td>
                            <td>{!! Form::open(['route' => ['departments.delete', $department->id], 'method' => 'DELETE']) !!}
                                <button onclick="return confirm('Вы уверены?')" class="btn btn-danger">Удалить</button>
                                {!! Form::close() !!}
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection