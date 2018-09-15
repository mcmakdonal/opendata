@extends('master.layout')
@section('title', $title )
@section('header', $header )

@section('content')
<section class="">
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    {!! Form::open(['url' => '/dataset/pre_new_resource','class' => 'form-auth-small', 'method' => 'post','files' => true]) !!}
    @csrf
        <div class="row" style="margin-bottom: 10px;">
            <div class="col-md-6">
                <button type="button" class="btn btn-block btn-success">1. Create dataset</button>
            </div>
            <div class="col-md-6">
                <button type="button" class="btn btn-block btn-success" style="opacity : 0.5">2. Add data</button>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="title" class="control-label">ชื่อ Dataset : </label>
                    <input type="text" class="form-control" id="dts_title" name="dts_title" value="" placeholder="ชื่อ Dataset" required>
                </div>
            </div>

            <div class="col-md-12">
                <div class="form-group">
                    <label for="URL" class="control-label">Url : </label>
                    <div class="input-group">
						<span class="input-group-addon">/dataset/page/</span>
						<input type="text" name="dts_url" id="dts_url" class="form-control" placeholder="my-dataset">
					</div>
                </div>
            </div>

            <div class="col-md-12">
                <div class="form-group">
                    <label for="description" class="control-label">รายละเอียด : </label>
                    <textarea class="form-control" id="dts_description" name="dts_description" rows="3" style="resize : none;"></textarea>
                </div>
            </div>


            <div class="col-md-12">
                <div class="form-group">
                    <label for="dts_scope_geo" class="control-label">ขอบเขตภูมิศาสตร์ : </label>
                    <input type="text" class="form-control" id="dts_scope_geo" name="dts_scope_geo" value="" placeholder="ขอบเขตภูมิศาสตร์" required>
                </div>
            </div>

            <div class="col-md-12">
                <div class="form-group">
                    <label for="dts_tag" class="control-label">ป้ายกำกับ : </label>
                    <input type="text" class="form-control tag-input" id="dts_tag" name="dts_tag" value="" placeholder="ป้ายกำกับ">
                    <span class="label label-warning">ใส่คำที่ต้องการจากนั้นกด enter</span>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="dts_contact_name" class="control-label">ชื่อผู้ใช้ข้อมูล : </label>
                    <input type="text" class="form-control" id="dts_contact_name" name="dts_contact_name" value="" placeholder="ชื่อผู้ใช้ข้อมูล" required>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="dts_contact_email" class="control-label">อีเมลผู้ให้ข้อมูล : </label>
                    <input type="email" class="form-control" id="dts_contact_email" name="dts_contact_email" value="" placeholder="อีเมลผู้ให้ข้อมูล" required>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="dts_permission" class="control-label">สิทธิ์ในการเข้าถึงข้อมูล : </label>
                    <input type="text" class="form-control" id="dts_permission" name="dts_permission" value="" placeholder="สิทธิ์ในการเข้าถึงข้อมูล" required>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="dts_frequent" class="control-label">ความถี่ในการปรับปรุง : </label>
                    <select class="form-control use-select2" name="dts_frequent" id="dts_frequent" required>
                        @foreach ($get_frequent as $k => $v )
                            <option value="{{$k}}">{{$v}}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="col-md-12">
                <div class="form-group">
                    <hr style="display:none;" />
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="" class="control-label">License : </label>
                    <select class="form-control use-select2" name="lcs_id" id="lcs_id" required>
                        @foreach($get_lcs as $k => $v)
                            <option value="{{ $v->lcs_id }}">{{ $v->license }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="" class="control-label">Organization : </label>
                    <select class="form-control use-select2" name="ogz_id" id="ogz_id" required>
                        @foreach($get_ogz as $k => $v)
                            <option value="{{ $v->ogz_id }}" {{ ($v->ogz_url == $lock_ogz)? "selected" : "" }} >{{ $v->ogz_title }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="" class="control-label">Categories : </label>
                    <select class="form-control use-select2" name="cat_id" id="cat_id" required>
                        @foreach($get_cat as $k => $v)
                            <option value="{{ $v->cat_id }}" >{{ $v->cat_title }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="" class="control-label">สถานะ : </label>
                    <select class="form-control use-select2" name="dts_status" id="dts_status">
                        <option value="pb">Public</option>
                        <option value="pv">Private</option>
                    </select>
                </div>
            </div>

            <div class="col-md-12 text-right">
                <button type="submit" class="btn btn-success">Create Dataset</button>
                <?=link_to('/dataset', $title = 'Cancel', ['class' => 'btn btn-warning'], $secure = null);?>
            </div>
        </div>
    {!! Form::close() !!}
</section>
@endsection