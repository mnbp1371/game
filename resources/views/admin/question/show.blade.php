
@if (! empty($errors) && $errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    <hr>
@endif

id: {{$question->id}}
<br>
title: {{$question->title}}
<br>
point: {{$question->point}}
<br>
created_at: {{$question->point}}
<br>
updated_at: {{$question->point}}
<hr>

<form action="{{route('admin.options.store')}}" method="post">
    @csrf
    answer:
    <br>
    <input type="text" name="answer" value="{{old('answer')}}">
    <br>
    is_correct
    <br>
    <input type="checkbox" name="is_correct">
    <br>
    <input type="hidden" name="question_id" value="{{$question->id}}">
    <br>
    <input type="submit" value="submit">
</form>

<hr>
@foreach($question->options as $option)
    show:
    <br>
    id: {{$option->id}}
    <br>
    answer: {{$option->answer}}
    <br>
    is_correct: {{$option->is_correct ? 1 : 0}}
    <br>
    created_at: {{$option->created_at}}
    <br>
    updated_at: {{$option->updated_at}}
    <br>
    <br>

    update
    <br>
    <form action="{{route('admin.options.update', ['option' => $option->id])}}" method="post">
        @csrf
        @method('put')
        answer:
        <br>
        <input type="text" name="answer" value="{{old('answer', $option->answer)}}">
        <br>
        is_correct
        <br>
        <input type="checkbox" name="is_correct" {{$option->is_correct ? 'checked' : ''}}>
        <br>
        <input type="submit" value="submit">
    </form>
    <hr>
@endforeach
