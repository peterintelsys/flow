@extends('layouts.app')

@section('bread')

<div style="height: 80px;" class="card-header">

<ul class="breadcrumb">
  <li>Hem</li>
</ul>

</div>

@endsection

@section('content')

                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ $text }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
