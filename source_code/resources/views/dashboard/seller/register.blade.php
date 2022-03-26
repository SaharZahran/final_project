@extends('dashboard.seller.layouts.master')
@section('pageTitle', 'Seller | Register')
@section('content')
    <div class="container registerSeller__container">
        <h1>Register</h1>
        <ul class="register__switchList">
            <li class="register__button--switch"><a href={{ route('user.register') }}>As a user</a></li>
            <li class="register__button--switch"><a href={{ route('seller.register') }}>As a seller</a></li>
        </ul>
        <form action={{ route('seller.create') }} class="register__seller" method="POST" enctype="multipart/form-data">
            @if (Session::get('success'))
            <div>
                {{ Session::get('success')}}
            </div> 
            @endif
            @if (Session::get('fail'))
            <div>
                {{ Session::get('fail')}}
            </div> 
            @endif
            @csrf
            <div class="register__bigContainer">
                <div class="register__form--left">
                    <div class="form__field">
                        <label for="company_name">Company Name</label>
                        <input type="text" id="company_name" name="company_name" placeholder="Enter Your Company Name" value={{ old('company_name') }}>
                        <span class="text-danger">@error('company_name')
                            {{ $message }}
                        @enderror</span>
                    </div>
                    <div class="form__field">
                        <label for="password">Password</label>
                        <input type="password" id="password" name="password" placeholder="Enter Password" value={{ old('password') }}>
                        <span class="text-danger">@error('password')
                            {{ $message }}
                        @enderror</span>
                    </div>
                    <div class="form__field">
                        <label for="confirm_password">Confirm Password</label>
                        <input type="password" id="confirm_password" name="confirm_password" placeholder="Confirm Password " value={{ old('confirm_password') }}>
                        <span class="text-danger">@error('confirm_password')
                            {{ $message }}
                        @enderror</span>
                    </div>
                    <div class="form__field">
                        <label for="hero_image">Upload Image</label>
                        <p class="register__form--hint">Hint: (Min-Width:1100px, Min-Height:350px)</p>
                        <input type="file" id="hero_image" name="hero_image" placeholder="Upload image for your store" value={{ old('hero_image') }}>
                        <span class="text-danger">@error('hero_image')
                            {{ $message }}
                            @enderror</span>
                        </div>
                    </div>
                    <div class="register__form--right">
                    <div class="form__field">
                        <label for="company_email">Company Email</label>
                        <input type="email" id="company_email" name="company_email" placeholder="Enter Email Address" value={{ old('company_email') }}>
                        <span class="text-danger">@error('company_email')
                            {{ $message }}
                        @enderror</span>
                    </div>
                    <div class="form__field">
                        <label for="phone">Company Phone</label>
                        <input type="number" id="phone" name="phone" placeholder="Enter Phone number" value={{ old('phone') }}>
                        <span class="text-danger">@error('phone')
                            {{ $message }}
                        @enderror</span>
                    </div>
                    <div class="form__field">
                        <label for="grower_method">Grower Method</label>
                        <p class="register__form--hint">Hint: (Only PDF)</p>
                        <input type="file" id="grower_method" name="grower_method" placeholder="Upload Your Method" value={{ old('grower_method') }}>
                        <span class="text-danger">@error('grower_method')
                            {{ $message }}
                        @enderror</span>
                    </div>
                    <div class="sellerRegister__checkBox">
                        <label for="company_category">Choose Category</label><br>
                        <p class="register__form--hint">Hint: (Check at least one category)</p>
                        <div class="register__categories">
                            <div>
                                <input type="checkbox" id="category_one" name="category_one" value="Organic">
                                <label for="category_one">Organic</label><br>
                
                                <input type="checkbox" id="category_two" name="category_two" value="Plants">
                                <label for="category_two">Plants</label><br>
                                
                                <input type="checkbox" id="category_three" name="category_three" value="Seeds">
                                <label for="category_three">Seeds</label>
                            </div>
                            <div>
                                <input type="checkbox" id="category_four" name="category_four" value="Garden Supplies">
                                <label for="category_four">Garden Supplies</label><br>
                
                                <input type="checkbox" id="category_five" name="category_five" value="Indoor Plants">
                                <label for="category_five">Indoor Plants</label><br>
                            </div>
                        </div>
                        <span class="text-danger">@error('category_one')
                            {{ $message }}
                        @enderror</span>
                    </div>
                </div>
            </div>
            <button type="submit" class="register__btn">Register</button>
            <br>
            <a class="form__hint" href={{ route('seller.login') }}>Already have an account</a>
        </form>
    </div>
@endsection