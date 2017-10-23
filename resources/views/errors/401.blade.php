@extends('layouts.app')

@section('bread')

<div style="height: 80px;" class="card-header">

<ul class="breadcrumb">
  <li><a href="/home">Hem</a></li>
  
</ul>

</div>

@endsection

@section('content')

<div class="modal">
<div class="modal-content">

<div style="padding:20px;" class="card">

<h2>{{ $exception->getMessage() }}</h2>

<h5>Kontakta din närmaste chef om du vill ha behörighet för denna funktion</h5>

<div style="padding:40px 20px;" class=""><a href="{{ route('home') }}">&#x25C4; Tillbaka</a></div>

</div>


</div>
</div>




@endsection