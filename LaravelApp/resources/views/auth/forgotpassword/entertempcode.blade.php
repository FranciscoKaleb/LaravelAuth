@extends('layouts.authlayout')
@section('title', 'Forgot password')
@section('content')

    @if ($errors->any())
      <div class="alert alert-danger">
          <ul>
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
          </ul>
      </div>
      <script>
        alert('invalid');
      </script>
    @endif

    <div class="container">

        <form action="{{ route('entertempcode.post') }}" method="POST" class="ms-auto me-auto mt-auto" style="width: 500px">
            @csrf
            <div class="mb-3">
                Enter the code we send in your email <b>{{$email}}</b>  to log in.
            </div>
            <div class="mb-3">
                <input type = 'text' class="form-control" id="user_name" name="code">
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>

            <div class="mb-3">
                <a href='/login'>login</a>
            </div>
        </form>

    </div>
@endsection
