@extends('layouts.authlayout')
@section('title', 'success registration')
@section('content')
    {{-- @if ($errors->any())
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
    @endif --}}

    <div class="container">
            <div class="mb-3" style = "background-color: rgba(92, 215, 6, 0.4);">
                <label for="username" class="form-label">Registration successful, click the link below to login</label>
            </div>

            <div class="mb-3">
                <a href='/login'>login</a>
            </div>
    </div>
@endsection
