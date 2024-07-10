@extends('layouts.dashboard_layout')

@section('content')

<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Portfolio Dashboard</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{ route('Dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active">Portfolio Dashboard</li>
        </ol>

</main>

@endsection

