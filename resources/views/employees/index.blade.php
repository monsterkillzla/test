@extends('layout')

@section('content')
<div class="container">
    <h3>Сотрудники</h3>
    <a href="{{ route('employees.create') }}" class="btn btn-success">Добавить</a>
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <table class="table">
                <thead>
                <tr>
                    <td>Имя</td>
                    <td>Фамилия</td>
                    <td>Отчество</td>
                    <td>Пол</td>
                    <td>Заработная плата</td>
                    <td>Отделы</td>
                </tr>
                </thead>
                <tbody>
                @foreach($employees as $employee)
                <tr>
                    <td>{{$employee->name}}</td>
                    <td>{{$employee->surname}}</td>
                    <td>{{$employee->patronymic}}</td>
                    <td>{{$employee->gender}}</td>
                    <td>{{$employee->salary}}</td>
                    <td>
                        @foreach($departments as $dep)
                            @foreach($connections as $con)
                                @if($dep->id==$con->departmentId && $employee->id==$con->employeeId)
                                    {{$dep->name. ' '}}
                                @else
                                    @continue
                                @endif
                            @endforeach
                        @endforeach
                    </td>
                    <td><a href="{{route('employees.edit', $employee->id)}}" class="btn btn-success">Редактировать</a></td>
                    <td>{!! Form::open(['route' => ['employees.delete', $employee->id], 'method' => 'DELETE']) !!}
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