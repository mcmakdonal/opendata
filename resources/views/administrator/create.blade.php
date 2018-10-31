@extends('master.layout')
@section('title', $title )
@section('header', $header )

@section('content')
<section class="">
    <div class="row">
        <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12" style="">
            <div class="panel panel-primary box_gradient" style="padding-top:10px;padding-bottom: 10px;">
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
                {!! Form::open(['url' => '/administrator','class' => 'form-auth-small', 'method' => 'post','files' => true]) !!}
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group required">
                            <label for="admin_type" class="control-label">บทบาท : </label>
                            <select class="form-control" name="admin_type">
                                <option value="A">ผู้ดูแลระบบ</option>
                                <option value="O">ผู้ดูแลหน่วยงาน</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group required">
                            <label for="admin_ogz" class="control-label">หน่วยงาน : </label>
                            <select class="form-control" name="admin_ogz">
                                @foreach($ogz as $k => $v)
                                
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group required">
                            <label for="first_name" class="control-label">ชื่อ : </label>
                            <input type="text" class="form-control" id="first_name" name="first_name" value="" placeholder="ชื่อ" required>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group required">
                            <label for="last_name" class="control-label">นามสกุล : </label>
                            <input type="text" class="form-control" id="last_name" name="last_name" value="" placeholder="นามสกุล" required>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group required">
                            <label for="username" class="control-label">ชื่อผู้ใช้งานระบบ : </label>
                            <input type="text" class="form-control" id="username" name="username" value="" placeholder="ชื่อผู้ใช้งานระบบ" required>
                            <span class="label label-danger" style="display:none;">ชื่อผู้ใช้งานระบบนี้ถูกใช้ไปแล้ว</span>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group required">
                            <label for="password" class="control-label">รหัสผ่าน : </label>
                            <input type="password" class="form-control" id="password" name="password" value="" placeholder="รหัสผ่าน" required>
                        </div>
                    </div>

                    <div class="col-md-12 text-right">
                        <button type="submit" class="btn btn-success">สร้าง ผู้ดูแลระบบ</button>
                        <?= link_to('/administrator', $title = 'ยกเลิก', ['class' => 'btn btn-warning'], $secure = null); ?>
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
</section>
@endsection