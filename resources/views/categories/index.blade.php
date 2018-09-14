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
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    <div class="row">
        <div class="col-md-12" style="margin-bottom: 10px;">
            <?=link_to('#', $title = 'Add Categories', ['class' => 'btn btn-primary', 'onclick' => 'manage_cat("add")'], $secure = null);?>
        </div>
    </div>
    <table class="table table-bordered datatable">
        <thead>
          <tr>
            <th style="width: 5%;">#</th>
            <th>Categories Title</th>
            <th style="width: 10%;">Edit</th>
            <th style="width: 10%;">Delete</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($get_cat as $k => $v)
            <tr>
                <td>{{$k + 1}}</td>
                <td id="cat_title_{{$v->cat_id}}">{{$v->cat_title}}</td>
                <td>
                    <button onclick="manage_cat('edit','{{$v->cat_id}}')" class="btn btn-warning">Edit</button>
                </td>
                <td>
                    <button onclick="manage_cat('del','{{$v->cat_id}}')" class="btn btn-danger" data="">Delete</button>
                </td>
            </tr>
            @endforeach
        </tbody>
      </table>
</section>
@include('shared.modal-cat')
@endsection