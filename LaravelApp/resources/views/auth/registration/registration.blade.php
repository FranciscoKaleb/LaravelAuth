@extends('layouts.authlayout')
@section('title', 'Registration')
@section('content')
<script src="{{ asset('js/auth/registration.js') }}"></script>
<link rel="stylesheet" type="text/css" href="{{ asset('css/auth/register.css') }}">

  <div class='container'>
    <form action='{{ route('registration.post') }}' method="POST" class='ms-auto me-auto mt-auto' style='width: 500px;'
          id="registrationForm">

        @csrf
        {{-- email --}}
        <div class="input-group has-validation mb-3">
          
          <div class="form-floating" id = "floatingInputGroup1Head">
            <input onkeyup = "resetTimeout1()" onblur = "resetTimeout1()" name = "email" type="text" class="form-control border-secondary" id="floatingInputGroup1" placeholder="Email"  required>
            <label for="floatingInputGroup1">Your Email address</label>
          </div>
          
          <div class="invalid-feedback" id = "floatingInputGroup1Label">
            Email not valid.
          </div>
          
        </div>

        {{-- username --}}
        <div class="input-group has-validation mb-3">
          
          <div class="form-floating" id = "floatingInputGroup2Head">
            <input onkeyup = "resetTimeout()" onblur = "resetTimeout()" name = "username" type="text" class="form-control border-secondary" id="floatingInputGroup2" placeholder="Email" required>
            <label for="floatingInputGroup2">Username</label>
          </div>
          
          <div class="invalid-feedback" id = "floatingInputGroup2Label">
            Username not valid.
          </div>
          
        </div>

        {{-- password --}}
        <div class="input-group has-validation mb-3">
          
          <div class="form-floating" id="floatingInputGroup3Head">
            <input onkeyup = "resetTimeout2()" name = "password" id="floatingInputGroup3" type="password" style = "border-right:none;" class="form-control border-secondary" id="main_pass" placeholder="Email" required>
            <label for="floatingInputGroup3">Password</label>
          </div>
          <span class="input-group-text border-secondary">
            <button tabindex="-1" style = 'border-radius:50%; background-color:white; color:black; border:none;' type="button" class="btn btn-primary" onclick="revealPassword()">
              <i id = "eye_icon" class="bi bi-eye-fill"></i>
            </button>
          </span>
          
          <div class="invalid-feedback" id="floatingInputGroup3Label">
            Password not valid.
          </div>
          
          
        </div>


        {{-- confirm password --}}
        <div class="input-group has-validation mb-3">
          
          <div class="form-floating" id="floatingInputGroup4Head">
            <input onkeyup = "resetTimeout3()" id="floatingInputGroup4" type="password" class="form-control border-secondary" style = "border-right: none" placeholder="Retype Password" required>
            <label class="form-label" style = "font-size:0.8em;" id = 'pass_indicator'></label>
            <label for="floatingInputGroup4">Repeat Password</label>
          </div>
          <span class="input-group-text border-secondary">
            <button tabindex="-1" style = 'border-radius:50%; background-color:white; color:black; border:none;' type="button" class="btn btn-primary" onclick="revealPassword2()">
              <i id = "eye_icon2" class="bi bi-eye-fill"></i>
            </button>
          </span>
          <div class="invalid-feedback" id="floatingInputGroup4Label">
            Password does not match.
          </div>
          
          
        </div>

        {{-- button --}}
        <button  type="button" id = "submitData" class="btn btn-primary" onclick="submitForm()">Submit</button>
        
        {{-- login link --}}
        <div class='mb-3'>
            <a href='/login'>Login</a>
        </div>

    </form>
  </div>

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
    
@endsection