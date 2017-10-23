@extends('layouts.app')

@section('content')

    
<div class="login-wrap">

<div class="card">

<div class="card-header">
<div class="card-title">Logga in</div>
</div>

<form method="POST" action="{{ route('login') }}">
{{ csrf_field() }}

        
<label for="email">E-Mail Address</label>
<input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus>

<label for="password">Password</label>
<input id="password" type="password" name="password" required>

<label>
<input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
</label>
                                
<div class="card-footer">
<button type="submit">
Login
</button>

<a style="padding-left: 20px;" href="{{ route('password.request') }}">Forgot Your Password?</a>
</div>                           
</form>

</div>

</div>


                
@endsection
