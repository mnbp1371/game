@extends('admin.auth.dashboard')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title mb-0">{{__('questions')}}</h3>
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
                                                                    <a class="active"
                                                                       href="{{route('admin.questions.show', ['question' => $question->id])}}">
                                                                        {{__('show')}}
                                                                    </a></h6>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <h3 class="card-title mb-0">
                {{__('update options')}}
            </h3>
        </div>
        <div class="card-body pt-4">
            @foreach($question->options as $option)
                <form action="{{ route('admin.options.update', ['option' => $option->id]) }}" method="POST">
                    @csrf
                    @method('put')
                    <div class="row mb-4">
                        <label class="col-md-3 form-label">{{__('answer')}}</label>
                        <div class="col-md-9">
                            <input class="form-control" type="text" name="answer" value="{{$option->answer}}"/>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <label class="col-md-3 form-label">{{__('is_correct')}}</label>
                        <div class="col-md-1">
                            <input class="form-control" type="checkbox"
                                   name="is_correct" {{$option->is_correct ? 'checked' : ''}}/>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-md-9">
                            <input type="hidden" name="question_id" value="{{$question->id}}"/>
                        </div>
                    </div>

                    <div class="row mb-4">
                        <label class="col-md-3 form-label"></label>
                        <div class="col-md-1">
                            <input class="btn btn-primary" type="submit"/>
                        </div>
                    </div>
                </form>
                <hr>
            @endforeach
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <h3 class="card-title mb-0">
                {{__('add_options')}}
            </h3>
        </div>
        <div class="card-body pt-4">
            <form action="{{ route('admin.options.store') }}" method="POST">
                @csrf
                <div class="row mb-4">
                    <label class="col-md-3 form-label">{{__('answer')}}</label>
                    <div class="col-md-9">
                        <input class="form-control" placeholder="{{__('answer')}}" type="text" name="answer"
                               value="{{old('answer')}}"/>
                    </div>
                </div>
                <div class="row mb-4">
                    <label class="col-md-3 form-label">{{__('is_correct')}}</label>
                    <div class="col-md-1">
                        <input class="form-control" placeholder="{{__('is_correct')}}" type="checkbox"
                               name="is_correct"/>
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col-md-9">
                        <input type="hidden" name="question_id" value="{{$question->id}}"/>
                    </div>
                </div>

                <div class="card-footer">
                    <!--Row-->
                    <div class="row">
                        <div class="col-md-3"></div>
                        <div class="col-md-4">
                            <button class="btn btn-primary" type="submit">{{__('create')}}</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection
