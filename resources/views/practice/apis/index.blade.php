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
                                @foreach($cityList as $list)
                                    <option value="{{$list}}">{{$list}}</option>
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
        <div class="row">
            <div class="col-md-8">
                @if(session()->has('department'))
                    @foreach(session() ->get('department') as  $department)
                        @foreach($department as $dep)

                                <div class="card">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="title">Название</label>
                                            <input type="text" value="{{$dep->name}}" class="form-control" disabled>
                                        </div>
                                        <div class="form-group">
                                            <label for="title">Номер телефона</label>
                                            <input type="text" value="{{$dep->phone}}" class="form-control" disabled>
                                        </div>
                                        <div class="form-group">
                                            <label for="title">Email</label>
                                            <input type="email" value="{{$dep->email}}" class="form-control" disabled>
                                        </div>
                                        <div class="form-group">
                                            <label for="title">Адрес</label>
                                            <input type="text" value="{{$dep->address}}" class="form-control" disabled>
                                        </div>
                                    </div>
                                </div>

                        @endforeach
                    @endforeach
                @endif
            </div>
    </div>

    </div>

@endsection
