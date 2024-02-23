@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
    
          

{{-- form---------------------------------------------------------------------------------------------------------}}
                 
<section style="display: flex;justify-content: center;align-items: center;">
    <div class="container-fluid h-custom" style="margin: auto">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-md-9 col-lg-6 col-xl-5">
          <img src="/bus-color.png"
            class="img-fluid" alt="Sample image">
            
            
        </div>
        <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
          
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="row mb-3" style="display: flex;justify-content: center;align-items: center;">
                    <div class="col-md-12" style="width: 50%;display: flex;justify-content: center;align-items: center;">
                <img src="/logo_avefenix.png"
            class="img-fluid" alt="Sample image" style="width: 50%; margin:10px auto">
                </div>
            </div>

            <div class="row mb-0 ">
                <label for="email" class="col col-form-label ">{{ __('Email') }}</label>
            </div>
            
            <div class="row mb-3">
                <div class="col">
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="row mb-0">
                <label for="password" class="col col-form-label ">{{ __('Password') }}</label>
            </div>

            <div class="row mb-3">    
                <div class="col">
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
{{-- 
            <div class="row mb-3">
                <div class="col-md-8 offset-md-4">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                        <label class="form-check-label" for="remember">
                            {{ __('Remember Me') }}
                        </label>
                    </div>
                </div>
            </div> --}}

            <div class="row mb-0">
                <div class="col" style="margin-top:1rem">
                    <button type="submit" class="btn btn-primary" style="width: 100%">
                        {{ __('Login') }}
                    </button>

                </div>
            </div>

            
          </form>
        </div>
      </div>
    </div>
   
  </section>

{{-- ----------- --}}



{{-- endform---------------------------------------------------------------------------------------------------------}}


               
        
 
</div>
@endsection
