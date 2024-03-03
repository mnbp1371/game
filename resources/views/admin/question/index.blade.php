<a href="{{route('admin.questions.create')}}">Create Question</a>
<hr>
@foreach($questions as $question)
    id: {{$question->id}}
    <br>
    title: {{$question->title}}
    <br>
    point: {{$question->point}}
    <br>
    created_at: {{$question->point}}
    <br>
    updated_at: {{$question->point}}
    <br>
    <a href="{{route('admin.questions.edit', ['question' => $question->id])}}">
        edit
    </a>
    <hr>
@endforeach

{{$questions->links()}}
