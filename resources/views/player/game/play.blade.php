@extends('player.auth.mainDashboard')
@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title mb-0"></h3>
        </div>
        <div class="card-body pt-4">
            <form action="{{ route('player.games.answer', ['game' => $game->id]) }}" method="POST">
                @csrf
                <div class="row mb-4">
                    <label class="col-md-3 form-label">{{$question->title}}</label>
                    <select name="option_id" class="form-control">
                        @foreach($question->options as $option)
                            <option value="{{$option->id}}">
                                {{$option->answer}}
                            </option>
                        @endforeach
                    </select>
                </div>
                <input type="hidden"  name="question_id" value="{{$question->id}}">
                <input type="hidden"  name="game_id" value="{{$game->id}}">
                <div class="card-footer">
                    <div class="row">
                        <div class="col-md-3"></div>
                        <div class="col-md-4">
                            <button class="btn btn-primary" type="submit">{{__('submit')}}</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
