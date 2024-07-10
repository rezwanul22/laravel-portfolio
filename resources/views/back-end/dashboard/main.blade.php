@extends('layouts.dashboard_layout')

@section('content')

<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Main</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{ route('Dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active"> Main</li>
        </ol>
        <form action="{{ route('main.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            {{ method_field('put') }}
        <div class="row">
            <div class="form-group col-md-3 mt-3">
                <h3>Background Image</h3>
                <img style="height:32vh ,width:50vh" src="{{ url($main->bc_img) }}" class="img-thumbnail">
                <input class="mt-3" type="file" id="bc_img" name="bc_img">

            </div>
            <div class="form-group col-md-4 mt-3">
                <div class="mb-3">
                    <label for="title"> <h4>Title</h4> </label><br>
                    <input type="text" class="form control" id="title" name="title" value="{{ $main->title }}">
                </div>
                <div class="mb-5">
                    <label for="sub_title"> <h4>Sub Title</h4> </label><br>
                    <input type="text" class="form control" id="sub_title" name="sub_title" value="{{ $main->sub_title }}" >
                </div>
                <div>
                    <h4>Uploade Resume</h4>
                    <Input class="mt-2" type="file" id="resume" name="resume"></Input>

                </div>
            </div>
        </div>

        <input type="Submit" value="Submit" class="btn btn-success mt-5">

    </div>
  </form>
</main>
@endsection













