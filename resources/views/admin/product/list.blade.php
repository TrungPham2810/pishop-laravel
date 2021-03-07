@extends('admin/admin_layout')
@section('admin_content')
    @include('admin.log.error')
    <div class="table-agile-info">
        <div class="panel panel-default">
            <div class="panel-heading">
                List Brand Product
            </div>
            <?php
            $message = \Illuminate\Support\Facades\Session::get('message');
            if($message){
                echo "<div class='alert alert-success'>".$message."</div>";
                \Illuminate\Support\Facades\Session::put('message', null);
            }
            ?>
            <div class="row w3-res-tb">
                <div class="col-sm-5 m-b-xs">
                    <select class="input-sm form-control w-sm inline v-middle">
                        <option value="0">Bulk action</option>
                        <option value="1">Delete selected</option>
                        <option value="2">Bulk edit</option>
                        <option value="3">Export</option>
                    </select>
                    <button class="btn btn-sm btn-default">Apply</button>
                </div>
                <div class="col-sm-4">
                    <p>
                        <a href="{{URL::to('/add-brand-product')}}" class="alert-link">Add Brand Product</a>
                    </p>

                </div>
                <div class="col-sm-3">
                    <div class="input-group">
                        <input type="text" class="input-sm form-control" placeholder="Search">
                        <span class="input-group-btn">

            <button class="btn btn-sm btn-default" type="button">Go!</button>

          </span>
                    </div>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-striped b-t b-light">
                    <thead>
                    <tr>
                        <th style="width:3%;">
                            <label class="i-checks m-b-none">
                                <input type="checkbox"><i></i>
                            </label>
                        </th>
                        <th style="width: 10%">Image</th>
                        <th style="width: 10%">Id</th>
                        <th style="width: 15%">Product Name</th>
                        <th style="width: 15%">Category</th>
                        <th style="width: 10%">Price</th>
                        <th style="width: 10%">Qty</th>

                        <th style="width: 10%">Description</th>
                        <th style="width: 5%">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($data as $item)
                        <tr>
                            <td><label class=""><input type="checkbox" name="post[]"><i></i></label></td>
                            <td><img style="width: 80px; height: 80px" src="{{ asset('resources/upload/product/images/'.$item->image_path) }}" alt="{{$item->image_path}}"></td>
                            <td>{{$item->id}}</td>
                            <td>{{$item->name}}</td>
                            <td>{{$item->category_name}}</td>
                            <td>{{$item->price}}</td>
                            <td>{{$item->qty}}</td>

                            <td><span class="text-ellipsis">{{$item->description}}</span></td>
                            <td>
                                <div>
                                    <a href="{{URL::to('admin/edit-brand-product', $item->id)}}" class="active" style="margin-right: 20px" ui-toggle-class=""><i class="fa fa-pencil-square-o text-success text-active" ></i></a>
                                    <a href="{{URL::to('admin/delete-brand-product', $item->id)}}" onclick="return confirm('Are you sure delete this category?')" class="active" ui-toggle-class=""><i class="fa fa-times text-danger text"></i></a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>

                </table>
            </div>

        </div>
    </div>
@stop
