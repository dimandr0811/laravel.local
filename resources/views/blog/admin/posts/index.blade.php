@extends('layouts.app')

@section('content')
    <div class="container">
        <nav class="navbar navbar-togglable-md navbar-light bg-faded">
            <a class="btn btn-primary" href="{{ route('blog.admin.posts.create') }}">Написать</a>
        </nav>
        <div class="card">
            <table class="table">
                <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Автор</th>
                    <th scope="col">Категория</th>
                    <th scope="col">Заголовок</th>
                    <th scope="col">Дата публикации</th>
                </tr>
                </thead>
                <tbody>
                @foreach($paginator as $post)
                    @php
                        /** @var \App\Models\BlogPost $post */
                    @endphp
                    <tr @if(!$post->is_published) style="background-color: #ccc; " @endif>
                        <td>{{ $post->id }}</td>
                        <td>{{ $post->user->name }}</td>
                        <td>{{ $post->category->title }}</td>
                        <td>
                            <a href="{{ route('blog.admin.posts.edit' , $post->id) }}">{{ $post->title }}</a>
                        </td>
                        <td>{{ $post->published_at ? \Carbon\Carbon::parse($post->published_at)->format('d.M H:i') : '' }}</td>
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


@endsection;
