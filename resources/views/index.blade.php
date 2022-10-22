@extends('_layouts/layout')



@section('content')
    <div class="container mt-3">

            @guest
            <h3>Guest</h3>
            @else
                <h4>hello {{Auth::user()->name}}</h4>
            @if(Auth::user()->usertype==='usual')
                <h3>Usual</h3>
            @elseif(Auth::user()->usertype==='admin')
                <h3>Admin</h3>
                <a href="{{route('posts.index')}}"><h3>Админ панель для постов</h3></a>
                <a href="{{route('categories.index')}}"><h3>Админ панель для категории</h3></a>
                <a href="{{route('users.index')}}"><h3>Админ панель для пользователей</h3></a>
            @elseif(Auth::user()->usertype==='manager')
                <h3>Manager</h3>
            @endif
            @endguest


    </div>
@endsection
