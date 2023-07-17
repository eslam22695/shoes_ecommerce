@extends('layouts.admin')

@section('content')
<!-- Page-Title -->
<div class="row">
    <div class="main-title-00">
        @if (Session::has('success'))
        <div class="alert alert-success">{{ Session::get('success') }}</div>
        @elseif(Session::has('danger'))
        <div class="alert alert-danger">{{ Session::get('danger') }}</div>
        @endif
        <a style="color: #fff;" href="{{route('admin.home')}}">الرئيسية</a>
        <a style="color: #fff;" href="{{route('admin.product.index')}}">/ المنتجات / </a>
        <a style="color: #36404a;"> مشاهدة </a>

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
            <h4 class="header-title m-t-0 m-b-20">{{$product->name_ar}}</h4>

            <table class="table table-bordered table-striped">
                <tbody>

                    <tr>
                        <td>الصورة الرئيسية</td>
                        <td><img src="{{asset('admin_assets/images/products/'.$product->image)}}" class="img-responsive" width="100px" height="100px"></td>
                    </tr>
                    <tr>
                        <td>الاسم</td>
                        <td>{{ $product->name }}</td>
                    </tr>
                    <tr>
                        <td>السعر</td>
                        <td>{{ $product->price }}</td>
                    </tr>
                    <tr>
                        <td>السعر بعد االخصم</td>
                        <td>{{ $product->discount_price }}</td>
                    </tr>
                    <tr>
                        <td>الوصف </td>
                        <td>{{ $product->description }}</td>
                    </tr>
                    <tr>
                        <td>القسم</td>
                        <td>{{ $product->category->name }}</td>
                    </tr>
                    <tr>
                        <td>الموديل</td>
                        <td>{{ $product->shoe_model->name }}</td>
                    </tr>
                    <tr>
                        <td>المادة الخام</td>
                        <td>{{ $product->material->name }}</td>
                    </tr>
                    <tr>
                        <td>اللون</td>
                        <td>{{ $product->color->name }}</td>
                    </tr>
                    <tr>
                        <td>النعل</td>
                        <td>{{ $product->sole->name }}</td>
                    </tr>
                    <tr>
                        <td>الحالة</td>
                        <td>{{$product->status == 1 ? 'مفعل' : 'لم يفعل'}}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div><!-- end col -->
</div>

@endsection
