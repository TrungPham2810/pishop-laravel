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
                        <form role="form" action="{{URL::to('admin/post-edit-category-product', $data->id)}}" method="post">
                            <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Name Caterogy</label>
                                <input type="text" class="form-control" required value="{{$data->name}}" name="category_name" id="exampleInputEmail1" placeholder="Name Category">
                            </div>

                            <div class="form-group">
                                <label>Category Parent</label>
                                <select name="parent" class="form-control">
                                    <option value="0">Please Choose Category</option>
                                    <?php cateParent($dataParent, $data->parent);?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword1">Description</label>
                                <textarea class="form-control" rows="3" id="intro" name="category_description">{{$data->description}}</textarea>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputFile">Status</label>
                                <select name="status_category" required class="form-control input-sm m-bot15">
                                    <option>Select</option>
                                    <option value="0" <?php echo ($data->status == 0)? 'selected' : '' ?> >Disable</option>
                                    <option value="1" <?php echo ($data->status == 1)? 'selected' : '' ?> >Enable</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-info">Update Category</button>
                        </form>
                    </div>

                </div>
            </section>

        </div>
    </div>
@stop
