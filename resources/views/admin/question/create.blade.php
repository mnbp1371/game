@extends('admin.auth.dashboard')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title mb-0"></h3>
        </div>
        <div class="card-body pt-4">
            <form action="{{ route('admin.questions.store') }}" method="POST">
                @csrf

                <div class="row mb-4">
                    <label class="col-md-3 form-label">{{__('title')}}</label>
                    <div class="col-md-9">
                        <input class="form-control" placeholder="{{__('title')}}" type="text" name="title" value="{{old('title')}}"/>
                    </div>
                </div>
                <div class="row mb-4">
                    <label class="col-md-3 form-label">{{__('point')}}</label>
                    <div class="col-md-9">
                        <input class="form-control" placeholder="{{__('point')}} " type="number" name="point" value="{{old('point')}}"/>
                    </div>
                </div>

                <div class="card-footer">
                    <!--Row-->
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
