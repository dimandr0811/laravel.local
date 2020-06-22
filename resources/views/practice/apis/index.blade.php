@extends('layouts.app')

@section('content')

    @if($errors->any())
        <div class="row justify-content-center">
            <div class="col-md-11">
                <div class="alert alert-danger" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">x</span>
                    </button>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </div>
            </div>
        </div>
    @endif

    <div class="container">
        <div class="row">

            <div class="col-md-8">
                <form action="{{route('practice.apis.index')}}" method="POST">
                    @csrf
                    @method("POST")
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="city">Адрес отделения</label>
                            <select name="city"
                                    id="city"
                                    class="form-control"
                                    placeholder="Выберите город"
                                    required>
                                @foreach($cityAddressList as $list)
                                    <option value="{{$list['city']}} . {{$list['address']}}">{{$list['city']}}. {{$list['address']}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Найти</button>
                </form>

            </div>

            <div class="col-md-3">
            <table class="table">
                <thead class="thead-dark">
                <tr>
                    <th scope="col">Валюта</th>
                    <th scope="col">Покупка</th>
                    <th scope="col">Продажа</th>
                    <th scope="col">Разница</th>
                </tr>
                </thead>
                <tbody>
                @foreach($data as $value)
                    <tr>
                        <th scope="row">{{$value->ccy}}</th>
                        <td>{{round($value->buy, 2)}}</td>
                        <td>{{round($value->sale, 2)}}</td>
                        <td>{{round($value->diff, 2)}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            </div>
        </div>

        @if(isset($department))
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="title">Создано</label>
                            <input type="text" value="11" class="form-control" disabled>
                        </div>
                        <div class="form-group">
                            <label for="title">Изменено</label>
                            <input type="text" value="22" class="form-control" disabled>
                        </div>
                        <div class="form-group">
                            <label for="title">Удалено</label>
                            <input type="text" value="33" class="form-control" disabled>
                        </div>
                    </div>
                </div>
            </div>

            @endif

    </div>

@endsection
