@extends('layout')

@section('content')
    @include('errors')
    <div class="container">
        <h3>Сетка</h3>
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <table class="table">
                    <thead>
                    <tr>
                        <td></td>
                        @foreach($dep as $d)
                            <td>{{$d->name}}</td>
                        @endforeach
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($result as $item)
                                <tr>
                                <td>{{$item->surname}}</td>
                                @foreach($dep as $d)
                                    @if($item->id==$d->id)
                                        <td>+</td>
                                        @else
                                        <td></td>
                                    @endif
                                    @endforeach
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection