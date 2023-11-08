@extends('layouts.app')

@section('content')
    <div class="container position-sticky z-index-sticky top-0">
        <div class="row">
            <div class="col-12">
                @include('layouts.navbars.guest.navbar')
            </div>
        </div>
    </div>
    <main class="main-content  mt-0">
        <div class="page-header align-items-start min-vh-100"
            style="background-image: url('https://images.unsplash.com/photo-1497294815431-9365093b7331?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1950&q=80');">
            <span class="mask bg-gradient-dark opacity-6"></span>
            <div class="container my-auto">
                <div class="row">
                    <div class="col-lg-4 col-md-8 col-12 mx-auto">
                        <div class="card z-index-0 fadeIn3 fadeInBottom">
                            {{-- <div class="card"> --}}



                            <div class="card-header card-header-primary">
                                <h4 class="card-title text-center">SIEGRA OPS JR</h4>
                                <p class="card-category  text-center">Silahkan Login terlebih dahulu</p>
                            </div>
                            <div class="card-body mx-3">
                                <form role="form" method="POST" action="{{ route('login.perform') }}">
                                    @csrf
                                    @method('post')
                                    <div class="form-group my-3">
                                        <label for="email">Email</label>
                                        <input type="email" name="email" class="form-control"
                                            value="{{ old('email') }}" aria-label="Email" id="email"
                                            placeholder="Enter email">
                                        @error('email')
                                            <p class="text-danger text-xs pt-1"> {{ $message }} </p>
                                        @enderror
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="password">Password</label>
                                        <input type="password" name="password" class="form-control" aria-label="Password"
                                            placeholder="Enter Password">
                                        @error('password')
                                            <p class="text-danger text-xs pt-1"> {{ $message }} </p>
                                        @enderror
                                    </div>
                                    <div class="form-check">
                                        <label class="form-check-label" for="rememberMe">
                                            <input class="form-check-input" type="checkbox" id="rememberMe">
                                            Remember me
                                            <span class="form-check-sign">
                                                <span class="check"></span>
                                            </span>
                                        </label>
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary w-100 my-4 mb-2">Sign
                                            in</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <footer class="footer position-absolute bottom-2 py-2 w-100">
                <div class="container">
                    <div class="row align-items-center justify-content-lg-center">
                        <div class="col-12 col-md-6 my-auto">
                            <div class="copyright text-center text-sm text-white text-lg-start">
                                Copyright ©
                                <script>
                                    document.write(new Date().getFullYear())
                                </script>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </main>
@endsection
