@extends('layouts.app')

@section('content')

<div class="login-wrap">

<div class="card">

<div class="card-header">
<div class="card-title">Registrera nytt konto</div>
</div>

<form method="POST" action="{{ route('register') }}">
{{ csrf_field() }}

<label for="company">Företagsnamn</label>
<input id="company" type="text" name="company" value="{{ old('company') }}" required autofocus>

<label for="name">Name</label>
<input id="name" type="text" name="name" value="{{ old('name') }}" required>

<label for="email">E-Mail Address</label>
<input id="email" type="email" name="email" value="{{ old('email') }}" required>

<label for="password">Password</label>
<input id="password" type="password" name="password" required>

<label for="password-confirm">Confirm Password</label>
<input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>

<div class="card-footer">                        
<button type="submit" class="btn btn-primary">Register</button>
</div>
                            
</form>

</div>
</div>
                
@endsection
