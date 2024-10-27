@extends('admin.layout.layout')




@section('content')

<div class="row">
    <div class="col-md-12 col-sm-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Form Design <small>Different form elements</small></h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <br>
                <form id="demo-form2" action="{{route('category.update',$category->id)}}" class="form-horizontal form-label-left" method="post" novalidate>
                    @csrf
                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">
                            Category Name <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6">
                            <input type="text" id="first-name" value="{{$category->name}}" name="name" required="required" class="form-control">
                        </div>
                    </div>
                    <br>
                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="subcategory">
                            Sub Category of <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6">
                            <select required="required" name="category_id" id="subcategory" required class="form-control">
                                <option value=""@if($category->category_id==null) selected @endif >No Subcategory</option>
                                @foreach($categories as $categorie)
                                    <option value="{{$categorie->id}}" @if($category->category_id!=null && $category->category_id==$categorie->id) selected @endif>{{$categorie->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="ln_solid"></div>
                    <div class="form-group">
                        <div class="col-md-6 col-sm-6 offset-md-3">
                            <input type="submit" class="btn btn-success" value="Submit"></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>



@endsection