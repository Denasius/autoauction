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
                {{Form::open(['route'=>'tags.store'])}}
                  
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Название</label>
                    <div class="col-sm-10" style="text-align: right;">
                      <input type="text" name="title" class="form-control round-input" placeholder="Введите название тега">
	                  <div class="btn-create" style="margin-top: 20px;">
	                  	<button type="submit" class="btn btn-success" title="Добавить тег">Создать тег</button>
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