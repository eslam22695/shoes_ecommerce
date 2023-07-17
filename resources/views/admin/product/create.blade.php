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
        <a style="color: #36404a;"> إضافة </a>

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
            <h4 class="header-title m-t-0 m-b-20">اضافه منتج</h4>
            {{ Form::open(['method' => 'POST', 'action' => ['App\Http\Controllers\Admin\ProductController@store'], 'files' => true]) }}
            @csrf
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <td>الصورة</td>
                        <td>
                            <input type="file" class="filestyle" data-placeholder="No file" data-iconname="fa fa-cloud-upload" name="image" required>
                            @if ($errors->has('image'))
                            <span class="alert alert-danger">
                                <strong>{{ $errors->first('image') }}</strong>
                            </span>
                            @endif

                        </td>
                    </tr>
                    <tr>
                        <td>اسم المنتج</td>
                        <td><input type="text" class="form-control" name="name" required value="{{ old('name') }}"></td>
                        @if ($errors->has('name'))
                        <span class="alert alert-danger">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                        @endif
                    </tr>
                    <tr>
                        <td>السعر</td>
                        <td><input type="text" class="form-control" name="price" required value="{{ old('price') }}"></td>
                        @if ($errors->has('price'))
                        <span class="alert alert-danger">
                            <strong>{{ $errors->first('price') }}</strong>
                        </span>
                        @endif
                    </tr>
                    <tr>
                        <td>هل هناك خصم</td>
                        <td><input type="checkbox" class="isDiscount" name="is_discount" value="1"></td>
                        @if ($errors->has('is_discount'))
                        <span class="alert alert-danger">
                            <strong>{{ $errors->first('is_discount') }}</strong>
                        </span>
                        @endif
                    </tr>
                    <tr class="discount">
                        <td>السعر بعد الخصم</td>

                        <td><input type="text" class="form-control " name="discount_price" value="{{ old('discount_price') }}"></td>

                        @if ($errors->has('discount_price'))
                        <span class="alert alert-danger">
                            <strong>{{ $errors->first('discount_price') }}</strong>
                        </span>
                        @endif
                    </tr>
                    <tr>
                        <td>الوصف</td>
                        <td>
                            <textarea id="textarea" maxlength="100" class="form-control" name="description"></textarea>
                        </td>
                        @if ($errors->has('description'))
                        <span class="alert alert-danger">
                            <strong>{{ $errors->first('description') }}</strong>
                        </span>
                        @endif
                    </tr>
                    <td>اختر القسم</td>
                    <td>
                        {!! Form::select('category_id', $data['categories'], $record->categories??null, ['class' => 'form-control']) !!}
                    </td>
                    @if ($errors->has('category_id'))
                    <span class="alert alert-danger">
                        <strong>{{ $errors->first('category_id') }}</strong>
                    </span>
                    @endif
                    </tr>
                    <tr>
                        <td>اختر الموديل</td>
                        <td>
                            {!! Form::select('model_id', $data['models'], $record->roles??null, ['class' => 'form-control']) !!}
                        </td>
                        @if ($errors->has('model_id'))
                        <span class="alert alert-danger">
                            <strong>{{ $errors->first('model_id') }}</strong>
                        </span>
                        @endif
                    </tr>
                    <tr>
                        <td>اختر المادة الخام</td>
                        <td>
                            {!! Form::select('material_id', $data['materials'], $record->roles??null, ['class' => 'form-control']) !!}
                            {{-- <select id="material_id" name="material_id">
                                @foreach ($materials as $material)
                                <option value="{{ $material->id }}">{{ $material->name }}</option>
                            @endforeach
                            </select> --}}
                        </td>
                        @if ($errors->has('material_id'))
                        <span class="alert alert-danger">
                            <strong>{{ $errors->first('material_id') }}</strong>
                        </span>
                        @endif
                    </tr>
                    <tr>
                        <td>اختر النعل</td>
                        <td>
                            {!! Form::select('sole_id', $data['soles'], $record->roles??null, ['class' => 'form-control']) !!}
                            {{-- <select id="sole_id" name="sole_id">
                                @foreach ($soles as $sole)
                                <option value="{{ $sole->id }}">{{ $sole->name }}</option>
                            @endforeach
                            </select> --}}
                        </td>
                        @if ($errors->has('sole_id'))
                        <span class="alert alert-danger">
                            <strong>{{ $errors->first('sole_id') }}</strong>
                        </span>
                        @endif
                    </tr>
                    <tr>
                        <td>اختر اللون</td>
                        <td>
                            {!! Form::select('color_id', $data['colors'], $record->roles??null, ['class' => 'form-control']) !!}
                            {{-- <select id="color_id" name="color_id">
                                @foreach ($colors as $color)
                                <option value="{{ $color->id }}">{{ $color->name }}</option>
                            @endforeach
                            </select> --}}
                        </td>
                        @if ($errors->has('color_id'))
                        <span class="alert alert-danger">
                            <strong>{{ $errors->first('color_id') }}</strong>
                        </span>
                        @endif
                    </tr>
                    <tr>
                        <td style="width:25%"></td>
                        <td><button type="submit" class="btn btn-default waves-effect waves-light form-control">حفظ</button></td>
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
        $('.discount').css('display', 'none');
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