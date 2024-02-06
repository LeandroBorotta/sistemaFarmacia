@extends('layouts.app')

@section('content')

    <div class="card mb-3">

    <div class="card-body">

        <div class="pt-4 pb-2">

        @include('_message')
        
        <h5 class="card-title text-center pb-0 fs-4">Esqueceu-se da sua conta</h5>
        <p class="text-center small">Digite seu email</p>
        </div>

        <form action="{{ route('admin.forgot_post') }}" method="POST" class="row g-3 needs-validation" novalidate>
            @csrf

        <div class="col-12">
            <label class="form-label">E-mail</label>
            <div class="input-group has-validation">
            <span class="input-group-text" id="inputGroupPrepend">@</span>
            <input type="email" name="email" class="form-control" required value="{{ old('email') }}">
            <div class="invalid-feedback">Introduza o seu email</div>
            </div>
        </div>
    

        <div class="col-12">
            <button class="btn btn-primary w-100" type="submit">Forgot</button>
        </div>
        <div class="col-12">
            <p class="small mb-0">Login? 
            <a href="{{ url('/') }}">Volta Login</a></p>
        </div>
    
        </form>

    </div>
    </div>

@endsection

