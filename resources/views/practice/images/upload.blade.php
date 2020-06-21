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
        <h1>Загрузка изображения</h1>
        <form action="{{ route('practice.images.upload') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <input type="file" name="image">
            </div>

            <button class="bnt btn-default" type="submit">Загрузка</button>
        </form>

        @isset($path)
            <img class="img-fluid" src="{{ asset('/storage/'. $path) }}" alt="">
        @endisset

    </div>

@endsection
