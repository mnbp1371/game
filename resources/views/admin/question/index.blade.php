@extends('admin.auth.dashboard')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title mb-0"></h3>
        </div>
        <div class="card-body pt-4">
            <div class="grid-margin">
                <div class="">
                    <div class="panel panel-primary">
                        <div class="tab-menu-heading border-0 p-0">
                            <div class="panel-body tabs-menu-body border-0 pt-0">
                                <div class="tab-content">
                                    <div class="tab-pane active" id="tab5">
                                        <div class="table-responsive">
                                            <table class="table table-bordered text-nowrap mb-0"
                                                   id="data-table">
                                                <thead class="border-top">
                                                <tr>
                                                    <th class="bg-transparent border-bottom-0">
                                                        {{__('id')}}
                                                    </th>
                                                    <th class="bg-transparent border-bottom-0">
                                                        {{__('title')}}
                                                    </th>
                                                    <th class="bg-transparent border-bottom-0">
                                                        {{__('point')}}
                                                    </th>
                                                    <th class="bg-transparent border-bottom-0">
                                                        {{__('operations')}}
                                                    </th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($questions as $question)
                                                    <tr class="border-bottom">
                                                        <td>
                                                            <div class="d-flex">
                                                                <div
                                                                    class="ms-3 mt-0 mt-sm-2 d-block">
                                                                    <h6 class="mb-0 fs-14 fw-semibold">
                                                                        {{$question->id}}
                                                                    </h6>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="d-flex">
                                                                <div
                                                                    class="mt-0 mt-sm-3 d-block">
                                                                    <h6 class="mb-0 fs-14 fw-semibold">
                                                                        {{$question->title}}
                                                                    </h6>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="d-flex">
                                                                <div
                                                                    class="mt-0 mt-sm-3 d-block">
                                                                    <h6 class="mb-0 fs-14 fw-semibold">
                                                                        {{$question->point}}
                                                                    </h6>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="d-flex">
                                                                <div
                                                                    class="mt-0 mt-sm-3 d-block">
                                                                    <h6 class="mb-0 fs-14 fw-semibold">
                                                                        <a class="active" href="{{route('admin.questions.show', ['question' => $question->id])}}">
                                                                            {{__('show')}}
                                                                        </a>
                                                                         /
                                                                        <a class="active" href="{{route('admin.questions.edit', ['question' => $question->id])}}">
                                                                            {{__('edit')}}
                                                                        </a>
                                                                        /
                                                                        <a class="active"
                                                                           href="javascript:document.getElementById('delete_question').submit();"
                                                                           href="{{route('admin.questions.destroy', ['question' => $question->id])}}">
                                                                            {{__('delete')}}
                                                                        </a>                                                                    </h6>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <form action="{{ route('admin.questions.destroy', ['question' => $question->id]) }}" method="post" id="delete_question">
                                                        @csrf
                                                        @method('delete')

                                                    </form>
                                                @endforeach
                                                </tbody>
                                            </table>
                                            {{ $questions->links() }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
