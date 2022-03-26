@extends('dashboard.user.layouts.master')
@section('pageTitle', 'Contact')
@section('content')
<div class="big__container">
    <h1>Contact us</h1>
    <div class="contact__container">
        <div class="contact__left">
            <p><i class="fa fa-envelope"></i> contact@greenmarket.com</p>
            <p><i class="fa fa-phone"></i> 0777_777_777</p>
        </div>
        <div class="contact__right">
            <form action={{ route('contact.store') }} method="post">
                @csrf
                    <div class="input-group">
                        <label>Email Address</label><br>
                        <input type="email" name="email" class="form-control" value={{ Auth::guard()->user()->email }} required>
                    </div>
                    <div class="input-group">
                        <label class="input-group-addon">Message</label><br>
                        <textarea name="message" placeholder="Enter you message..." required></textarea>
                    </div>
                <div class="form-actions form-group">
                    <button type="submit" class="btn btn-primary btn-sm">Send Message</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection