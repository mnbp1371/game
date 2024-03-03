@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif

<form action="{{ route('player.games.answer', ['game' => $game->id]) }}" method="post">
    @csrf
    ask: {{$question->title}}
    <br>
    <select name="option_id">
        @foreach($question->options as $option)
            <option value="{{$option->id}}">
                {{$option->answer}}
            </option>
        @endforeach
    </select>
    <br>
    <input type="hidden"  name="question_id" value="{{$question->id}}">
    <input type="hidden"  name="game_id" value="{{$game->id}}">

    <input type="submit" value="submit">
</form>
