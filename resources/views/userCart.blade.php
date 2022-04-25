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
        <div class="container-fluid mt-2">
            <div class="row">
                <div class="col-md-6">
                    Welcome {{ Auth::user()->name }}
                </div>

                <div class="col-md-5">
                    <a href= {{ url("/user-dashboard") }}>
                        <button class="btn btn-warning">Dashboard</button>
                    </a>
                </div>

                <div class="col-md-1">
                    <form action="/log-out" method="GET">
                        <button class="btn btn-danger">log out</button>
                    </form>
                </div>
            </div>
        </div>


        {{-- search --}}
        <section class="container">
            <div class="row mt-5">
                <div class="col-md-12">
                    <form class="search" action="/user-search-product" method="POST">
                        @csrf
                        
                        <div class="row">
                            <div class="col-md-11">						
                                <input class="form-control" 
                                    type="text" 
                                    name="search" 
                                    placeholder="Search for product">
                            </div>

                            <div class="col-md-1 search-btn">
                                <button class="btn btn-success">Search</button>
                            </div>
                        </div>
                    
                    </form>
                </div>	
            </div>
        </section>


{{-- products list --}}
        <section class="container mt-5">
            <div class="row products-row">
                @foreach ($products as $product)
                    <div class="col-md-3 m-2 products-items">
                        <div class="row pic">
                            <div class="col-md-12 pic-col">
                                <img src="@if($product->image != 'default-product-image.png') 
                                            {{ URL::asset('/assets/productImages/'.$product->image) }} 
                                          @else 
                                            {{ URL::asset('/assets/defaultProductImage/'.$product->image) }}
                                          @endif"
                                    class="img-fluid">
                            </div>
                        </div>

                        <div class="row name">
                            <div class="col-md-12">
                                {{ $product->name }}
                            </div>
                        </div>

                        <div class="row desc">
                            <div class="col-md-12">
                                <span class="headings">Description:</span> {{ $product->description }}
                            </div>
                        </div>

                        <div class="row price">
                            <div class="col-md-12 price-call">
                                <span class="headings">Price:</span> {{ $product->price }}$
                            </div>
                        </div>

                        <div class="add-to-cart">
                            <form action="/remove-from-cart/{{ $product->name }}" method="GET">
                                <button class="btn btn-primary add-to-cart-btn">Remove</button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>

            
    {{-- pagination --}}
            <div class="row mt-3">
                <div class="col-md-12 pagination">
                    <a href= {{ $products->previousPageUrl() }}>
                        <button class="btn btn-success m-1 delete">Previous</button>
                    </a>
                    
                    <a href= {{ $products->nextPageUrl() }}>
                        <button class="btn btn-success m-1 delete">Next</button>
                    </a>
                </div>
            </div>

            <div class="row mt-1 mb-4">
                <div class="col-md-12 pagination">
                    <p class="pages">
                        page {{ $products->currentPage() }}
                        -> {{ $products->perPage() }}
                        items out of {{ $products->total() }}
                    </p>
                </div>
           </div>z
        </section>
        


    </body>
</html>
