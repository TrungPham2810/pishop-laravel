@extends('admin/admin_layout')
@section('admin_content')
    @include('admin.log.error')
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Add Category
                </header>
                
                <div class="panel-body">
                    <div class="position-center">
                        <form role="form" action="{{URL::to('admin/save-category-product')}}" method="post">
                            <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Name Caterogy</label>
                                <input type="text" class="form-control" required value="{{old('category_name')}}" name="category_name" id="exampleInputEmail1" placeholder="Name Category">
                            </div>
                            <div class="form-group">
                                <label>Category Parent</label>
                                <select name="parent" class="form-control">
                                    <option value="0">Please Choose Category</option>
                                    <?php cateParent($data);?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Description</label>
                                <textarea class="form-control"  rows="3" id="intro" name="category_description">{!! old('category_description') !!}</textarea>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputFile">Status</label>
                                <select name="status_category" class="form-control input-sm m-bot15">
                                    <option value="0">Disable</option>
                                    <option value="1">Enable</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-info">Add Category</button>
                        </form>
                    </div>

                </div>
            </section>

        </div>
    </div>
@stop
