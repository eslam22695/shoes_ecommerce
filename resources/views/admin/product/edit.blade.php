@extends('layouts.admin')

@section('styles')
<!-- Plugins css-->
<link href="{{ asset('admin_assets/plugins/bootstrap-tagsinput/css/bootstrap-tagsinput.css') }}" rel="stylesheet" />
<link href="{{ asset('admin_assets/plugins/switchery/css/switchery.min.css') }}" rel="stylesheet" />
<link href="{{ asset('admin_assets/plugins/multiselect/css/multi-select.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('admin_assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('admin_assets/plugins/bootstrap-select/css/bootstrap-select.min.css') }}" rel="stylesheet" />
<link href="{{ asset('admin_assets/plugins/bootstrap-touchspin/css/jquery.bootstrap-touchspin.min.css') }}" rel="stylesheet" />
<link href="{{ asset('admin_assets/plugins/bootstrap-table/css/bootstrap-table.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('admin_assets/plugins/custombox/css/custombox.css') }}" rel="stylesheet">
@endsection

@section('content')
<!-- Page-Title -->
<div class="row">
    <div class="main-title-00">
        @if (Session::has('success'))
        <div class="alert alert-success">{{ Session::get('success') }}</div>
        @elseif(Session::has('danger'))
        <div class="alert alert-danger">{{ Session::get('danger') }}</div>
        @endif
        <a style="color: #fff;" href="{{ route('admin.home') }}">الرئيسية</a>
        <a style="color: #fff;" href="{{ route('admin.product.index') }}">/ المنتجات / </a>
        <a style="color: #36404a;"> تعديل </a>

        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="card-box">
            <h4 class="header-title m-t-0 m-b-20">تعديل منتج</h4>
            {{ Form::model($product, ['method' => 'PATCH', 'action' => ['App\Http\Controllers\Admin\ProductController@update', $product->id], 'files' => true]) }}
            @csrf
            @method('PUT')
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <td>الصورة</td>
                        <td>
                            <input type="file" class="filestyle" data-placeholder="No file" data-iconname="fa fa-cloud-upload" name="image" value="{{ old('image') ? old('image') : $product->images }}">
                            <img src="{{ asset('admin_assets/images/products/' . $product->image) }}" class="img-responsive" width="100px" height="100px">
                            @if ($errors->has('image'))
                            <span class="alert alert-danger">
                                <strong>{{ $errors->first('image') }}</strong>
                            </span>
                            @endif

                        </td>
                    </tr>
                    <tr>
                        <td>الاسم</td>
                        <td><input type="text" class="form-control" name="name" required value="{{ old('name') ? old('name') : $product->name }}"></td>
                        @if ($errors->has('name'))
                        <span class="alert alert-danger">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                        @endif
                    </tr>
                    <tr>
                        <td>السعر </td>
                        <td><input type="text" class="form-control" name="price" required value="{{ old('price') ? old('price') : $product->price }}"></td>
                        @if ($errors->has('price'))
                        <span class="alert alert-danger">
                            <strong>{{ $errors->first('price') }}</strong>
                        </span>
                        @endif
                    </tr>
                    <tr>
                        <td>هل هناك خصم</td>
                        <td><input type="checkbox" class="isDiscount" name="is_discount" value="1" {{$product->is_discount ? 'checked' : ''}}></td>
                        @if ($errors->has('is_discount'))
                        <span class="alert alert-danger">
                            <strong>{{ $errors->first('is_discount') }}</strong>
                        </span>
                        @endif
                    </tr>
                    <tr class="discount" style="display:{{$product->is_discount ? 'table-row' : 'none'}}">
                        <td>السعر بعد الخصم</td>
                        <td><input type="text" class="form-control" name="discount_price" value="{{ old('discount_price') ? old('discount_price') : $product->discount_price }}"></td> @if ($errors->has('description_en'))
                        <span class="alert alert-danger">
                            <strong>{{ $errors->first('discount_price') }}</strong>
                        </span>
                        @endif
                    </tr>
                    <tr>
                        <td>الوصف</td>
                        <td>
                            <textarea id="textarea" maxlength="100" class="form-control" name="description">{{ old('description') ? old('description') : $product->description }}</textarea>
                        </td>
                        @if ($errors->has('description'))
                        <span class="alert alert-danger">
                            <strong>{{ $errors->first('description') }}</strong>
                        </span>
                        @endif
                    </tr>
                    <tr>
                        <td>القسم</td>
                        <td>
                            {!! Form::select('category_id', $data['categories'], $product->category_id??null, ['class' => 'form-control']) !!}
                        </td>
                        @if ($errors->has('category_id'))
                        <span class="alert alert-danger">
                            <strong>{{ $errors->first('category_id') }}</strong>
                        </span>
                        @endif
                    </tr>
                    <tr>
                        <td>الموديل</td>
                        <td>
                            {!! Form::select('model_id', $data['models'], $product->model_id??null, ['class' => 'form-control']) !!}
                        </td>
                        @if ($errors->has('model_id'))
                        <span class="alert alert-danger">
                            <strong>{{ $errors->first('model_id') }}</strong>
                        </span>
                        @endif
                    </tr>
                    <tr>
                        <td>المادة الخام</td>
                        <td>
                            {!! Form::select('material_id', $data['materials'], $product->material_id??null, ['class' => 'form-control']) !!}
                        </td>
                        @if ($errors->has('material_id'))
                        <span class="alert alert-danger">
                            <strong>{{ $errors->first('material_id') }}</strong>
                        </span>
                        @endif
                    </tr>
                    <tr>
                    <tr>
                        <td>النعل </td>
                        <td>
                            {!! Form::select('sole_id', $data['soles'], $product->sole_id??null, ['class' => 'form-control']) !!}
                        </td>
                        @if ($errors->has('sole_id'))
                        <span class="alert alert-danger">
                            <strong>{{ $errors->first('sole_id') }}</strong>
                        </span>
                        @endif
                    </tr>
                    <tr>
                    <tr>
                        <td>اللون </td>
                        <td>
                            {!! Form::select('color_id', $data['colors'], $product->color_id??null, ['class' => 'form-control']) !!}
                        </td>
                        @if ($errors->has('color_id'))
                        <span class="alert alert-danger">
                            <strong>{{ $errors->first('color_id') }}</strong>
                        </span>
                        @endif
                    </tr>
                    <tr>
                        <td style="width:25%"></td>
                        <td><button type="submit" class="btn btn-default waves-effect waves-light form-control">تعديل</button></td>
                    </tr>
                </tbody>
            </table>
            {!! Form::close() !!}

        </div>
    </div><!-- end col -->
</div>
@endsection

@section('scripts')
<script>
    $('document').ready(function() {
        $(".isDiscount").change(function() {
            if (this.checked) {
                $('.discount').css('display', 'table-row');
            } else {
                $('.discount').css('display', 'none');
            }
        });
    });
</script>
@endsection