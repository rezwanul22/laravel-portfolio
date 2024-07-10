@extends('layouts.dashboard_layout')

@section('content')

<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">List of Portfolio</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{ route('Dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active">List</li>
        </ol>

        <table class="table table-bordered">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <th scope="col">Sub Title</th>
                <th scope="col">Big Image</th>
                <th scope="col">Small Image</th>
                <th scope="col">Description</th>
                <th scope="col">Client</th>
                <th scope="col">Category</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
                @if (count ($portfolios) > 0)
                @foreach ($portfolios as $portfolio)
                    <tr>
                        <th scope="row">{{$portfolio->id}}</th>
                        <td>{{$portfolio->title}}</td>
                        <td>{{$portfolio->sub_title}}</td>
                        <td>
                            <img style="height: 10vh" src="{{ url($portfolio->big_image) }}" >
                        </td>
                        <td>
                            <img style="height: 10vh" src="{{ url($portfolio->small_image) }}" >
                        </td>
                        <td>{{Str::limit(strip_tags ($portfolio->description),40)}}</td>
                        <td>{{$portfolio->client}}</td>
                        <td>{{$portfolio->category}}</td>

                        <td>
                            <div class="row">
                                <div class=" col-sm-2">
                                    <a href="{{ route('portfolios.edit',$portfolio->id) }}" class="btn btn-primary ">Edit</a>
                                </div>
                                <br>
                                <div class=" col-sm-2">
                                    <form action="{{ route('portfolios.destroy',$portfolio->id) }}" method="post">
                                        @csrf
                                        @method('Delete')
                                        <input type="submit" name="submit" value="Delete" class="btn btn-danger  ">
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
