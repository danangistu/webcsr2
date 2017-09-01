@extends('layouts.login')
@section('content')
<!-- PASSWORD RESETTING FORM -->
<!--===================================================-->
<div class="cls-content">
    <div class="cls-content-sm panel">
        <div class="panel-body">
            <p class="pad-btm">Enter your email address to recover your password. </p>
            <form role="form" method="POST" action="{{ url('/password/email') }}">
                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-addon"><i class="fa fa-envelope"></i></div>
                        <input type="email" class="form-control" placeholder="Email">
                    </div>
                </div>
                <div class="form-group text-right">
                    <button class="btn btn-success text-uppercase" type="submit">Reset Password</button>
                </div>
            </form>
        </div>
    </div>
    <div class="pad-ver">
        <a href="{{ url('login') }}" class="btn-link mar-rgt">Back to Login</a>
    </div>
</div>
<!--===================================================-->
@endsection
