@extends('admin/admin_layout')
@section('admin_content')
    @include('admin.log.error')
    <div class="table-agile-info">
        <div class="panel panel-default">
            <div class="panel-heading">
                List Category
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
                        <a href="{{URL::to('admin/add-category')}}" class="alert-link">Add Category</a>
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

                            </label>
                        </th>
                        <th style="width: 20%">Category</th>
                        <th style="width: 47%">Description</th>
                        <th style="">Parent</th>
                        <th style="width: 20%">Enable <br> (click to change status)</th>

                        <th style="width: 10%">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($data as $item)


                    <tr>
                        <td><label class=""><input type="checkbox" name="post[]"><i></i></label></td>
                        <td>{{$item->name}}</td>
                        <td><span class="text-ellipsis">{{$item->description}}</span></td>
                        <td><span class="text-ellipsis">{{$item->parent_name}}</span></td>
                        <td><span class="text-ellipsis">
                               @if($item->status == 0)
                                    <a href="{{URL::to('admin/enable-category', $item->id)}}"><span class="fa-thumb-styling fa fa-thumbs-down" style="color:red"> Disable</span></a>
                               @else
                                    <a href="{{URL::to('admin/diable-category', $item->id)}}"><span class="fa-thumb-styling fa fa-thumbs-up"> Enable</span></a>
                                @endif
                            </span></td>
                        <td>
                            <a href="{{URL::to('admin/edit-category', $item->id)}}" class="active" style="margin-right: 20px" ui-toggle-class=""><i class="fa fa-pencil-square-o text-success text-active" ></i></a>
                            <a href="{{URL::to('admin/delete-category', $item->id)}}" onclick="return confirm('Are you sure delete this category?')" class="active" ui-toggle-class=""><i class="fa fa-times text-danger text"></i></a>
                        </td>
                    </tr>

                    </tbody>
                    @endforeach
                </table>
            </div>

        </div>
    </div>
@stop
