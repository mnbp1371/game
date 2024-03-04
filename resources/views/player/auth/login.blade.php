<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{__('login')}}</title>
    <link href="/assets/plugins/bootstrap/css/bootstrap.min.css" id="style" rel="stylesheet"/>
</head>
<body>

<div class="container">
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <h2 class="py-5">{{__('player_login_page')}}</h2>
            @if (! empty($errors))
                @include('error')
            @endif
            <form action="{{ route('player.login') }}" method="post">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="tel" class="form-control" name="email" placeholder="Enter Your email" value="{{old('email')}}">
                </div>
                <div class="mb-3">
                    <label class="form-label">Password</label>
                    <input type="password" class="form-control" name="password" placeholder="Enter Password">
                </div>
                <input type="submit" class="btn btn-primary" value="{{__('login')}}">
                <a class="btn btn-primary" href="{{route('player.register')}}">{{__('register_page')}}</a>
            </form>
        </div>
    </div>
</div>
</body>
</html>
