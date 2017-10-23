@extends('layouts.app')

@section('bread')

<div class="breadcrumb-wrap">

<ul class="breadcrumb">
  <li><a href="/home">Hem</a></li>
  <li><a href="{{ route('moduler') }}">Moduler</a></li>
  <li><a href="{{ route('manage.index') }}">Övrigt</a></li>
  <li>Mitt företag</li>
</ul>

</div>

@endsection

@section('content')

<div class="test-row">
<div class="test-column _2">

<div class="card">

<div class="card-header space-between-small">
<div class="card-title flex-order-2">{{ $client->name }}</div>
<div class="dropdown flex-order-1">
<a class="nav-title" onclick="showDrop(this)" href="javascript:void(0)" data-target="card-dropdown">&#9776;</a>

<div id="card-dropdown" class="dropdown-content drop-right">              
<a href="#">Status: Aktiv...</a>
<a href="{{ route('clients.edit') }}">Redigera post...</a>
</div>

</div>
</div>

<div class="card-content">
<div class="card-rubrik">
Detaljer
</div>


<div class="card-text">
<div class="flex-row">
<div class="flex-item">
Org.nr: {{ $client->orgnbr }}
</div>
<div class="flex-item">
Tel: {{ $client->phone }}
</div>
<div class="flex-item">
Mob: {{ $client->mobile }}
</div>
<div class="flex-item">
Email: <a href="#">{{ $client->email }}</a>
</div>
<div class="flex-item">
Web: <a href="#">{{ $client->web }}</a>
</div>
<div class="flex-item">
Bankgiro: {{ $client->bankgiro }}
</div>
<div class="flex-item">
Postgiro: {{ $client->postgiro }}
</div>

</div>
</div>


<div class="card-rubrik">
Adresser
</div>

<div class="card-text">
<div class="flex-row">
@foreach($client->adresses as $adress)
<div class="flex-item">
<div class="adress"><a href="{{ route('clientadress.show', ['adress' => $adress->id]) }}">
{{ $adress->adresstype->name }}<br>
{{ $adress->line_1 }}@if(is_null($adress->line_2)) @else<br>{{ $adress->line_2 }} @endif<br>
{{ $adress->code }} {{ $adress->city }}<br>
{{ $adress->country }}
</a>
</div>
</div>
@endforeach


</div>

<div class="card-plus">
<a style="font-size: 28px;" href="{{ route('clientadress.create') }}">+</a>
</div>

</div>

<div class="card-rubrik">
Info
</div>

<div class="card-text">
{{ $client->info }}
</div>

</div>

<div class="card-footer">
</div>

</div>

</div>
<div class="test-column _1">

</div>

</div>



@endsection