@extends('layouts.master')
@section('name', 'Home Page')
@section('content')
    <main class ="homepage">

        @include('pages.components.home.header')

        @auth
        <form action="{{route('logout')}}" method="post">
            @csrf
            <div class="btn btn-primary">
                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 48 48"><g fill="none" stroke="#000" stroke-linecap="round" stroke-linejoin="round" stroke-width="4"><path d="M23.9917 6H6V42H24"/><path d="M33 33L42 24L33 15"/><path d="M16 23.9917H42"/></g></svg>
                logout</div>
        </form>
        @endauth
    </main>

@endsection
