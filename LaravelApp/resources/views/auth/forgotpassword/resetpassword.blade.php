@extends('layouts.authlayout')
@section('title', 'Login')
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

        <form action="{{ route('login.post') }}" method="POST" class="ms-auto me-auto mt-auto" style="width: 500px">
            @csrf

            <div class="mb-3">
                <label for="username" class="form-label">Type your new password</label>
                <input type = 'text' class="form-control" id="user_name" name="email">
            </div>
            <div class="mb-3">
                <label for="username" class="form-label">Re-enter password</label>
                <input type = 'text' class="form-control" id="user_name" name="email">
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>

            <div class="mb-3">
                <a href='/login'>login</a>
            </div>
        </form>

    </div>
@endsection