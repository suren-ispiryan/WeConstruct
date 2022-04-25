<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>WeConstruct</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" 
            rel="stylesheet">
        <!-- css cdn -->
        <link href="{{ asset('css/app.css') }}" 
            rel="stylesheet" 
            type="text/css" >    
        <!-- bootstrap cdnfor css -->
        <link rel="stylesheet" 
            href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" 
            integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" 
            crossorigin="anonymous">
        <!-- bootstrap cdn for js -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" 
            integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" 
            crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" 
            integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" 
            crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" 
            integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
            crossorigin="anonymous"></script>
    </head>
    <body>
        <section class="container-fluid logBack">
                <div class="row">
                    <div class="col-md-1"></div>
                        
                    <div class="col-md-4">
                        <form class="login-form" 
                            action="/Sign-in" 
                            method="POST">
                            
                            @csrf
                            
                            <h4 class="login-greeting mb-5">Welcome to login page</h4>
                            
                            @if(session('linkSent') !== NULL)
                                <h5 class="text-success logMsg">{{ session('linkSent') }}</h5>
                            @endif

                            <input type="email" 
                                name="email" 
                                class="form-control" 
                                placeholder="Please write your email"
                            >
                            <input type="password" 
                                name="password" 
                                class="form-control" 
                                placeholder="Please write your password"
                            >		
                            
                            @isset($errLogin)
                                <p class="text-danger logMsg">{{ $errLogin }}</p>
                            @endisset

                            <button type="submit" 
                                    class="form-control btn btn-primary">
                                Sign in
                            </button>

                            <p>
                                Not registered yet?
                                <a href="/register">register here</a>
                            </p>
                        </form>
                        
                    </div>

                    <div class="col-md-7"></div>
                </div>
        </section>
    </body>
</html>
