@extends('layouts.parent')
@section('title', 'Dashboard')

@section('content')
    <!-- Card with an image on top -->
    <div class="row">
        <div class="card">
            <div class="card-title"></div>
            <div class="card-body">
                <h1>Dashboard</h1>
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active">Todo List</li>
                    </ol>
                </nav>
            </div><!-- End Page Title -->
        </div>
        <div class="card">
            <img src="{{ asset('assets/img/inazuma-castel.jpg') }}" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">Welcome {{ auth()->user()->name }}</h5>
                <p class="card-text">This is a Todo List Website</p>
            </div>
        </div><!-- End Card with an image on top -->
    @endsection
