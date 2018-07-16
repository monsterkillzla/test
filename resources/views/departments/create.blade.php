@extends('layout')

@section('content')
    @include('errors')
    <div class="container">
        <h3>Добавление отдела</h3>
        <div class="row">
            <div class="col-md-12">
                {!! Form::open(['route' => ['departments.store']]) !!}
                <div class="form-group">
                    <label class="col-form-label">Название</label>
                    <input type="text" class="form-control" name="name">
                    <button class="btn btn-success">Добавить</button>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection