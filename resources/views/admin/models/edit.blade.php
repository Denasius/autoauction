@extends('admin.layout')

@section('content')

  <!--main content start-->
  <section id="main-content">
    <section class="wrapper">

      @include('admin.common.breadcrumb_header')

      <div class="row">
        @include('admin.errors')
        <div class="col-sm-12">
          <section class="panel">

            <div class="panel-body">
              {{Form::open(['route'=>['models.update', $item_info->id], 'method'=>'put',  'class' => 'form-horizontal'])}}
              <input type="hidden" name="id" value="{{$item_info->id}}">

              <div class="form-group">
                <label class="col-sm-2 control-label">Название</label>
                <div class="col-sm-10">
                  <input class="form-control m-bot15" type="text" name="title" placeholder="Название"
                         value="{{$item_info->title}}">
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Бренд</label>
                <div class="col-sm-10">
                  {{ Form::select('brand_id', $brands, $item_info->brand_id, ['class'=>'form-control m-bot15'])}}
                </div>
              </div>

              <div class="form-group">
                <div class="btn-create text-right col-sm-12">
                  <button type="submit" class="btn btn-add" title="Обновить">Обновить</button>
                </div>
              </div>

              {{Form::close()}}
            </div>
          </section>
        </div>
      </div>
      <!-- page end-->
    </section>
  </section>
  <!--main content end-->

@endsection