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
        <section class="container-fluid">
            <div class="container">
    
                <div class="row">
                    <div class="col-md-3"></div>
                    
                    <div class="col-md-6 mt-5">
                        <form action="admin-create-product" method="POST" enctype="multipart/form-data" class="form">
                            <h5 class="text">create a product</h5>

                            @csrf

                            <input type="text" 
                                   name="name" 
                                   class="inputs form-control" 
                                   placeholder="name">
    
                            <input type="textarea" 
                                   name="description" 
                                   class="inputs form-control" 
                                   placeholder="description">
    
                            <input type="text" 
                                   name="brand" 
                                   class="inputs form-control" 
                                   placeholder="brand">

                            <input type="number" 
                                   name="price" 
                                   class="inputs form-control" 
                                   placeholder="price">
{{-- colors --}}
                            <h5 class="col-md-12 head">Choose colors</h5>
                            <div class="form-check form-check-inline">
                                <label class="form-check-label" for="inlineCheckbox1">black</label>
                                <input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="colors[]" value="black">
                            </div>
                            <div class="form-check form-check-inline">
                                <label class="form-check-label" for="inlineCheckbox2">white</label>
                                <input class="form-check-input" type="checkbox" id="inlineCheckbox2" name="colors[]" value="white">
                            </div>
                            <div class="form-check form-check-inline">
                                <label class="form-check-label" for="inlineCheckbox3">red</label>
                                <input class="form-check-input" type="checkbox" id="inlineCheckbox3" name="colors[]" value="red">
                            </div>
                            <div class="form-check form-check-inline">
                                <label class="form-check-label" for="inlineCheckbox4">yellow</label>
                                <input class="form-check-input" type="checkbox" id="inlineCheckbox4" name="colors[]" value="yellow">
                            </div>
                            <div class="form-check form-check-inline">
                                <label class="form-check-label" for="inlineCheckbox5">green</label>
                                <input class="form-check-input" type="checkbox" id="inlineCheckbox5" name="colors[]" value="green">
                            </div>
                            <div class="form-check form-check-inline">
                                <label class="form-check-label" for="inlineCheckbox6">blue</label>
                                <input class="form-check-input" type="checkbox" id="inlineCheckbox6" name="colors[]" value="blue">
                            </div>                                         
{{-- sizes --}}
                            <h5 class="col-md-12 head">Choose sizes</h5>
                            <div class="form-check form-check-inline">
                                <label class="form-check-label" for="inlineCheckbox7">small</label>
                                <input class="form-check-input" type="checkbox" id="inlineCheckbox7" name="sizes[]" value="small">
                            </div>
                            <div class="form-check form-check-inline">
                                <label class="form-check-label" for="inlineCheckbox8">medium</label>
                                <input class="form-check-input" type="checkbox" id="inlineCheckbox8" name="sizes[]" value="medium">
                            </div>                            
                            <div class="form-check form-check-inline">
                                <label class="form-check-label" for="inlineCheckbox9">big</label>
                                <input class="form-check-input" type="checkbox" id="inlineCheckbox9" name="sizes[]" value="big">
                            </div>
{{-- category --}}
                            <h5 class="head col-md-12" for="category">Choose category</h5>
                            <select id="category" 
                                    class="form-select form-control" 
                                    name="category" 
                                    aria-label="Default select example">
                                <option selected>Choose category</option>
                                <option value="toys">Toys</option>
                                <option value="clothes">Clothes</option>
                                <option value="houses">Houses</option>
                                <option value="tools">Tools</option>
                                <option value="books">Books</option>
                                <option value="cars">Cars</option>
                                <option value="phones">Phones</option>
                            </select>
{{-- image --}}
                            <h5 class="head col-md-12">Upload image</h5>
                            <input type="file" id="img" name="img" accept="image/*">

                            <button class="col-md-12 mt-3 btn btn-success forrm-control inputs">Create</button>
                        </form>
                    </div>
    
                    <div class="col-md-3"></div>
                </div>
            </div>		
        </section>
    </body>
</html>
