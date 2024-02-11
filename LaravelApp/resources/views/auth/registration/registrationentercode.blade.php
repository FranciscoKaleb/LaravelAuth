@extends('layouts.authlayout')
@section('title', 'Enter code')
@section('content')
    <div class = 'container'>
        <form  action = '{{route('confirm.post')}}' method = "POST" class = 'ms-auto me-auto mt-auto' style = 'width: 500px;'>

            @csrf
            <div class="mb-3">
                <label class="form-label">A confirmation code was sent to <b>{{$email}}</b> <br><br>
                    Enter Confirmation code to continue with the registration
                </label>
                <input value = {{$email}} name = 'email' type = 'hidden'>
                <input type="text" class="form-control" name = 'confirmation_code' >
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>

            
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
      {{-- <script>
        alert('invalid');
      </script> --}}
    @endif

@endsection