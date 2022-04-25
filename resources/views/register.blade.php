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
        <section class="container-fluid regBack">
                <div class="row">
                    <div class="col-md-1"></div>
                  
                    <div class="col-md-4">
                        <form class="register-form" 
                              action="/Sign-up" 
                              method="POST">

                            @csrf

                            <h4 class="register-greeting mb-5">Welcome to register page</h4>
                            
                            <label for="name" class="mt-1 alert alert-danger">
                                {{ $errors->first('name') }}
                            </label>
                            <input type="text" 
                                name="name" 
                                id="name" 
                                class="form-control                                         " 
                                placeholder="Please write your name"
                            >

                            <label for="surname" class="mt-1 alert alert-danger">
                                {{ $errors->first('surname') }}
                            </label>
                            <input type="text" 
                                name="surname" 
                                id="surname" 
                                class="form-control                                         " 
                                placeholder="Please write your surname"
                            >
                            
                            <label for="email" class="mt-1 alert alert-danger">
                                {{ $errors->first('email') }}
                            </label>
                            <input type="email" 
                                name="email" 
                                class="form-control" 
                                placeholder="Please write your email"
                            >
                            
                            <label for="password" class="mt-1 alert alert-danger">
                                {{ $errors->first('password') }}
                            </label>
                            <input type="password" 
                                name="password" 
                                id="password" 
                                class="form-control" 
                                placeholder="Please write your password"
                            >	

                            <label for="repeat" class="mt-1 alert alert-danger">
                                {{ $errors->first('repeatpassword') }}
                            </label>
                            <input type="password" 
                                name="repeatpassword" 
                                id="repeat" 
                                class="form-control" 
                                placeholder="Please write your password again"
                            >

                            <label for="type"></label>
                            <select id="type" 
                                    class="form-select form-control" 
                                    name="usertype" 
                                    aria-label="Default select example">
                                {{-- <option selected>Choose user type</option> --}}
                                <option selected value="admin">Admin</option>
                                <option value="user">User</option>
                            </select>	
                            
                            <button type="submit" 
                                    class="form-control btn btn-primary">
                                Sign up
                            </button>

                            <p>
                                Already registered?
                                <a href="login">login here</a>
                            </p>
                        </form>	
                    </div>
                    
                    <div class="col-md-4">
                        @if ($errors->any())
                            <div class="mt-3 alert alert-danger">
                                <ul>
                                    <h5>full error list</h5>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    </div>

                    <div class="col-md-3"></div>
                </div>
        </section>
    </body>
</html>
