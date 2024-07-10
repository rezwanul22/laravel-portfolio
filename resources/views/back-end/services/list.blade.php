@extends('layouts.dashboard_layout')

@section('content')

<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">List of Services</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{ route('Dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active">List</li>
        </ol>

        <table class="table table-bordered">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Icon</th>
                <th scope="col">Title</th>
                <th scope="col">Description</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
                @if (count ($service) > 0)
                @foreach ($service as $service)
                    <tr>
                        <th scope="row">{{$service->id}}</th>
                        <td>{{$service->icon}}</td>
                        <td>{{$service->title}}</td>
                        <td>{{Str::limit(strip_tags ($service->description),40)}}</td>
                        <td>
                            <div class="row">
                                <div class=" col-sm-2">
                                    <a href="{{ route('main.service.edit',$service->id) }}" class="btn btn-primary">Edit</a>
                                </div>
                                <br>
                                <div class=" col-sm-2">
                                    <form action="{{ route('main.service.destroy',$service->id) }}" method="post">
                                        @csrf
                                        @method('Delete')
                                        <input type="submit" name="submit" value="Delete" class="btn btn-danger">
                                    </form>
                                </div>
                            </div>
                        </td>
                @endforeach
            @endif
         </tbody>
    </table>
</main>
@endsection
