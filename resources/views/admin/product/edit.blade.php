@extends('admin/admin_layout')
@section('admin_content')
    @include('admin.log.error')
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Edit Category
                </header>

                <div class="panel-body">
                    <div class="position-center">
                        <form role="form" action="{{URL::to('admin/post-edit-brand-product', $data->id)}}" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Product Name</label>
                                <input type="text" class="form-control" required value="{{$data->name}}" name="name" id="exampleInputEmail1" placeholder="Name Category">
                            </div>

                            <div class="form-group">
                                <label>Category</label>
                                <select name="category_id" class="form-control">
                                    <option value="0">Please Choose Category</option>
                                    <?php cateParent($dataParent, $data->category_id );?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Price</label>
                                <input type="text" class="form-control" required value="{{$data->price}}" name="price" id="exampleInputEmail1">
                            </div>

                            <div class="form-group">
                                <img style="width: 80px; height: 80px" src="{{ asset('resources/upload/product/images/'.$data->image_path) }}" alt="{{$data->image_path}}">
                                <label>Images</label>
                                <input type="file" name="fImages">
                            </div>

                            <div class="form-group">
                                <label>Current Image Gallery</label>
                                @foreach ($listImgGallery as $key => $value)
                                    <div>
                                        <img style="width: 80px; height: 80px" src="{{ asset('resources/upload/product/gallery/'.$value->value) }}" alt="{{$value->value}}">
                                        <label>Delete</label>
                                        <input type="checkbox" name="delete_image[{{$value->id}}]">
                                    </div>
                                @endforeach

                            </div>

                            <div class="form-group">
                                <label>More Images Gallery</label>

                                <input type="file" name="more_image_gallery[]" multiple>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Description</label>
                                <textarea class="form-control" rows="3" id="intro" name="description">{{$data->description}}</textarea>
                            </div>

                            <button type="submit" class="btn btn-info">Update Product</button>
                        </form>
                    </div>

                </div>
            </section>

        </div>
    </div>
@stop
