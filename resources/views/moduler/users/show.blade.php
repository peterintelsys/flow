@extends('layouts.app')

@section('bread')

<div class="breadcrumb-wrap">

<ul class="breadcrumb">
  <li><a href="/home">Hem</a></li>
  <li><a href="{{ route('moduler') }}">Moduler</a></li>
  <li><a href="{{ route('users.index') }}">Användare</a></li>
  <li>{{ $user->name }}</li>
</ul>

</div>

@endsection

@section('content')

<div class="test-row">
<div class="test-column _2">

<div class="card">

<div class="card-header space-between-small">
<div class="card-title flex-order-2">{{ $user->name }}</div>
<div class="dropdown flex-order-1">
<a class="nav-title" onclick="showDrop(this)" href="javascript:void(0)" data-target="card-dropdown">&#9776;</a>

<div id="card-dropdown" class="dropdown-content drop-right">              
<a href="#">Status: Aktiv...</a>
<a href="{{ route('users.edit', ['user' => $user->id]) }}">Redigera post...</a>
</div>

</div>
</div>

<div class="card-content">
<div class="card-rubrik">
Detaljer
</div>


<div class="card-text">
<div style="margin-bottom: 12px;">Status: @if($user->active) Aktiv @else <span style="background-color: #E6B0AA; padding:4px 12px;">Ej aktiv </span>@endif</div>
<div class="flex-row">
<div class="flex-item">
Namn: {{ $user->name }}
</div>
<div class="flex-item">
Email: {{ $user->email }}
</div>
<div class="flex-item">
@foreach($user->roles as $role)
Roll: {{ $role->name }}<br>
@endforeach
</div>

</div>
</div>



</div>


</div>

</div>
<div class="test-column _1">

</div>

</div>



@endsection