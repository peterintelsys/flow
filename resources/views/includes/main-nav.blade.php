<div class="nav-wrap">

<div class="flex-row space-between">
        
<div>
<a class="nav-title" href="">Flow</a>
</div>
        
<div class="dropdown">
<a class="nav-title" onclick="showDrop(this)" href="javascript:void(0)" data-target="navdown">&#9776;</a>

<div id="navdown" class="dropdown-content">
@if (Auth::guest())
                
                    
<a href="{{ route('login') }}">Login</a>
<a href="{{ route('register') }}">Register</a>
@else
<a href="/moduler">Moduler</a>
<a href="{{ route('register') }}">{{ Auth::user()->name }}</a>
<a href="{{ route('logout') }}" onclick="event.preventDefault();
document.getElementById('logout-form').submit();">Logout</a>
<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
{{ csrf_field() }} </form>
               
@endif
</div>

</div>

</div>

</div>