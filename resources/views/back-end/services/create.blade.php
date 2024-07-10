@extends('layouts.dashboard_layout')

@section('content')

<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Service</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{ route('Dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active">Create</li>
        </ol>
        <form action="{{ route('main.create.store') }}" method="POST" enctype="multipart/form-data" >
            @csrf
        <div class="row">
            <div class="form-group col-md-6 mt-3">
                <div class="mb-3">
                    <label for="icon"> <h4>Font awsome icon</h4> </label><br>
                    <input type="text" class="form control" id="icon" name="icon">
                </div>
                <div class="mb-5">
                    <label for="title"> <h4>Title</h4> </label><br>
                    <input type="text" class="form control" id="title"name="title">
                </div>
                <div class="mb-6">
                    <label for="description"> <h4>Description</h4> </label><br>
                    <textarea type="text" class="form control" id="description" name="description"></textarea>
                </div>

            </div>
        </div>

        <input type="Submit" value="Submit" class="btn btn-success mt-5">

    </div>
  </form>
</main>
@endsection














