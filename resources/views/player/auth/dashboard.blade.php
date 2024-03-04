@extends('player.auth.mainDashboard')
@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title mb-0">{{__('game')}}</h3>
        </div>
        <div class="card-body pt-4">
            <div class="grid-margin">
                <div class="">
                    <div class="panel panel-primary">
                        <div class="tab-menu-heading border-0 p-0">
                            <div class="tabs-menu1">
                                <ul class="nav panel-tabs product-sale">
                                    <li>
                                        <a class="active" href="javascript:document.getElementById('create_new_game').submit();">
                                            {{__('new_game')}}
                                        </a>
                                    </li>
                                </ul>
                            </div>
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
                                                        {{__('status')}}
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
                                                @foreach($games as $game)
                                                    <tr class="border-bottom">
                                                        <td>
                                                            <div class="d-flex">
                                                                <div
                                                                    class="ms-3 mt-0 mt-sm-2 d-block">
                                                                    <h6 class="mb-0 fs-14 fw-semibold">
                                                                        {{$game->id}}
                                                                    </h6>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="d-flex">
                                                                <div
                                                                    class="mt-0 mt-sm-3 d-block">
                                                                    <h6 class="mb-0 fs-14 fw-semibold">
                                                                        {{$game->title}}
                                                                    </h6>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="d-flex">
                                                                <div
                                                                    class="mt-0 mt-sm-3 d-block">
                                                                    <h6 class="mb-0 fs-14 fw-semibold">
                                                                        {{$game->status}}
                                                                    </h6>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="d-flex">
                                                                <div
                                                                    class="mt-0 mt-sm-3 d-block">
                                                                    <h6 class="mb-0 fs-14 fw-semibold">
                                                                        {{$game->point}}
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
                                                                           href="{{route('player.games.play', ['game' => $game->id])}}">
                                                                            {{__('play')}}
                                                                        </a></h6>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endforeach
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
        <div class="card-footer">
        </div>
        <form action="{{ route('player.games.store') }}" method="POST" id="create_new_game">
            @csrf
        </form>
@endsection
