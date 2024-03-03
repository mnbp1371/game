Hello {{ auth('admin')->user()->name }}

<br>


<a href="{{route('admin.logout')}}">Logout</a>
