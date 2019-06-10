@extends('admin.layout')

@section('content')

<!--main content start-->
    <section id="main-content">
      <section class="wrapper">
        <div class="row">
          <div class="col-lg-12">
            <h3 class="page-header"><i class="fa fa-file-text-o"></i> Добавление тега</h3>
            <ol class="breadcrumb">
              <li><i class="fa fa-home"></i><a href="{{route('admin')}}">Главная</a></li>
              <li><i class="fa fa-table"></i><a href="{{route('tags.index')}}">Теги</a></li>
              <li><i class="fa fa-file-text-o"></i>Добавить тег</li>
            </ol>
          </div>
        </div>
        <div class="row">
        	@include('admin.errors')
          <div class="col-lg-12">
            <section class="panel">
              <header class="panel-heading">
                Добавление тега
              </header>
              
              <div class="panel-body">
                {{Form::open(['route'=>'tags.store', 'class'=>'form-horizontal'])}}

                <div class="form-group">
                  <label class="col-lg-2 control-label">Название</label>
                  <div class="col-lg-6">
                    <input type="text" name="title" class="form-control" id="f-name" placeholder="Название типа атрибута" value="{{old('title')}}">
                  </div>
                </div>

                <div class="form-group">
                  <div class="col-lg-offset-2 col-lg-10">
                    <button type="submit" class="btn btn-primary">Создать</button>
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