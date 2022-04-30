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
                <div class="col-md-8">
                    Welcome {{ Auth::user()->name }}
                </div>

                <div class="col-md-2">
                    <form action="/sold-products" method="GET">
                        <button class="btn btn-primary">Sold products</button>
                    </form>
                </div>

                <div class="col-md-2">
                    <form action="/log-out" method="GET">
                        <button class="btn btn-danger">log out</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="container-fluid mt-2">
            <div class="row">
                <div class="col-md-12 create-admin-btn">
                    <form action="/admin-show-create" method="GET">
                        <button class="btn btn-primary">Create a product</button>
                    </form>
                </div>
            </div>
        </div>


        {{-- show products --}}
        <div class="container-fluid mt-5">
            <div class="row">
                <div class="col-md-12">                
                    @foreach ($products as $product)
                        <div class="row mt-2">
                            <div class="col-md-1 columns">
                                <img src="@if($product->image != 'default-product-image.png') 
                                            {{ URL::asset('/assets/productImages/'.$product->image) }} 
                                          @else 
                                            {{ URL::asset('/assets/defaultProductImage/'.$product->image) }}
                                          @endif"
                                    class="img-fluid">
                            </div>

                            <div class="col-md-1 columns">
                                {{ $product->name }}
                            </div>
        
                            <div class="col-md-3 columns">
                                {{ $product->description }}
                            </div>
                                    
                            <div class="col-md-1 columns">
                                {{ $product->brand }}
                            </div> 	
        
                            <div class="col-md-1 columns">
                                {{ $product->category }}
                            </div> 
                            
                            <div class="col-md-2 columns">
                                @foreach (json_decode($product->color) as $color)
                                    {{ $color }}                                
                                @endforeach
                            </div> 

                            <div class="col-md-1 columns">
                                @foreach (json_decode($product->size) as $size)
                                    {{ $size }}                                
                                @endforeach
                            </div> 

                            <div class="col-md-1 columns">
                                {{ $product->price }}
                            </div> 

                            <div class="col-md-1 columns">
                                <div class="row">
                                    <div class="col-md-12">
                                        <a href= {{ url("/show-update/".$product->id) }}>
                                            <button class="btn btn-warning m-1 update">Change</button>
                                        </a>
                                    </div>
                                    
                                    <div class="col-md-12">
                                    <a href= {{ url("/show-delete/".$product->id) }}>
                                        <button class="btn btn-danger m-1 delete">Delete</button>
                                    </a>
                                </div>
                            </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>


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
       </div>
    </body>
</html>
