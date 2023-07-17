@extends('layouts.admin')

@section('styles')
<link href="{{ asset('admin_assets/plugins/bootstrap-table/css/bootstrap-table.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('admin_assets/plugins/custombox/css/custombox.css') }}" rel="stylesheet">
@stop

@section('content')

<!-- Page-Title -->
<div class="row">
    <div class="col-sm-12">
        <div class="main-title-00">
            @if (Session::has('success'))
            <div class="alert alert-success">{{ Session::get('success') }}</div>
            @elseif(Session::has('danger'))
            <div class="alert alert-danger">{{ Session::get('danger') }}</div>
            @endif
            <h4 class="page-title">مقاسات المنتج</h4>
        </div>

    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="card-box">

            <div class="row">
                <div class="col-sm-12">
                    <div class=" main-btn-00">
                        <a href="{{ route('admin.product_size.create', $product_id) }}" class="btn btn-default waves-effect">اضافه
                            مقاس
                            للمنتج
                            +</a>
                    </div>
                </div>
            </div>

            <div class="table-responsive">
                <table data-toggle="table" data-search="true" data-show-columns="true" data-sort-name="id" data-page-list="[8, 16, 32]" data-page-size="8" data-pagination="true" data-show-pagination-switch="true" class="table-bordered ">

                    <thead>
                        <tr>
                            <th data-field="مقاس المنتج" data-align="center"> مقاس المنتج </th>
                            <th data-field="الكمية" data-align="center">الكمية</th>
                            <th data-field="الحالة" data-align="center">الحالة</th>
                            <th data-field="التحكم" data-align="center">التحكم</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($productSizes as $productSize)
                        <tr>
                            <td>{{ $productSize->size->name }}</td>
                            <td>{{ $productSize->quantity }}</td>
                            <td>{{ $productSize->status === 1 ? 'مفعل' : 'غير مفعل' }}</td>

                            <td class="actions">
                                <a href="{{ route('admin.changeStatus', [$productSize->status, 'product_sizes', $productSize->id]) }}" class="btn btn-{{ $productSize->status == 1 ? 'secondary' : 'dark' }} waves-effect" title="الحالة"> {{ $productSize->status == 1 ? 'إبطال' : 'تفعيل' }}</a>
                                <a href="{{ route('admin.product_size.edit', $productSize->id) }}" class="btn btn-success waves-effect" title="تعديل">تعديل</a>
                                <button type="button" class="btn btn-danger waves-effect" data-toggle="modal" data-target="#{{ $productSize->id }}delete" title="حذف">حذف </button>
                            </td>
                        </tr>

                        <div id="{{ $productSize->id }}delete" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="custom-width-modalLabel" aria-hidden="true" style="display: none;">
                            <div class="modal-dialog" style="width:55%;">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="icon error animateErrorIcon" style="display: block;"><span class="x-mark animateXMark"><span class="line left"></span><span class="line right"></span></span></div>
                                        <h4 style="text-align:center;">تأكيد الحذف</h4>
                                    </div>
                                    <div class="modal-footer" style="text-align:center">
                                        <form action="{{ route('admin.product_size.destroy', $productSize->id) }}" method="post">
                                            @csrf
                                            <input name="_method" type="hidden" value="DELETE">
                                            <button class="btn btn-danger" type="submit" dir="ltr">حذف</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
<script src="{{ asset('admin_assets/plugins/bootstrap-table/js/bootstrap-table.js') }}"></script>
<script src="{{ asset('admin_assets/pages/jquery.bs-table.js') }}"></script>
<!-- Modal-Effect -->
<script src="{{ asset('admin_assets/plugins/custombox/js/custombox.min.js') }}"></script>
<script src="{{ asset('admin_assets/plugins/custombox/js/legacy.min.js') }}"></script>
@stop
