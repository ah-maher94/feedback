@extends('layouts.app')


@section("firstContainer")


<div class="container bg-light justify-content-center my-5 col-5">
    <div class="row justify-content-center my-5">
        <div class="col-10 justify-content-center my-5">
            <form autocomplete="off" action=" {{ route('register') }} " method="POST">
                @csrf

                <div class="form-group col-12">
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                        placeholder="Enter name" value="{{ old('name') }}">
                    @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="form-group col-12">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroupPrepend3">@</span>
                        </div>
                        <input type="text" class="form-control @error('username') is-invalid @enderror" id="username"
                            name="username" placeholder="username" aria-describedby="inputGroupPrepend3"
                            value="{{ old('username') }}">
                        @error('username')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>

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
                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation"
                        placeholder="confirm password">
                </div>
                <div class="form-group col-12">
                    <button type="submit" class="btn btn-primary col-3">Register</button>
                </div>
            </form>
        </div>
    </div>
</div>



@endSection