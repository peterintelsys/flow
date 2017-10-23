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
Skapa adress
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

<form method="POST" action="{{ route('clientadress.store') }}">
{{ csrf_field() }} 


<label for="ageRangeField">Adresstyp</label>
    <select class="select-type" id="ageRangeField" name="type">
      <option value="9">Välj Adresstyp...</option>
      @foreach ($types as $type)
      <option value="{{ $type->id }}">{{ $type->name }}</option>
      @endforeach
    </select>

<label for="street">Gata</label>
<input id="street" type="text" name="street" value="{{ old('street') }}">

<label for="extra">Extra rad</label>
<input id="extra" type="text" name="extra" value="{{ old('extra') }}">

<div class="input-inline responsive">
<div class="input-inline-item responsive">
  <label for="code">Postkod</label>
<input id="code" type="text" name="code" value="{{ old('code') }}">

</div>
<div class="input-inline-item responsive">
  
<label for="city">Stad</label>
<input id="city" type="text" name="city" value="{{ old('city') }}">

</div>
</div>

<label for="country">Land</label>
<input id="country" type="text" name="country" value="{{ old('country') }}">


<div class="card-footer">
<button type="submit">Spara</button>
</div>


</form>


</div>


</div>
</div>




@endsection