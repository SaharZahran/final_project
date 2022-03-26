<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/auth.css') }}">
    <title>Admin Login</title>
</head>
<body>
    <div class="container">
        <h1>Admin Login</h1>
        <form action="{{ route('admin.check') }}" method="post" class="login__form">
           @if (Session::get('fail'))
               {{ Session::get('fail') }}
           @endif
            @csrf
            <div class="form__field">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" placeholder="Enter Email Address" value={{ old('email') }}>
                <span class="text-danger">
                    @error('email')
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
        </form>
    </div>
</body>
</html>