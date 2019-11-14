@extends('layouts.app')

@section('content')
    <section class="row flexbox-container">
        <div class="col-xl-8 col-11 d-flex justify-content-center">
            <div class="card bg-authentication rounded-0 mb-0">
                <div class="row m-0">
                    <div class="col-lg-6 d-lg-block d-none text-center align-self-center px-1 py-0">
                        <img src="{{ asset('app-assets/images/pages/login.png') }}" alt="BobMap">
                    </div>
                    <div class="col-lg-6 col-12 p-0">
                        <div class="card rounded-0 mb-0 px-2">
                            <div class="card-header pb-1">
                                <div class="card-title">
                                    <h4 class="mb-0">Trago Copura Laravel</h4>
                                </div>
                            </div>
                            <p class="px-2">Benvenuto, inserisci le tue credenziali.</p>
                            <div class="card-content">
                                <div class="card-body pt-1">
                                    <form method="POST" action="{{ route('login') }}">
                                        @csrf
                                        <fieldset class="form-label-group form-group position-relative has-icon-left">
                                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="user-name"
                                                   placeholder="Nome Utente" value="{{ old('email') }}" required autocomplete="email" autofocus name="email">
                                            <div class="form-control-position">
                                                <i class="feather icon-user"></i>
                                            </div>
                                            <label for="user-name">{{ __('E-Mail Address') }}</label>
                                            @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </fieldset>

                                        <fieldset class="form-label-group position-relative has-icon-left">
                                            <input type="password" class="form-control @error('password') is-invalid @enderror" id="user-password"
                                                   placeholder="Password" name="password" required autocomplete="current-password">
                                            <div class="form-control-position">
                                                <i class="feather icon-lock"></i>
                                            </div>
                                            <label for="user-password">{{ __('Password') }}</label>
                                            @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </fieldset>
                                        <div class="form-group d-flex justify-content-between align-items-center">
                                            <div class="text-left">
                                                <fieldset class="checkbox">
                                                    <div class="vs-checkbox-con vs-checkbox-primary">
                                                        <input  type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                                        <span class="vs-checkbox">
                                                                        <span class="vs-checkbox--check">
                                                                            <i class="vs-icon feather icon-check"></i>
                                                                        </span>
                                                                    </span>
                                                        <span class="">Ricordami</span>
                                                    </div>
                                                </fieldset>
                                            </div>
                                            <div class="text-right"><a href="{{ route('password.request') }}"
                                                                       class="card-link">Password Dimenticata?</a></div>
                                        </div>
                                        <button type="submit" class="btn btn-primary w-100 mb-5 btn-inline">Entra </button>
                                    </form>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection