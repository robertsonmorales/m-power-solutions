@extends('layouts.auth')

@section('title', 'Login Page')

@section('auth')
<div class="row justify-content-center align-items-center vh-100">
    <div class="col-md-5">
        <form class="auth-card" 
            method="POST" 
            action="{{ route('login') }}" 
            id="auth-form">

            @csrf

            <div class="card px-5 py-2">
                <div class="card-header border-0 mb-3">
                    <div class="text-center">
                        <img src="{{ asset('images/logo/logo.png') }}"
                            width="195"
                            height="177.23"
                            alt="logo">
                    </div>

                    @if(session('success'))
                    <div class="alert alert-success" role="alert">{{ session('success') }}</div>
                    @endif
                </div>

                <div class="card-body pt-0">
                    <div class="form-group row flex-column inputs">
                        <div class="col">
                            <div class="field-container">
                                <input class="form-control" 
                                    id="email" 
                                    name="email" 
                                    type="email"
                                    placeholder=" "
                                    autocomplete="off">
                                <label class="field-placeholder" 
                                    for="email">Email</label>
                            </div>

                            @error('email')
                            <span class="invalid-feedback font-12 text-white d-block" role="alert">{{ $message }}</span>
                            @enderror

                            <span class="font-12 text-white" id="invalid-password"></span>
                        </div>
                    </div>

                    <div class="form-group row flex-column inputs">
                        <div class="col">
                            <div class="field-container">
                                <input class="form-control" 
                                    id="password" 
                                    name="password" 
                                    type="password"
                                    placeholder=" "
                                    autocomplete="off">
                                <label class="field-placeholder" 
                                    for="password">Password</label>
                                
                                <button type="button" class="show-password-btn">
                                    <span id="eyes-open">
                                        <em data-feather="eye"></em>
                                    </span>
                                    <span id="eyes-close">
                                        <em data-feather="eye-off"></em>
                                    </span>
                                </button>
                            </div>

                            @error('password')
                            <span class="font-12 text-white" role="alert">{{ $message }}</span>
                            @enderror

                            <span class="font-12 text-white" id="invalid-password"></span>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }} style="cursor: pointer;">
                                <label class="custom-control-label text-light font-12" for="remember">
                                    <span class="re-align-text">{{ __('Remember Me') }}</span>
                                </label>
                            </div>
                        </div>
                        <div class="col text-right">
                            @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}" class="text-light font-12">{{ __('Forgot Password?') }}</a>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col">
                            <button type="button" 
                                id="btn-login" 
                                class="btn btn-success font-weight-500 w-100 border">{{ __('Log in') }}</button>

                            <div class="text-center mt-3">
                                <p class="text-light">Don't have an account yet? register <a href="{{ route('register') }}" class="click-here">here</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>  
    </div>
</div>
@endsection

@section('vendors-script')
<script src="{{ asset('vendors/jquery/jquery-3.4.1.min.js') }}"></script>
@endsection

@section('scripts')
<script type="text/javascript">
$(document).ready(function() {
    $('.show-password-btn').on('click', function(){
        $('#password').attr('type', 'text');
    });

    function validateFields(){
        $('.invalid-feedback').html('');

        if($('#username').val() == ""){
            $('#username').focus();
            $('#invalid-username').html('The username field is required.');
        }else{
            $('#invalid-username').html('');
        }
        
        if($('#password').val() == ""){
            $('#invalid-password').html('The password field is required.');
        }else{
            $('#invalid-password').html('');
        }

        if($('#password').val() != "" && $('#username').val() != ""){
            return true;
        }else{
            return false;
        }
    }

    $('#btn-login').on('click', function(){
        var validation = validateFields();

        if(validation == true){
            $(this).prop('disabled', true)
                .css('cursor', 'not-allowed')
                .text('Authenticating...');

            $('#auth-form').submit();
        }
    });
});
</script>
@endsection