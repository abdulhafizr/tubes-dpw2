@extends('auth.template')

@section('content')
    <section class="vh-100">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-5 text-black">

                    <div class="px-4 ms-xl-4">
                        <img src="{{ asset('img/logo.png') }}" width="150px" alt="Logo Sekolah">
                        <span class="h1 fw-bold mb-0">Smk Telkom Purwokerto</span>
                    </div>

                    <div class="d-flex align-items-center h-custom-2 px-5 ms-xl-4 mt-5 pt-5">

                        <form method="post" action="{{ route('auth.login') }}" style="width: 100%;">

                            @csrf

                            <h3 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Log in</h3>

                            <div class="form-outline mb-4">
                                <input type="email" id="form2Example18" name="email"
                                       class="form-control form-control-lg @error('email') is-invalid @enderror"
                                       value="{{ old('email') }}" autofocus required/>
                                <label class="form-label" for="form2Example18">Email address</label>
                                @error('email')
                                <span class="error invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-outline mb-4">
                                <input type="password" id="form2Example28" name="password"
                                       class="form-control form-control-lg" required/>
                                <label class="form-label" for="form2Example28">Password</label>
                            </div>

                            <div class="pt-1 mb-4">
                                <button class="btn btn-danger btn-lg btn-block" type="submit">Login</button>
                            </div>

                            {{--                        <p class="small mb-5 pb-lg-2"><a class="text-muted" href="#!">Forgot password?</a></p>--}}
                            {{--                        <p>Don't have an account? <a href="#!" class="link-info">Register here</a></p>--}}

                        </form>

                    </div>

                </div>
                <div class="col-sm-7 px-0 d-none d-sm-block">
                    <img src="{{ asset('img/login-bg.png') }}"
                         alt="Login image" class="w-100 vh-100" style="object-fit: cover; object-position: left;">
                </div>
            </div>
        </div>
    </section>
@endsection
