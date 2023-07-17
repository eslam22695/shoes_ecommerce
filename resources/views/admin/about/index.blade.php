@extends('layouts.admin')

@section('content')
<!-- Page-Title -->
<div class="row">
    <div class="col-sm-12">
        @if (Session::has('success'))
        <div class="alert alert-success">{{ Session::get('success') }}</div>
        @elseif(Session::has('danger'))
        <div class="alert alert-danger">{{ Session::get('danger') }}</div>
        @endif
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="card-box">
            <h4 class="header-title m-t-0 m-b-20">من نحن</h4>

            <table class="table table-bordered table-striped">
                @if(isset($about->id))
                {{Form::model($about,['method'=>'PATCH','action' => ['App\Http\Controllers\Admin\AboutController@update',$about->id], 'files' => true])}}
                <tbody>
                    <tr>
                        <td>الوصف</td>
                        <td>
                            <textarea name="description" class="form-control" id="content2"><?php if(isset($about->description)){echo $about->description;} ?></textarea>
                            @if ($errors->has('description'))
                            <span class=" alert alert-danger">
                                <strong>{{ $errors->first('description') }}</strong>
                            </span>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td>السياسات</td>
                        <td>
                            <textarea name="policy" class="form-control" id="content2"><?php if(isset($about->policy)){echo $about->policy;} ?></textarea>
                            @if ($errors->has('policy'))
                            <span class="alert alert-danger">
                                <strong>{{ $errors->first('policy') }}</strong>
                            </span>
                            @endif
                        </td>
                    </tr>

                    <tr>
                        <td> الشروط</td>
                        <td>
                            <textarea name="terms" id="content2"><?php if(isset($about->terms)){echo $about->terms;} ?></textarea>
                        </td>
                        @if ($errors->has('terms'))
                        <span class="alert alert-danger">
                            <strong>{{ $errors->first('terms') }}</strong>
                        </span>
                        @endif
                    </tr>

                    <tr>
                        <td>عنوان الاحصائية الأولي</td>
                        <td>
                            <input type="text" name="title1" class="form-control" value="<?php if(isset($about->title1)){echo $about->title1;} ?>">
                            @if ($errors->has('title1'))
                            <span class="alert alert-danger">
                                <strong>{{ $errors->first('title1') }}</strong>
                            </span>
                            @endif
                        </td>
                    </tr>

                    <tr>
                        <td>قيمة الاحصائية الأولي</td>
                        <td>
                            <input type="text" name="value1" class="form-control" value="<?php if(isset($about->value1)){echo $about->value1;} ?>">
                            @if ($errors->has('value1'))
                            <span class="alert alert-danger">
                                <strong>{{ $errors->first('value1') }}</strong>
                            </span>
                            @endif
                        </td>
                    </tr>

                    <tr>
                        <td>عنوان الاحصائية الثانية</td>
                        <td>
                            <input type="text" name="title2" class="form-control" value="<?php if(isset($about->title1)){echo $about->title2;} ?>">
                            @if ($errors->has('title2'))
                            <span class="alert alert-danger">
                                <strong>{{ $errors->first('title2') }}</strong>
                            </span>
                            @endif
                        </td>
                    </tr>

                    <tr>
                        <td>قيمة الاحصائية الثانية</td>
                        <td>
                            <input type="text" name="value2" class="form-control" value="<?php if(isset($about->value2)){echo $about->value2;} ?>">
                            @if ($errors->has('value2'))
                            <span class="alert alert-danger">
                                <strong>{{ $errors->first('value2') }}</strong>
                            </span>
                            @endif
                        </td>
                    </tr>

                    <tr>
                        <td>عنوان الاحصائية الثالثة</td>
                        <td>
                            <input type="text" name="title3" class="form-control" value="<?php if(isset($about->title1)){echo $about->title3;} ?>">
                            @if ($errors->has('title3'))
                            <span class="alert alert-danger">
                                <strong>{{ $errors->first('title3') }}</strong>
                            </span>
                            @endif
                        </td>
                    </tr>

                    <tr>
                        <td>قيمة الاحصائية الثالثة</td>
                        <td>
                            <input type="text" name="value3" class="form-control" value="<?php if(isset($about->value3)){echo $about->value3;} ?>">
                            @if ($errors->has('value3'))
                            <span class="alert alert-danger">
                                <strong>{{ $errors->first('value3') }}</strong>
                            </span>
                            @endif
                        </td>
                    </tr>

                    <tr>
                        <td>عنوان الاحصائية الرابعة</td>
                        <td>
                            <input type="text" name="title4" class="form-control" value="<?php if(isset($about->title1)){echo $about->title4;} ?>">
                            @if ($errors->has('title4'))
                            <span class="alert alert-danger">
                                <strong>{{ $errors->first('title4') }}</strong>
                            </span>
                            @endif
                        </td>
                    </tr>

                    <tr>
                        <td>قيمة الاحصائية الرابعة</td>
                        <td>
                            <input type="text" name="value4" class="form-control" value="<?php if(isset($about->value4)){echo $about->value4;} ?>">
                            @if ($errors->has('value4'))
                            <span class="alert alert-danger">
                                <strong>{{ $errors->first('value4') }}</strong>
                            </span>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td style="width:25%"></td>
                        <td><button type="submit" class="btn btn-default waves-effect waves-light form-control">تعديل</button></td>
                    </tr>
                </tbody>
                {!! Form::close() !!}
                @else
                {{Form::open(['method'=>'POST','action' => ['App\Http\Controllers\Admin\AboutController@store'], 'files' => true])}}
                <tbody>
                    <tr>
                        <td>الوصف</td>
                        <td>
                            <textarea name="description" class="form-control"></textarea>
                            @if ($errors->has('description'))
                            <span class="alert alert-danger">
                                <strong>{{ $errors->first('description') }}</strong>
                            </span>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td>السياسات</td>
                        <td>
                            <textarea name="policy" class="form-control"></textarea>
                            @if ($errors->has('policy'))
                            <span class="alert alert-danger">
                                <strong>{{ $errors->first('policy') }}</strong>
                            </span>
                            @endif
                        </td>
                    </tr>

                    <tr>
                        <td>الشروط</td>
                        <td>
                            <textarea name="terms" class="form-control"></textarea>
                            @if ($errors->has('terms'))
                            <span class="alert alert-danger">
                                <strong>{{ $errors->first('terms') }}</strong>
                            </span>
                            @endif
                        </td>
                    </tr>

                    <tr>
                        <td>عنوان الاحصائية الأولي</td>
                        <td>
                            <input type="text" name="title1" class="form-control">
                            @if ($errors->has('title1'))
                            <span class="alert alert-danger">
                                <strong>{{ $errors->first('title1') }}</strong>
                            </span>
                            @endif
                        </td>
                    </tr>

                    <tr>
                        <td>قيمة الاحصائية الاولي</td>
                        <td>
                            <input type="text" name="value1" class="form-control">
                            @if ($errors->has('value1'))
                            <span class="alert alert-danger">
                                <strong>{{ $errors->first('value1') }}</strong>
                            </span>
                            @endif
                        </td>
                    </tr>

                    <tr>
                        <td>عنوان الاحصائية الثانية</td>
                        <td>
                            <input type="text" name="title2" class="form-control">
                            @if ($errors->has('title2'))
                            <span class="alert alert-danger">
                                <strong>{{ $errors->first('title2') }}</strong>
                            </span>
                            @endif
                        </td>
                    </tr>

                    <tr>
                        <td>قيمة الاحصائية الثانية</td>
                        <td>
                            <input type="text" name="value2" class="form-control">
                            @if ($errors->has('value2'))
                            <span class="alert alert-danger">
                                <strong>{{ $errors->first('value2') }}</strong>
                            </span>
                            @endif
                        </td>
                    </tr>

                    <tr>
                        <td>عنوان الاحصائية الثالثة</td>
                        <td>
                            <input type="text" name="title3" class="form-control">
                            @if ($errors->has('title3'))
                            <span class="alert alert-danger">
                                <strong>{{ $errors->first('title3') }}</strong>
                            </span>
                            @endif
                        </td>
                    </tr>

                    <tr>
                        <td>قيمة الاحصائية الثالثة</td>
                        <td>
                            <input type="text" name="value3" class="form-control">
                            @if ($errors->has('value3'))
                            <span class="alert alert-danger">
                                <strong>{{ $errors->first('value3') }}</strong>
                            </span>
                            @endif
                        </td>
                    </tr>

                    <tr>
                        <td>عنوان الاحصائية الرابعة</td>
                        <td>
                            <input type="text" name="title4" class="form-control">
                            @if ($errors->has('title4'))
                            <span class="alert alert-danger">
                                <strong>{{ $errors->first('title4') }}</strong>
                            </span>
                            @endif
                        </td>
                    </tr>

                    <tr>
                        <td>قيمة الاحصائية الرابعة</td>
                        <td>
                            <input type="text" name="value4" class="form-control">
                            @if ($errors->has('value4'))
                            <span class="alert alert-danger">
                                <strong>{{ $errors->first('value4') }}</strong>
                            </span>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td style="width:25%"></td>
                        <td><button type="submit" class="btn btn-default waves-effect waves-light form-control">حفظ</button></td>
                    </tr>
                </tbody>
                {!! Form::close() !!}
                @endif
            </table>
        </div>
    </div><!-- end col -->
</div>

@endsection
