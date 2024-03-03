Hello {{ auth('player')->user()->name }}

<br>
<a href="{{route('player.logout')}}">Logout</a>
<hr>
Create Game:
<br>
<form action="{{route('player.games.store')}}" method="post">
    @csrf
    <input type="submit" value="submit">
</form>

<hr>
@foreach($games as $game)
    id: {{$game->id}}
    <br>
    title: {{$game->title}}
    <br>
    status: {{$game->status}}
    <br>
    point: {{$game->point}}
    <br>
    created_at: {{$game->created_at}}
    <br>
    updated_at: {{$game->updated_at}}
    <br>
    <form action="{{route('player.games.play', ['id' => $game->id])}}" method="get">
        <input type="submit" value="play">
    </form>
    <hr>
@endforeach
