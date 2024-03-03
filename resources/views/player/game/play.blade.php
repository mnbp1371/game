<form action="{{ route('player.games.play.post', ['id' => $question->id]) }}" method="post">
    @csrf
    ask: {{$question->title}}
    <br>
    <select name="answer">
        @foreach($options as $option)
            <option value="{{$option->id}}">
                {{$option->answer}}
            </option>
        @endforeach
    </select>
    <br>
    <input type="hidden"  name="game_id" value="{{$gameId}}">

    <input type="submit" value="submit">
</form>
