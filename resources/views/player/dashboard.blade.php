Hello {{ auth('player')->user()->name }}

<br>


<a href="{{route('player.logout')}}">Logout</a>
