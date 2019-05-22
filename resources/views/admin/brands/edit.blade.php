@extends('admin.layout')

@section('content')

<!--main content start-->
    <section id="main-content">
      <section class="wrapper">
        <div class="row">
          <div class="col-lg-12">
            <h3 class="page-header"><i class="fa fa-file-text-o"></i> Редактирование марки автомобиля</h3>
            <ol class="breadcrumb">
              <li><i class="fa fa-home"></i><a href="{{route('admin')}}">Главная</a></li>
              <li><i class="fa fa-table"></i><a href="{{route('brands.index')}}">Марки авто</a></li>
              <li><i class="fa fa-file-text-o"></i>Изменить марку авто</li>
            </ol>
          </div>
        </div>
        <div class="row">
        @include('admin.errors')
          <div class="col-lg-12">
            <section class="panel">
              <header class="panel-heading">
                Изменение марки авто
              </header>
              <div class="panel-body">
                {{Form::open(['route'=>['brands.update', $brand->id], 'method'=>'put'])}}
                  
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Название</label>
                    <div class="col-sm-10" style="text-align: right;">
                      <input class="form-control input-lg m-bot15" type="text" name="title" placeholder="Название марки автомобиля" value="{{$brand->title}}">
	                  <div class="btn-create" style="margin-top: 20px;">
	                  	<a class="btn btn-info" href="{{route('brands.index')}}" title="Назад">Назад</a>
	                  	<button type="submit" class="btn btn-warning" href="{{route('brands.create')}}" title="Изменить марку автомобиля">Изменить марку авто</button>
	                  </div>
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