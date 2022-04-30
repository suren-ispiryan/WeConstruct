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
                    <form action="/admin-dashboard" method="GET">
                        <button class="btn btn-primary">Dashboard</button>
                    </form>
                </div>

                <div class="col-md-2">
                    <form action="/log-out" method="GET">
                        <button class="btn btn-danger">log out</button>
                    </form>
                </div>
            </div>
        </div>

        <h3 class="list-sold"> Sold products list</h3>
        
        
        {{-- show products --}}
        <div class="container-fluid mt-5">
            <div class="row">
                <div class="col-md-1 cols">                
                    Table id
                </div>
            
                <div class="col-md-3 cols">                
                    User email
                </div>

                <div class="col-md-4 cols">                
                    User sddress
                </div>

                <div class="col-md-1 cols">                
                    Product id
                </div>

                <div class="col-md-1 cols">                
                    Product Price
                </div>

                <div class="col-md-2 cols">                
                    Bought at
                </div>
            </div>

            @foreach ($soldProductsList as $soldProductsListEach)
                <div class="row mt-2">
                    <div class="col-md-1 cols">                
                        {{ $soldProductsListEach->id }}
                    </div>
                    
                    <div class="col-md-3 cols">                
                        {{ $soldProductsListEach->userEmail }}
                    </div>

                    <div class="col-md-4 cols">                
                        {{ $soldProductsListEach->userCountry.', house:'.$soldProductsListEach->userHouse.', appartement:'.$soldProductsListEach->userAppartement.', zip:'.$soldProductsListEach->userZip }}                        
                    </div>

                    <div class="col-md-1 cols">                
                        {{ $soldProductsListEach->productId }}
                    </div>

                    <div class="col-md-1 cols">                
                        {{ $soldProductsListEach->productPrice }}
                    </div>

                    <div class="col-md-2 cols">                
                        {{ $soldProductsListEach->created_at }}
                    </div>
                </div>
            @endforeach
        </div>


        <div class="row mt-3">
            <div class="col-md-12 pagination">
                <a href= {{ $soldProductsList->previousPageUrl() }}>
                    <button class="btn btn-success m-1 delete">Previous</button>
                </a>
                
                <a href= {{ $soldProductsList->nextPageUrl() }}>
                    <button class="btn btn-success m-1 delete">Next</button>
                </a>
            </div>
        </div>

        <div class="row mt-1 mb-4">
            <div class="col-md-12 pagination">
                <p class="pages">
                    page {{ $soldProductsList->currentPage() }}
                    -> {{ $soldProductsList->perPage() }}
                    items out of {{ $soldProductsList->total() }}
                </p>
            </div>
       </div>
    </body>
</html>
