@extends('layouts.master')
@section('name', 'Home Page')
@section('content')
    <main class ="homepage">

        @include('pages.components.home.header')

        <form action="{{route('logout')}}" method="post">
            @csrf
            <div class="btn btn-primary">logout</div>
        </form>

    </main>

@endsection
