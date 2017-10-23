@extends('layouts.app')

@section('bread')

<div style="height: 80px;" class="card-header">

<ul class="breadcrumb">
  <li><a href="/home">Hem</a></li>
  <li><a href="{{ route('moduler') }}">Moduler</a></li>
  <li><a href="{{ route('users.index') }}">Mitt företag</a></li>
  <li>Redigera</li>
</ul>

</div>

@endsection

@section('content')

<div class="modal">
<div class="modal-content">

<div class="card">
<div class="card-header space-between">
<div class="card-title">
Ändra: {{ $client->name }}
</div>
<div class="card-title">
<a href="{{ route('clients.index') }}">&#x2613;</a>
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

<form method="POST" action="{{ route('clients.update') }}">
 {{ csrf_field() }}

<div class="input-inline responsive">
<div class="input-inline-item responsive">
  <label for="name">Namn</label>
<input id="name" type="text" name="name" value="{{ $client->name }}">
</div>
<div class="input-inline-item responsive">
  
<label for="orgnbr">Org.nr</label>
<input id="orgnbr" type="text" name="orgnbr" value="{{ $client->orgnbr }}">

</div>
</div>

<div class="input-inline responsive">
<div class="input-inline-item responsive">
  <label for="phone">Telefon</label>
<input id="phone" type="text" name="phone" value="{{ $client->phone }}">
</div>
<div class="input-inline-item responsive">
  
<label for="mobile">Mobil</label>
<input id="mobile" type="text" name="mobile" value="{{ $client->mobile }}">

</div>
</div>

<div class="input-inline responsive">
<div class="input-inline-item responsive">
  <label for="email">Email</label>
<input id="email" type="email" name="email" value="{{ $client->email }}">
</div>
<div class="input-inline-item responsive">
  
<label for="web">Web</label>
<input id="web" type="text" name="web" value="{{ $client->web }}">

</div>
</div>

<div class="input-inline responsive">
<div class="input-inline-item responsive">
  <label for="bankgiro">Bankgiro</label>
<input id="bankgiro" type="text" name="bankgiro" value="{{ $client->bankgiro }}">
</div>
<div class="input-inline-item responsive">
  
<label for="postgiro">Postgiro</label>
<input id="postgiro" type="text" name="postgiro" value="{{ $client->postgiro }}">

</div>
</div>

<label for="info">Comment</label>
<textarea id="commentField" name="info">{{ $client->info }}</textarea>



<div class="card-footer">
<button type="submit">Spara</button>
</div>


</form>


</div>


</div>
</div>




@endsection