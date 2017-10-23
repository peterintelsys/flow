@extends('layouts.app')

@section('bread')

<div class="breadcrumb-wrap">

<ul class="breadcrumb">
  <li><a href="/home">Hem</a></li>
  <li><a href="{{ route('moduler') }}">Moduler</a></li>
  <li><a href="{{ route('manage.index') }}">Övrigt</a></li>
  <li>Användare</li>
</ul>

</div>

@endsection

@section('content')


<div class="card">

<div class="card-header">
<div class="card-title">Användare</div>
<div class="card-link"><a href="{{ route('users.create') }}">+</a></div>
</div>

<div class="card-rubrik">
Lista
</div>



<table class="table-small">

<thead>
    <tr>
      <th>Id</th>
      <th>Namn</th>
      <th>Email</th>
      <th>Behörigheter</th>
      <th>Status</th>
    </tr>
  </thead>

<tbody>

@foreach($users as $user)
    <tr>
      <td><a href="{{ route('users.show', ['user' => $user->id]) }}">{{ $user->id }}</a></td>
      <td><a href="{{ route('users.show', ['user' => $user->id]) }}">{{ $user->name }}</a></td>
      <td><a href="{{ route('users.show', ['user' => $user->id]) }}">{{ $user->email }}</a></td>
      <td>
      @foreach($user->roles as $role)
      <a href="{{ route('users.show', ['user' => $user->id]) }}">{{ $role->name }}</a>
      @endforeach
      </td>
      <td><a href="{{ route('users.show', ['user' => $user->id]) }}">@if($user->active)Aktiv @else Ej aktiv @endif</a></td>
    </tr>
@endforeach
    
  </tbody>

</table>

<div class="card-footer">
</div>

</div>



@endsection