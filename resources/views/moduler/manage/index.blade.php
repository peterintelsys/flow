@extends('layouts.app')

@section('bread')

<div class="breadcrumb-wrap">

<ul class="breadcrumb">
  <li><a href="/home">Hem</a></li>
  <li><a href="{{ route('moduler') }}">Moduler</a></li>
  <li>Övrigt</li>
</ul>

</div>

@endsection

@section('content')



<div class="flex-row">

@foreach($modules as $module)

<div class="flex-item card-item">


<div class="card-module">

<a style="height:90px; background-color: #1A5276; color:white;" class="card-row" href="{{ $module[1] }}">
<div>
{{ $module[0] }}
</div>
</a>


<div style="height:110px; font-size: 12px;" class="card-row">
<a href="{{ $module[1] }}">
{{ $module[0] }}
</a>
<a href="{{ $module[1] }}">
{{ $module[0] }}
</a>
<a href="{{ $module[1] }}">
{{ $module[0] }}
</a>
</div>

</div>


</div>

@endforeach


</div>




@endsection