@if ($errors->any())
             @foreach ($errors->all() as $error)
            <div class="alert alert-danger alert-dismissible">
                <button type="button"class="close" data-bs-dismiss="alert">&times;</button>
                <strong>Error!</strong>{{ $error }}
            </div>
            @endforeach
       @endif

       @if (session('error'))

            <div class="alert alert-danger alert-dismissible">
                <button type="button"class="close" data-bs-dismiss="alert">&times;</button>
                <strong>Error!</strong>{{ session('error') }}
            </div>
       @endif

       @if (session('success'))
       <div class="alert alert-success alert-dismissible">
           <button type="button"class="close" data-bs-dismiss="alert">&times;</button>
           <strong>success!</strong>{{ session('success') }}
       </div>
  @endif

