<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{__('register')}}</title>
    <link href="/assets/plugins/bootstrap/css/bootstrap.min.css" id="style" rel="stylesheet"/>
</head>
<body>

<div class="container">
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <h2 class="py-5">{{__('admin_register_page')}}</h2>
            @if (! empty($errors))
                @include('error')
            @endif
            @if(Session::has('error-message'))
                <p class="alert alert-info">{{ Session::get('error-message') }}</p>
            @endif
            <form action="{{ route('player.register') }}" method="post">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Name</label>
                    <input type="tel" class="form-control" name="name" placeholder="Enter your name" value="{{old('name')}}">
                </div>
                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="tel" class="form-control" name="email" placeholder="Enter your email" value="{{old('email')}}">
                </div>
                <div class="mb-3">
                    <label class="form-label">Password</label>
                    <input type="password" class="form-control" name="password" placeholder="Enter Password">
                </div>
                <input type="submit" class="btn btn-primary" value="{{__('register')}}">
                <a class="btn btn-primary" href="{{route('player.login')}}">{{__('login_page')}}</a>
            </form>
        </div>
    </div>
</div>
</body>
</html>
