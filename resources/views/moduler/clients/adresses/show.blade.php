@extends('layouts.app')

@section('bread')

<div style="height: 80px;" class="card-header">

<ul class="breadcrumb">
  <li><a href="/home">Hem</a></li>
  <li><a href="{{ route('moduler') }}">Moduler</a></li>
  <li><a href="{{ route('clients.index') }}">Mitt företag</a></li>
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
{{ $adress->line_1 }}
</div>
<div class="card-title">
<a href="{{ route('clients.index') }}">&#x2613;</a>
</div>
</div>


<div class="card-rubrik">
Karta
</div>

<div style="height: 100px;" class="card-text">
Här kommer en karta
</div>

<div class="card-rubrik">
Detaljer
</div>

<div class="card-text">
{{ $adress->adresstype->name }}<br>
{{ $adress->line_1 }}@if(is_null($adress->line_2)) @else<br>{{ $adress->line_2 }} @endif<br>
{{ $adress->code }} {{ $adress->city }}<br>
{{ $adress->country }}
</div>

<div class="card-footer">
<a class="button" href="{{ route('clientadress.edit', ['adress' => $adress->id]) }}">Ändra</a>
</div>


</div>
</div>
</div>




@endsection