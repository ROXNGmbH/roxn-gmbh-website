@extends('layouts.admin.app')

@section('page-title','Edit product')

@section('content-header')
    <div class="content-header d-flex justify-content-between" style="width:100%">
        <div>
            <h2 class="content-title card-title">Edit Product</h2>
        </div>
    </div>
@stop

@section('main-content')
    <form action="{{route('products.update',$product->id)}}" method="post">
        @csrf
        @method('PUT')
        <div class="card mb-4">
            <div class="card-header">
                <h4>Information</h4>
            </div>

            @if($errors->any())
                @foreach ($errors->all() as $error)
                    <div class="alert alert-danger">{{$error}}</div>
                @endforeach
            @endif

            <div class="card-body">
                <div class="row">
                    <div class="col-lg-6">
                        <label for="name_de" class="mb-2">Name (de)</label>
                        <input type="text" name="name_de" id="name_de" value="{{$product->name_de}}"
                               class="form-control"
                               placeholder="Enter product name de"><br>
                    </div>
                    <div class="col-lg-6">
                        <label for="name_ar" class="mb-2">Name (ar)</label>
                        <input type="text" name="name_ar" id="name_ar" value="{{$product->name_ar}}"
                               class="form-control"
                               placeholder="Enter product name ar"><br>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <label class="required fw-bold fs-6 mb-2">Description (ar)</label>
                        <textarea name="description_ar">{!! $product->description_ar !!}</textarea>
                        @error('description_ar')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="col-12">
                        <br>
                        <label class="required fw-bold fs-6 mb-2">Description (de)</label>
                        <textarea name="description_de">{!! $product->description_de !!}</textarea>
                        @error('description_de')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>
                </div>

                <div class="row mt-2">
                    <div class="col-4">
                        <label for="name_ar" class="mb-2">Tax</label>
                        <select name="tax" id="tax" class="form-control search-form">
                            <option value="" hidden>-- select tax --</option>
                            @foreach($tax as $value)
                                <option value="{{$value->id}}" @if($product->tax_id == $value->id) selected
                                        @endif data-tax="{{$value->tax}}">{{$value->tax}}</option>
                            @endforeach
                        </select>
                        @error('tax')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>

                    <div class="col-4">
                        <label for="name_ar" class="mb-2">Price</label>
                        <input type="text" name="price" id="price" value="{{$product->price}}"
                               class="form-control"><br>
                        @error('price')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>

                    <div class="col-4">
                        <label for="name_ar" class="mb-2">Price with Tax</label>
                        <input type="text" name="price_with_tax" id="price_with_tax"
                               value="{{old('price_with_tax')}}" class="form-control"><br>
                        @error('price_with_tax')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>

                    <div class="col-4">
                        <label for="purchase_price" class="mb-2">Purchase Price</label>
                        <input type="text" name="purchase_price" id="purchase_price"
                               value="{{$product->purchase_price}}" class="form-control"><br>
                        @error('purchase_price')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>

                    <div class="col-4">
                        <label for="purchase_price_with_tax" class="mb-2">Purchase Price with Tax</label>
                        <input type="text" name="purchase_price_with_tax" id="purchase_price_with_tax"
                               value="{{old('purchase_price_with_tax')}}" class="form-control"><br>
                        @error('purchase_price_with_tax')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>

                    <div class="col-4">
                        <label for="offer_price" class="mb-2">Offer Price</label>
                        <input type="text" name="offer_price" id="offer_price"
                               value="{{$product->offer_price}}" class="form-control"><br>
                        @error('offer_price')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>

                    <div class="col-4">
                        <label for="qty" class="mb-2">Qty</label>
                        <input type="text" name="qty" id="qty" value="{{$product->qty}}" class="form-control"><br>
                        @error('qty')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>

                    <div class="col-4">
                        <label for="min_qty" class="mb-2">Min Qty</label>
                        <input type="text" name="min_qty" id="min_qty" value="{{$product->min_qty}}"
                               class="form-control"><br>
                        @error('min_qty')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>

                    <div class="col-4">
                        <label for="max_qty" class="mb-2">Min Qty</label>
                        <input type="text" name="max_qty" id="max_qty" value="{{$product->max_qty}}"
                               class="form-control"><br>
                        @error('max_qty')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>

                    <div class="col-4">
                        <label for="no_product" class="mb-2">No Product</label>
                        <input type="text" name="no_product" id="no_product" value="{{$product->no_product}}"
                               class="form-control"><br>
                        @error('no_product')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>

                    <div class="col-4">
                        <label for="barcode" class="mb-2">Barcode</label>
                        <input type="text" name="barcode" id="barcode" value="{{$product->barcode}}"
                               class="form-control"><br>
                        @error('barcode')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>

                    <div class="col-4">
                        <label for="weight" class="mb-2">Weight</label>
                        <input type="text" name="weight" id="weight" value="{{$product->weight}}"
                               class="form-control"><br>
                        @error('weight')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>

                    <div class="col-4">
                        <label for="delivery_time_id" class="mb-2">Delivery Time</label>
                        <select name="delivery_time_id" id="delivery_time_id" class="form-control search-form">
                            <option value="" hidden>-- select delivery time --</option>
                            @foreach($delivery_times as $delivery_time)
                                <option value="{{$delivery_time->id}}"
                                        @if($product->delivery_time_id == $delivery_time->id) selected @endif>{{$delivery_time->from .' - '. $delivery_time->to .' '.$delivery_time->type}}</option>
                            @endforeach
                        </select>
                        @error('delivery_time_id')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>

                    <div class="col-4">
                        <label for="manufacturing_company_id" class="mb-2">Manafacturing Company</label>
                        <select name="manufacturing_company_id" id="manufacturing_company_id"
                                class="form-control search-form">
                            <option value="" hidden>-- select manafacturing company --</option>
                            @foreach($manafacturing_companies as $manafacturing_company)
                                <option value="{{$manafacturing_company->id}}"
                                        @if($product->manufacturing_company_id == $manafacturing_company->id) selected @endif>
                                    {{$manafacturing_company->name_ar . ' - ' . $manafacturing_company->name_de}}</option>
                            @endforeach
                        </select>
                        @error('manufacturing_company_id')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>

                    <div class="col-4">
                        <label for="sell_type_id" class="mb-2">Sell Type</label>
                        <select name="sell_type_id" id="sell_type_id" class="form-control search-form">
                            <option value="" hidden>-- select sell type --</option>
                            @foreach($sell_types as $sell_type)
                                <option
                                    value="{{$sell_type->id}}"
                                    @if($product->sell_type_id == $sell_type->id) selected @endif>{{$sell_type->name_ar . ' - ' . $sell_type->name_de}}</option>
                            @endforeach
                        </select>
                        @error('sell_type_id')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>

                    <div class="col-4">
                        <label for="flag_id" class="mb-2 pt-4">Flag</label>
                        <select name="flag_id" id="flag_id" class="form-control search-form">
                            <option value="" hidden>-- select flag --</option>
                            @foreach($flags as $flag)
                                <option value="{{$flag->id}}"
                                        @if($product->flag_id == $flag->id) selected @endif>{{$flag->name_ar . ' - ' . $flag->name_de}}</option>
                            @endforeach
                        </select>
                        @error('flag_id')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>

                    <div class="col-4">
                        <label for="unit_id" class="mb-2 pt-4">Unit</label>
                        <select name="unit_id" id="unit_id" class="form-control search-form">
                            <option value="" hidden>-- select unit --</option>
                            @foreach($unit as $value)
                                <option value="{{$value->id}}"
                                        @if($product->unit_id == $value->id) selected @endif>{{$value->name}}</option>
                            @endforeach
                        </select>
                        @error('unit_id')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>


                    <div class="col-4">
                        <label for="category_id" class="mb-2 pt-4">Category</label>
                        <select name="category_id" id="category_id" class="form-control search-form">
                            <option value="" hidden>-- select category --</option>
                            @foreach($categories as $category)
                                <option value="{{$category->id}}"
                                        @if($product->category_id == $category->id) selected @endif>{{$category->name_ar}}</option>
                            @endforeach
                        </select>
                        @error('category_id')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>

                    <div class="col-4">
                        <label for="sub_category_id" class="mb-2 pt-4">Sub Category</label>
                        <select name="sub_category_id" id="sub_category_id" class="form-control search-form">
                            <option value="" hidden>-- select sub category --</option>
                            @foreach($sub_categories as $category)
                                <option value="{{$category->id}}"
                                        @if($product->sub_category_id == $category->id) selected @endif>{{$category->name_ar}}</option>
                            @endforeach
                        </select>
                        @error('sub_category_id')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>

                    <div class="col-4">
                        <label for="sub_sub_category_id" class="mb-2 pt-4">Sub Sub Category</label>
                        <select name="sub_sub_category_id" id="sub_sub_category_id" class="form-control search-form">
                            <option value="" hidden>-- select sub sub category --</option>
                            @foreach($sub_sub_categories as $category)
                                <option value="{{$category->id}}"
                                        @if($product->sub_sub_category_id == $category->id) selected @endif>{{$category->name_ar}}</option>
                            @endforeach
                        </select>
                        @error('sub_sub_category_id')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>

                    <div class="col-4">
                        <label for="country_id" class="mb-2 pt-4">Country</label>
                        <select name="country_id" id="country_id" class="form-control search-form">
                            <option value="" hidden>-- select country --</option>
                            @foreach($countries as $country)
                                <option value="{{$country->id}}"
                                        @if($product->country_id == $country->id) selected @endif>{{$country->name}}</option>
                            @endforeach
                        </select>
                        @error('category_id')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>

                    <div class="col-4">
                        <label for="tag_id" class="mb-2 pt-4">Tags</label>
                        <select name="tag_id[]" id="tag_id" class="form-control search-form" multiple="multiple">
                            @foreach($tags as $tag)
                                <option value="{{$tag->id}}"
                                    @foreach(json_decode($product->tags) as $t)
                                        @if($tag->id == $t) selected @endif
                                    @endforeach
                                >{{$tag->name_ar . ' - ' . $tag->name_de}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-4">
                        <label class="mb-2 pt-4">Status</label><br>
                        <input type="checkbox" name="status" @if($product->status) checked @endif id="status">
                        <label for="status">active</label>
                    </div>

                    <div class="col-4">
                        <label class="mb-2 pt-4">Bro Product</label><br>
                        <label for="bro_product"><img src="{{asset('assets/admin/imgs/bro-product/bro-product.jpg')}}"
                                                      style="width: 50px;height:50px" alt="bro-product"></label>
                        <input type="checkbox" @if($product->bro_product) checked @endif name="bro_product"
                               id="bro_product">
                    </div>


                    <div class="col-12">
                        <div class="form-group">
                            <label for="document">Documents</label>
                            <div class="needsclick dropzone" id="document-dropzone">

                            </div>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="form-group">
                            <div class="box-image  d-flex ml-3">
                                @foreach($images as $image)
                                    <div class="image-preview">
                                        <img src="{{$image['url']}}" data-id="{{$image['id']}}" class="single-img"
                                             alt="">
                                        <h6 style="color:red;text-align: center;cursor: pointer"
                                            data-id="{{$image['id']}}" class="delete_image">Delete</h6>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                </div>

                <div class="row align-items-end justify-content-end">
                    <div class="col-lg-12">
                        <div class="d-flex justify-content-end pt-2 mt-5">
                            <button class="btn btn-primary" type="submit">Save</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@stop
@section('scripts')
    <script>
        CKEDITOR.replace('description_ar');
        CKEDITOR.replace('description_de');

        $(window).on("load", function () {
            var price = $('#price').val();
            var tax = $('#tax option:selected').attr('data-tax');
            $('#price_with_tax').val(Number(price) + (price * (tax / 100)));

            var purchase_price = $('#purchase_price').val();
            var tax = $('#tax option:selected').attr('data-tax');
            $('#purchase_price_with_tax').val(Number(purchase_price) + (purchase_price * (tax / 100)));
        });

        // price with tax
        $('#price , #tax').on('change', function () {
            var price = $('#price').val();
            var tax = $('#tax option:selected').attr('data-tax');
            $('#price_with_tax').val(Number(price) + (price * (tax / 100)));
        });

        // price with out tax
        $('#price_with_tax').on('change', function () {
            var price_with_tax = $('#price_with_tax').val();
            var tax = $('#tax option:selected').attr('data-tax');
            $('#price').val(Number(price_with_tax) - (price_with_tax * (tax / 100)));
        });

        // purchase price with tax
        $('#purchase_price , #tax').on('change', function () {
            var purchase_price = $('#purchase_price').val();
            var tax = $('#tax option:selected').attr('data-tax');
            $('#purchase_price_with_tax').val(Number(purchase_price) + (purchase_price * (tax / 100)));
        });

        // purchase price with tax
        $('#purchase_price_with_tax').on('change', function () {
            var purchase_price_with_tax = $('#purchase_price_with_tax').val();
            var tax = $('#tax option:selected').attr('data-tax');
            $('#purchase_price').val(Number(purchase_price_with_tax) - (purchase_price_with_tax * (tax / 100)));
        });


        // get sub category by category id
        $('#category_id').on('change', function (e) {
            e.preventDefault();
            var category_id = $(this).val();
            $.ajax({
                url: "{{route('get-sub-category')}}",
                data: {category_id: category_id, '_token': '{{csrf_token()}}'},
                success: function (response) {

                    $('#sub_category_id').html('');
                    let html = `<option value="" selected hidden>-- select sub category --</option>`;
                    $.each(response.sub_categories, function (key, value) {
                        html += `<option value="${value.id}">${value.name_ar + ' - ' + value.name_de}</option>`
                    });

                    $('#sub_category_id').html(html);
                },
                error: function (error) {
                    console.log(error);
                }
            });
        });

        // get sub sub category by sub category
        $('#sub_category_id').on('change', function (e) {
            e.preventDefault();
            var sub_category_id = $(this).val();
            $.ajax({
                url: "{{route('get-sub-sub-category')}}",
                data: {sub_category_id: sub_category_id, '_token': '{{csrf_token()}}'},
                success: function (response) {

                    $('#sub_sub_category_id').html('');
                    let html = `<option value="" selected hidden>-- select sub sub category --</option>`;
                    $.each(response.sub_sub_categories, function (key, value) {
                        html += `<option value="${value.id}">${value.name_ar + ' - ' + value.name_de}</option>`
                    });

                    $('#sub_sub_category_id').html(html);
                },
                error: function (error) {
                    console.log(error);
                }
            });
        });

        $("#tag_id").select2({
            placeholder: "   -- select tags --",
        });

        var uploadedDocumentMap = {}
        Dropzone.options.documentDropzone = {
            url: '{{ route('projects.storeMedia') }}',
            maxFilesize: 2, // MB
            addRemoveLinks: true,
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            success: function (file, response) {
                $('form').append('<input type="hidden" name="document[]" value="' + response.name + '">')
                uploadedDocumentMap[file.name] = response.name
            },
            removedfile: function (file) {
                file.previewElement.remove()
                var name = ''
                if (typeof file.file_name !== 'undefined') {
                    name = file.file_name
                } else {
                    name = uploadedDocumentMap[file.name]
                }
                $('form').find('input[name="document[]"][value="' + name + '"]').remove()
            },
            init: function () {
                @if(isset($project) && $project->document)
                var files =
                    {!! json_encode($project->document) !!}
                    for(var iinfiles){
                    var file = files[i]
                    this.options.addedfile.call(this, file)
                    file.previewElement.classList.add('dz-complete')
                    $('form').append('<input type="hidden" name="document[]" value="' + file.file_name + '">')
                }
                @endif
            }
        }

        // ajax delete image
        $('.delete_image').on('click', function (e) {
            e.preventDefault();
            var image_id = $(this).attr('data-id');
            $.ajax({
                url: "{{route('delete_image')}}",
                type: "post",
                data: {image_id: image_id, "_token": "{{ csrf_token() }}"},
                success: function (response) {
                    window.location.reload(true)
                },
                error: function (error) {
                    console.log(error);
                }
            });
        })
    </script>


    {{--    var files = Object.values(JSON.parse('{!! json_encode($product->images) !!}'));--}}
@endsection
