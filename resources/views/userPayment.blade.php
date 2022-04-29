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
        <section class="container-fluid mt-2">
            <div class="row">
                <div class="col-md-8">
                    Welcome {{ Auth::user()->name }}
                </div>
    
                <div class="col-md-3 center-btns">
                    <a href= {{ url("/user-dashboard") }}>
                        <button class="btn btn-warning">Dashboard</button>
                    </a>
    
                    <a href= {{ url("/cart") }}>
                        <button class="btn btn-warning pl-4 pr-4">Cart</button>
                    </a>
                </div>

                <div class="col-md-1">
                    <form action="/log-out" method="GET">
                        <button class="btn btn-danger">log out</button>
                    </form>
                </div>
            </div>
        </section>

        {{-- Payment details --}}

        <section class="container-fluid mt-5">
            <div class="container">
                <div class="row">
                    
                    <form class="col-md-12" action="/buy-products" method="POST">
                        @csrf
                        
                        <div class="row">
                            <div class="col-md-5 register-form">
                                <h3 class="payment-details">user details</h3>
            {{-- User details --}}
                                <input readonly
                                       class="form-control mt-4" 
                                       value="{{ auth()->user()->name }}" 
                                       name="name">

                                <input readonly
                                        class="form-control mt-4" 
                                        value="{{ auth()->user()->surname }}" 
                                        name="surname">

                                <input readonly
                                        class="form-control mt-4 mb-4" 
                                        value="{{ auth()->user()->email }}" 
                                        name="email">
            
            {{-- adress details --}}
                                <select id="country" 
                                        class="form-select form-control mt-4" 
                                        name="country" 
                                        aria-label="Default select example">
                                    <option selected value="armenia">Armenia</option>
                                    <option value="america">America</option>
                                    <option value="america">America</option>
                                    <option value="russia">Russia</option>
                                    <option value="england">England</option>
                                    <option value="germany">Germany</option>
                                    <option value="france">France</option>
                                    <option value="china">China</option>
                                </select>

                                <input type="text" 
                                       class="form-control mt-4 mb-4" 
                                       name="house"
                                       placeholder="Write your house number">

                                <input type="text" 
                                       class=" form-control mt-4 mb-4" 
                                       name="appartement"
                                       placeholder="Write your appartement number">

                                <input type="number"
                                       class="mt-4 mb-4  form-control" 
                                       name="zip"
                                       placeholder="Write your zip code">
                            </div>
                            
                            <div class="col-md-2"></div>

                            <div class="col-md-5 register-form">
                                <h3 class="payment-details">cart details</h3>
            
            {{-- cart details --}}
                                <input type="number"
                                       class="mb-4 form-control"
                                       name="cartNumber"
                                       placeholder="Write your cart number">

                                <input type="number" 
                                       class="mb-4 form-control"
                                       name="expireMonth"
                                       placeholder="MM">

                                <input type="number"
                                      class="mb-4 form-control"
                                       name="expireYear"
                                       placeholder="YYYY">

                                <input type="password"
                                       class="mb-4 form-control" 
                                       name="cvc"
                                       placeholder="CVC">
                                
                                <input readonly
                                       type="hidden"
                                       class="form-scontrol mt-4 mb-4 form-control" 
                                       value="{{ $totalPrice }}"
                                       name="totalPrice">
                                
                                <p>Total price: {{ $totalPrice }}$</p>        
                               <button class="btn btn-success form-control mb-5">Buy</button>
                            </div>
                        </div>
                    </form>
                    
                </div>
            </div>
        </section>
    </body>
</html>
