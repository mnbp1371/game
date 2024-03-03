Hello {{ auth('admin')->user()->name }}, You Are admin
<hr>


<a href="{{route('admin.logout')}}">Logout</a>
<br>
<a href="{{route('admin.questions.index')}}">Questions</a>
