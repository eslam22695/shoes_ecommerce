@extends('layouts.admin')

@section('styles')
<!-- Plugins css-->
<link href="{{asset('admin_assets/plugins/bootstrap-tagsinput/css/bootstrap-tagsinput.css')}}" rel="stylesheet" />
<link href="{{asset('admin_assets/plugins/switchery/css/switchery.min.css')}}" rel="stylesheet" />
<link href="{{asset('admin_assets/plugins/multiselect/css/multi-select.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('admin_assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('admin_assets/plugins/bootstrap-select/css/bootstrap-select.min.css')}}" rel="stylesheet" />
<link href="{{asset('admin_assets/plugins/bootstrap-touchspin/css/jquery.bootstrap-touchspin.min.css')}}" rel="stylesheet" />
<link href="{{asset('admin_assets/plugins/bootstrap-table/css/bootstrap-table.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('admin_assets/plugins/custombox/css/custombox.css')}}" rel="stylesheet">
@endsection

@section('content')
<!-- Page-Title -->
<div class="row">
    <div class="main-title-00">
        <a style="color: #fff;" href="{{route('admin.home')}}">الرئيسية</a>
        <a style="color: #fff;" href="{{route('admin.address.index',$record->user_id??$user_id)}}">العناوين </a>
        <a style="color: #36404a;"> إضافة </a>
    </div>

    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
<div class="row">
    <div class="col-12">

        @php
        if (empty($record)) {
        $route = 'admin.address.store';
        } else {
        $route = [ 'admin.address.update', $record->id];
        }
        @endphp
        {!! Form::open(['route' => $route , 'files' => true]) !!}
        @csrf
        <div class="card-box">
            <h4 class="header-title m-t-0 m-b-20">اضافه عنوان</h4>
            <input type="hidden" name="user_id" value="{{ $record->user_id??$user_id }}">

            <div class="form-group">
                <label>
                    City Name
                </label>
                {!! Form::select('city_id', $city, $record->city_id??null, ['class' => 'form-control', 'placeholder' => ' اختر المدينة' ,'id' =>'city']) !!}

            </div>
            <div class="form-group">
                <label>
                    district Name
                </label>
                <select name="district_id" id="district" class="form-control">
                    @if($districts)
                        @foreach($districts as $district)
                        <option value="{{$district->id}}" {{$district->id == $record->district_id ? 'selected' : ''}}>{{$district->name}}</option>
                        @endforeach
                    @endif
                    
                </select>
            </div>
            <div class="form-group">
                <label>
                    street_name
                </label>

                {!! Form::text('street', $record->street??null ,['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                <label>
                    building_number
                </label>

                {!! Form::text('building', $record->building??null ,['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                <label>
                    floor_num
                </label>

                {!! Form::text('floor', $record->floor??null ,['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                <label>
                    apartment_num
                </label>
                {!! Form::text('apartment', $record->apartment??null ,['class' => 'form-control']) !!}
            </div>
        </div>
        <button type="submit" class="btn btn-default waves-effect waves-light form-control">حفظ</button>
    </div>
    {!! Form::close() !!}
</div><!-- end col -->
</div>

@endsection
@section('scripts')
<script>
    $(document).ready(function() {
        $('#city').on('change', function() {
            var city = this.value;
            $("#district").html('');
            $.ajax({

                url: "{{url('admin/fetch-districts')}}",
                type: "POST",
                data: {
                    city_id: city,
                    _token: '{{csrf_token()}}'
                },
                dataType: 'json',

                success: function(res) {
                    $('#district').html('<option value="">إختار المنطقة </option>');
                    $.each(res.districts, function(key, value) {
                        $("#district").append('<option value="' + value
                            .id + '">' + value.name + '</option>');
                    });
                }

            });
        });
    });
</script>
<script src="{{ mix('js/app.js') }}"></script>
@endsection