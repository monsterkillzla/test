@extends('layout')

@section('content')
    @include('errors')
    <div class="container">
        <h3>Редактирование отдела - {{$department->name}}</h3>
        <div class="row">
            <div class="col-md-12">
                {!! Form::open(['route' => ['departments.update', $department->id], 'method' => 'PUT']) !!}
                <div class="form-group">
                    <label class="col-form-label">Название</label>
                    <input type="text" class="form-control" name="name" value="{{$department->name}}">
                    <button class="btn btn-success">Сохранить</button>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection