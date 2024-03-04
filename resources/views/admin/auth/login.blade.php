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
            <h2 class="py-5">{{__('admin_login_page')}}</h2>
            @if (! empty($errors))
                @include('error')
            @endif
            <form action="{{ route('admin.login') }}" method="post">
                @csrf
                <div class="mb-3">
                    <label class="form-label">{{__('email')}}</label>
                    <input type="tel" class="form-control" name="email" value="{{old('email')}}">
                </div>
                <div class="mb-3">
                    <label class="form-label">{{__('password')}}</label>
                    <input type="password" class="form-control" name="{{__('password')}}">
                </div>
                <input type="submit" class="btn btn-primary" value="{{__('login')}}">
            </form>
        </div>
    </div>
</div>

</body>
</html>
