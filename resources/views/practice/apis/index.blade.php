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
        <table class="table">
            <thead class="thead-dark">
            <tr>
                <th scope="col">Валюта</th>
                <th scope="col">Покупка</th>
                <th scope="col">Продажа</th>
                <th scope="col">Разница покупка/продажа</th>
            </tr>
            </thead>
            <tbody>
            @foreach($data as $value)
            <tr>
                <th scope="row">{{$value['ccy']}}</th>
                <td>{{round($value['buy'], 2)}}</td>
                <td>{{round($value['sale'], 2)}}</td>
                <td>{{round($value['diff'], 2)}}</td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@endsection
