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
            <h4 class="header-title m-t-0 m-b-20">الإعدادت </h4>

            <table class="table table-bordered table-striped">
                @if(isset($setting->id))
                {{Form::model($setting,['method'=>'PATCH','action' => ['App\Http\Controllers\Admin\SettingController@update',$setting->id], 'files' => true])}}

                <tbody>
                    <tr>
                        <td>الهاتف رقم 1</td>
                        <td>
                            <input type="text" name="phone1" class="form-control" value="<?php if(isset($setting->phone1)){echo $setting->phone1;} ?>">
                            @if ($errors->has('phone1'))
                            <span class="alert alert-danger">
                                <strong>{{ $errors->first('phone1') }}</strong>
                            </span>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td>الهاتف رقم 2</td>
                        <td>
                            <input type="text" name="phone2" class="form-control" value="<?php if(isset($setting->phone2)){echo $setting->phone2;} ?>">
                            @if ($errors->has('phone2'))
                            <span class="alert alert-danger">
                                <strong>{{ $errors->first('phone2') }}</strong>
                            </span>
                            @endif
                        </td>
                    </tr>

                    <tr>
                        <td>البريد الألكتروني 1</td>
                        <td>
                            <input type="email" name="email1" class="form-control" value="<?php if(isset($setting->email1)){echo $setting->email1;} ?>">
                            @if ($errors->has('email1'))
                            <span class="alert alert-danger">
                                <strong>{{ $errors->first('email1') }}</strong>
                            </span>
                            @endif
                        </td>
                    </tr>

                    <tr>
                        <td>البريد الألكتروني 2</td>
                        <td>
                            <input type="email" name="email2" class="form-control" value="<?php if(isset($setting->email2)){echo $setting->email2;} ?>">
                            @if ($errors->has('email2'))
                            <span class="alert alert-danger">
                                <strong>{{ $errors->first('email2') }}</strong>
                            </span>
                            @endif
                        </td>
                    </tr>

                    <tr>
                        <td>فيسبوك</td>
                        <td>
                            <input type="text" name="facebook" class="form-control" value="<?php if(isset($setting->facebook)){echo $setting->facebook;} ?>">
                            @if ($errors->has('facebook'))
                            <span class="alert alert-danger">
                                <strong>{{ $errors->first('facebook') }}</strong>
                            </span>
                            @endif
                        </td>
                    </tr>

                    <tr>
                        <td>تويتر</td>
                        <td><input type="text" class="form-control" name="twitter" value=<?php if(isset($setting->twitter)){echo $setting->twitter;} ?>></td>
                        @if ($errors->has('twitter'))
                        <div class="alert alert-danger">
                            <strong>{{ $errors->first('twitter') }}</strong>
                        </div>
                        @endif
                    </tr>

                    <tr>
                        <td>يوتيوب</td>
                        <td><input type="text" class="form-control" name="youtube" value="<?php if(isset($setting->youtube)){echo $setting->youtube;} ?>"></td>
                        @if ($errors->has('youtube'))
                        <div class="alert alert-danger">
                            <strong>{{ $errors->first('youtube') }}</strong>
                        </div>
                        @endif
                    </tr>
                    <tr>
                        <td>انستجرام</td>
                        <td><input type="text" class="form-control" name="instagram" value="<?php if(isset($setting->instagram)){echo $setting->instagram;} ?>"></td>
                        @if ($errors->has('instagram'))
                        <div class="alert alert-danger">
                            <strong>{{ $errors->first('instagram') }}</strong>
                        </div>
                        @endif
                    </tr>

                    <tr>
                        <td>العنوان 1 </td>
                        <td>
                            <input type="text" name="address1" class="form-control" value="<?php if(isset($setting->address1)){echo $setting->address1;} ?>">
                            @if ($errors->has('address1'))
                            <span class="alert alert-danger">
                                <strong>{{ $errors->first('address1') }}</strong>
                            </span>
                            @endif
                        </td>
                    </tr>

                    <tr>
                        <td>العنوان 2 </td>
                        <td>
                            <input type="text" name="address2" class="form-control" value="<?php if(isset($setting->address2)){echo $setting->address2;} ?>">
                            @if ($errors->has('address2'))
                            <span class="alert alert-danger">
                                <strong>{{ $errors->first('address2') }}</strong>
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
                {{Form::open(['method'=>'POST','action' => ['App\Http\Controllers\Admin\SettingController@store'], 'files' => true])}}
                <tbody>
                    <tr>
                        <td>الهاتف رقم 1</td>
                        <td>
                            <input name="phone1" class="form-control"><?php if(isset($setting->phone1)){echo $setting->phone1;} ?></textarea>
                            @if ($errors->has('phone1'))
                            <span class="alert alert-danger">
                                <strong>{{ $errors->first('map') }}</strong>
                            </span>
                            @endif
                        </td>
                    </tr>

                    <tr>
                        <td>الهاتف رقم 2</td>
                        <td>
                            <input name="phone2" class="form-control"><?php if(isset($setting->phone2)){echo $setting->phone2;} ?></textarea>
                            @if ($errors->has('phone2'))
                            <span class="alert alert-danger">
                                <strong>{{ $errors->first('phone2') }}</strong>
                            </span>
                            @endif
                        </td>
                    </tr>

                    <tr>
                        <td>البريد الألكتروني 1</td>
                        <td>
                            <input type="email" name="email1" class="form-control" value="<?php if(isset($setting->email1)){echo $setting->email1;} ?>">
                            @if ($errors->has('email1'))
                            <span class="alert alert-danger">
                                <strong>{{ $errors->first('email1') }}</strong>
                            </span>
                            @endif
                        </td>
                    </tr>

                    <tr>
                        <td>البريد الألكتروني 2</td>
                        <td>
                            <input type="email" name="email2" class="form-control" value="<?php if(isset($setting->email2)){echo $setting->email2;} ?>">
                            @if ($errors->has('email2'))
                            <span class="alert alert-danger">
                                <strong>{{ $errors->first('email2') }}</strong>
                            </span>
                            @endif
                        </td>
                    </tr>

                    <tr>
                        <td>فيسبوك</td>
                        <td>
                            <input type="text" name="facebook" class="form-control" value="<?php if(isset($setting->facebook)){echo $setting->facebook;} ?>">
                            @if ($errors->has('facebook'))
                            <span class="alert alert-danger">
                                <strong>{{ $errors->first('facebook') }}</strong>
                            </span>
                            @endif
                        </td>
                    </tr>

                    <tr>
                        <td>تويتر</td>
                        <td><input type="text" class="form-control" name="twitter" value=<?php if(isset($setting->twitter)){echo $setting->twitter;} ?>></td>
                        @if ($errors->has('twitter'))
                        <div class="alert alert-danger">
                            <strong>{{ $errors->first('twitter') }}</strong>
                        </div>
                        @endif
                    </tr>

                    <tr>
                        <td>يوتيوب</td>
                        <td><input type="text" class="form-control" name="youtube" value=<?php if(isset($setting->youtube)){echo $setting->youtube;} ?>></td>
                        @if ($errors->has('youtube'))
                        <div class="alert alert-danger">
                            <strong>{{ $errors->first('youtube') }}</strong>
                        </div>
                        @endif
                    </tr>

                    <tr>
                        <td>انستجرام</td>
                        <td><input type="text" class="form-control" name="instagram" value=<?php if(isset($setting->instagram)){echo $setting->instagram;} ?>></td>
                        @if ($errors->has('instagram'))
                        <div class="alert alert-danger">
                            <strong>{{ $errors->first('instagram') }}</strong>
                        </div>
                        @endif
                    </tr>

                    <tr>
                        <td>واتساب</td>
                        <td><input type="text" class="form-control" name="whatsapp" value=<?php if(isset($setting->whatsapp)){echo $setting->whatsapp;} ?>></td>
                        @if ($errors->has('whatsapp'))
                        <div class="alert alert-danger">
                            <strong>{{ $errors->first('whatsapp') }}</strong>
                        </div>
                        @endif
                    </tr>

                    <tr>
                        <td>لينكيد ان</td>
                        <td><input type="text" class="form-control" name="linkedin" value=<?php if(isset($setting->linkedin)){echo $setting->linkedin;} ?>></td>
                        @if ($errors->has('linkedin'))
                        <div class="alert alert-danger">
                            <strong>{{ $errors->first('linkedin') }}</strong>
                        </div>
                        @endif
                    </tr>

                    <tr>
                        <td>العنوان 1 </td>
                        <td>
                            <input type="text" name="address1" class="form-control" value="<?php if(isset($setting->address1)){echo $setting->address1;} ?>">
                            @if ($errors->has('address1'))
                            <span class="alert alert-danger">
                                <strong>{{ $errors->first('address1') }}</strong>
                            </span>
                            @endif
                        </td>
                    </tr>

                    <tr>
                        <td>العنوان 2 </td>
                        <td>
                            <input type="text" name="address2" class="form-control" value="<?php if(isset($setting->address2)){echo $setting->address2;} ?>">
                            @if ($errors->has('address2'))
                            <span class="alert alert-danger">
                                <strong>{{ $errors->first('address2') }}</strong>
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
