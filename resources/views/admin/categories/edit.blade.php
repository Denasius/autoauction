@extends('admin.layout')

@section('content')

<!--main content start-->
    <section id="main-content">
      <section class="wrapper">
        <div class="row">
          <div class="col-lg-12">
            <h3 class="page-header"><i class="fa fa-file-text-o"></i> Редактирование категории</h3>
            <ol class="breadcrumb">
              <li><i class="fa fa-home"></i><a href="{{route('admin')}}">Главная</a></li>
              <li><i class="fa fa-table"></i><a href="{{route('categories.index')}}">Категории</a></li>
              <li><i class="fa fa-file-text-o"></i>Изменить категорию</li>
            </ol>
          </div>
        </div>
        <div class="row">
        @include('admin.errors')
          <div class="col-lg-12">
            <section class="panel">
              <header class="panel-heading">
                Изменение категории
              </header>
              <div class="panel-body">
                {{Form::open(['route'=>['categories.update', $category->id], 'method'=>'put'])}}
                  
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Название</label>
                    <div class="col-sm-10" style="text-align: right;">
                      <input class="form-control input-lg m-bot15" type="text" name="title" placeholder="Название категории" value="{{$category->title}}">
	                  <div class="btn-create" style="margin-top: 20px;">
	                  	<a class="btn btn-info" href="{{route('categories.index')}}" title="Назад">Назад</a>
	                  	<button type="submit" class="btn btn-warning" href="{{route('categories.create')}}" title="Изменить категорию">Изменить категорию</button>
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