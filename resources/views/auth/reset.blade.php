
@extends('layouts.app')

@section('content')

    {{-- login start page --}}
    <div class="card mb-3">

    <div class="card-body">

        <div class="pt-4 pb-2">
        @include('_message')
        <h5 class="card-title text-center pb-0 fs-4">Redefinir senha</h5>
        <p class="text-center small">Digite a senha & Confirme a senha</p>
        </div>

        <form action="{{ route('admin.reset',$token) }}" method="POST" class="row g-3 needs-validation" novalidate>
            @csrf 

        <div class="col-12">
            <label class="form-label">Password</label>
            <div class="input-group has-validation">
            <input type="password" name="password" class="form-control" required value="{{ old('password') }}">
            <span style="color: red;">{{ $errors->first('password') }}</span>
            <div class="invalid-feedback">Por favor, digite sua senha!</div>
            </div>
        </div>

        <div class="col-12">
            <label class="form-label">Confirm password</label>
            <input type="password" name="confirm_password" class="form-control" required>
            <span style="color: red;">{{ $errors->first('confirm_password') }}</span>
            <div class="invalid-feedback">Por favor, digite sua senha!</div>
        </div>

        <div class="col-12">
            <button class="btn btn-primary w-100" type="submit">Redefinir</button>
        </div>
      
  
        </form>

    </div>
    </div>

    {{-- Login End --}}


@endsection

