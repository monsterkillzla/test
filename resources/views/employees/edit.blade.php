@extends('layout')

@section('content')
    @include('errors')
    <div class="container">
        <h3>Редактирование сотрудника - {{$employee->name}}</h3>
        <div class="row">
            <div class="col-md-12">
                {!! Form::open(['route' => ['employees.update', $employee->id], 'method' => 'PUT']) !!}
                <div class="form-group">
                    <label class="col-form-label">Имя</label>
                    <input type="text" class="form-control" name="name" value="{{$employee->name}}">
                    <label class="col-form-label">Фамилия</label>
                    <input type="text" class="form-control" name="surname" value="{{$employee->surname}}">
                    <label class="col-form-label">Отчество</label>
                    <input type="text" class="form-control" name="patronymic" value="{{$employee->patronymic}}">
                    <label class="col-form-label">Пол</label>
                    <br>
                    <input type="radio" name="gender" value="male">М<br>
                    <input type="radio" name="gender" value="female">Ж<br>
                    <label class="col-form-label">Заработная плата</label>
                    <input type="text" class="form-control" name="salary" value="{{$employee->salary}}">
                    <label class="col-form-label">Отделы</label>
                    <br>
                    @foreach($deps as $dep)
                        <input type="checkbox" name="department[]" value="{{$dep->name}}">{{$dep->name}}<br>
                    @endforeach
                    <button class="btn btn-success">Сохранить</button>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection