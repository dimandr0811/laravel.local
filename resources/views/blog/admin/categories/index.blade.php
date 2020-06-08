@extends('layouts.app')

@section('content')
    <div class="container">
        <nav class="navbar navbar-togglable-md navbar-light bg-faded">
            <a class="btn btn-primary" href="{{ route('blog.admin.categories.create') }}">Добавить</a>
        </nav>
        <div class="card">
            <table class="table">
                <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Категория</th>
                    <th scope="col">Родитель</th>
                </tr>
                </thead>
                <tbody>
                @foreach($paginator as $item)
                    @php /** @var \App\Models\BlogCategory $item */ @endphp
                    <tr>
                        <td>{{$item->id}}</td>
                        <td>
                            <a href="{{ route('blog.admin.categories.edit', $item->id) }}">
                                {{ $item->title }}
                            </a>
                        </td>
                        <td @if(in_array($item->parent_id, [0,1])) style="color:#ccc" @endif>
                            {{ $item->parent_id }}
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="container">
        @if($paginator->total() > $paginator->count())
        <br>
            <nav aria-label="...">
                <ul class="pagination">
                    {{$paginator->links()}}
                </ul>
            </nav>
        @endif
    </div>


@endsection()
