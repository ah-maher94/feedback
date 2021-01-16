@extends('layouts.app')


@section("firstContainer")


<div class="container bg-light justify-content-center my-5 col-5">
    <div class="row justify-content-center my-5">
        <div class="col-10 justify-content-center my-5">
            <form autocomplete="off" action=" {{ route('login') }} " method="POST">
                @csrf

                <div class="form-group col-12">
                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                        name="email" aria-describedby="emailHelp" placeholder="Enter email" value="{{ old('email') }}">
                    @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="form-group col-12">
                    <input type="password" class="form-control @error('password') is-invalid @enderror" id="password"
                        name="password" placeholder="Password">
                    @error('password')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group col-12">
                    <div class="form-check mb-3">
                        <input type="checkbox" class="form-check-input" id="remember" name="remember">
                        <label class="form-check-label" for="exampleCheck1">Remember Me</label>
                    </div>
                    <button type="submit" class="btn btn-primary col-3">Login</button>
                </div>
            </form>
        </div>
    </div>
</div>



@endSection