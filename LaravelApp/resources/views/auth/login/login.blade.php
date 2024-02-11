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
                <label for="username" class="form-label">User name</label>
                <input type = 'text' class="form-control" id="user_name" name="login">
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>

            <div class="mb-3">
                <a href='/register'>Register</a>
            </div>
            <div class="mb-3">
                <a href='/forgotpassword'>Forgot password</a>
            </div>
        </form>

    </div>
@endsection
