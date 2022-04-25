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
        {{-- axios cdn --}}
        <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    </head>
    <body>
        <div class="container-fluid mt-2">
            <div class="row">
                <div class="col-md-6">
                    Welcome to cart
                </div>

                <div class="col-md-6">
                    <a href= {{ url("/") }}>
                        <button class="btn btn-warning">Dashboard</button>
                    </a>
                </div>
            </div>
        </div>
        
        {{-- products list --}}
        <section class="container mt-5">
@if(session()->get('products') !== NULL)
            <div class="row products-row">
                @foreach(session()->get('products') as $product)
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
                                <div id="demo-name"></div>
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
                            <button class="btn btn-primary add-to-cart-btn"
                                    onclick="deleteProductFromLs({{ $product->id }})">
                                    Remove
                            </button>
                        </div>
                    </div>
                @endforeach
            </div>
@endif
        </section>
        <script>

            $allProductIds = JSON.parse(localStorage.getItem('productIdArr'));

            axios.post('/bring-Guest-Data', {allProductIds: $allProductIds})
                 .then(res => console.log(res.data))
                 .catch(err => console.log(err));     
                 
            
            
            function deleteProductFromLs($productId){ 
                let $productIdArr = [];
                
                $productIdArr = JSON.parse(localStorage.getItem('productIdArr'));
                for(let i=0; i<$productIdArr.length; i++){
                    if(i == 0){
                        $productIdArr.splice(i, 1);
                    }
                }
                localStorage.setItem('productIdArr', JSON.stringify($productIdArr));
                    
                location.href = '/guestCart';
            }
        </script>
    </body>
</html>
