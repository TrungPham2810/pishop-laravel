@extends('admin/admin_layout')
@section('admin_content')
    @include('admin.log.error')
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Add Brand Product
                </header>

                <div class="panel-body">
                    <div class="position-center">
                        <form role="form" action="{{URL::to('admin/save-brand-product')}}" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Product Name</label>
                                <input type="text" class="form-control" required value="{{old('product_name')}}" name="product_name" id="exampleInputEmail1" placeholder="Name Category">
                            </div>
                            <div class="form-group">
                                <label>Category</label>
                                <select name="category_id" class="form-control">
                                    <option value="0">Please Choose Category</option>
                                    <?php cateParent($data);?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Price</label>
                                <input class="form-control" required id="price" value ='{!! old('price') !!}' name="price">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword1">Quantity</label>
                                <input class="form-control" required id="qty" value ='{!! old('qty') !!}' name="qty">
                            </div>

                            <div class="form-group">
                                <label>Images</label>
                                <input type="file" name="fImages">
                            </div>

                            <div class="form-group">
                                <label>Images Gallery</label>

                                <input type="file" name="image_gallery[]" multiple>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Description</label>
                                <textarea class="form-control"  rows="3" id="intro" name="description">{!! old('description') !!}</textarea>
                            </div>

                            <button type="submit" class="btn btn-info">Add Brand</button>
                        </form>
                    </div>

                </div>
            </section>

        </div>
    </div>
@stop
