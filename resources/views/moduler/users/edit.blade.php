@extends('layouts.app')

@section('bread')

<div style="height: 80px;" class="card-header">

<ul class="breadcrumb">
  <li><a href="/home">Hem</a></li>
  <li><a href="{{ route('moduler') }}">Moduler</a></li>
  <li><a href="{{ route('users.index') }}">Användare</a></li>
  <li>Skapa användare</li>
</ul>

</div>

@endsection

@section('content')

<div class="modal">
<div class="modal-content">

<div class="card">
<div class="card-header space-between">
<div class="card-title">
Ändra användare: {{ $user->name }}
</div>
<div class="card-title">
<a href="{{ route('users.show', ['user' => $user->id]) }}">&#x2613;</a>
</div>
</div>

@if ($errors->any())
    <div class="alert">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form method="POST" action="{{ route('users.update', ['user' => $user->id]) }}">
{{ method_field('PUT') }} {{ csrf_field() }}

<div>
@foreach ($roles as $role)

<input type="checkbox" id="confirmField" name="newrole[]" value="{{ $role->name }}"
 @if ($user->roles->contains('name', $role->name)) checked @endif>
<label style="padding-right: 20px;" class="label-inline" for="confirmField">{{ $role->name }}</label>


@endforeach
</div>
@foreach ($modules as $module)

<input type="checkbox" id="confirmField" name="newrole[]" value="{{ $module->name }}"
 @if ($user->roles->contains('name', $module->name)) checked @endif>
<label style="padding-right: 20px;" class="label-inline" for="confirmField">{{ $module->name }}</label>


@endforeach

  <label for="name">Namn</label>
<input id="name" type="text" name="name" value="{{ $user->name }}">



<label for="email">Email</label>
<input id="email" type="email" name="email" value="{{ $user->email }}">

<label for="password">Lösenord</label>
<input id="password" type="password" name="password" value="{{ $user->password }}">

<label for="confirmation">Upprepa lösenord</label>
<input id="confirmation" type="password" name="password_confirmation" value="{{ $user->password }}">

<input type="checkbox" id="confirmField" name="aktiv" value="@if($user->active) 1 @else 0 @endif"
 @if ($user->active) checked @endif>
<label style="padding-right: 20px;" class="label-inline" for="confirmField">@if ($user->active) Aktiv @else Ej aktiv @endif</label>

<div class="card-footer">
<button type="submit">Spara</button>
</div>


</form>


</div>


</div>
</div>




@endsection