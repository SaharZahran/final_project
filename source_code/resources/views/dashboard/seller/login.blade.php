@extends('dashboard.seller.layouts.master')
@section('pageTitle', 'Seller|Login')

@section('content')
    <div class="container">
        <h1>Seller Login</h1>
        <ul class="register__switchList">
            <li class="register__button--switch"><a href={{ route('user.login') }}>As a user</a></li>
            <li class="register__button--switch"><a href={{ route('seller.login') }}>As a seller</a></li>
        </ul>
        <form action="{{ route('seller.check') }}" method="post" class="login__form">
           @if (Session::get('fail'))
               {{ Session::get('fail') }}
           @endif
            @csrf
            <div class="form__field">
                <label for="company_email">Email</label>
                <input type="company_email" id="company_email" name="company_email" placeholder="Enter Company Email Address" value={{ old('company_email') }}>
                <span class="text-danger">
                    @error('company_email')
                        {{ $message }}
                    @enderror
                </span>
            </div>
            <div class="form__field">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Enter Password" value={{ old('password') }}>
                <span class="text-danger">
                    @error('password')
                        {{ $message }}
                    @enderror
                </span>
            </div>
            <button type="submit" class="login__btn">Login</button>
            <a class="form__hint" href={{ route('seller.register') }}>Do not have an account</a>
        </form>
    </div>
</body>
@endsection