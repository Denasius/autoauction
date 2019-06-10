@extends('admin.layout')

@section('content')

	 <!--main content start-->
    <section id="main-content">
      <section class="wrapper">
        <div class="row">
          <div class="col-lg-12">
            <h3 class="page-header"><i class="fa fa-file-text-o"></i> Редактировать страницу  </h3>
            <ol class="breadcrumb">
              <li><i class="fa fa-home"></i><a href="index.html">Главная</a></li>
              <li><i class="icon_document_alt"></i>Редактировать страницу</li>
            </ol>
          </div>
        </div>
        <div class="row">
        	@include('admin.errors')
          <div class="col-lg-12">
            <section class="panel">
              <header class="panel-heading">
                Редактировать страницу
              </header>
              <div class="panel-body">
              	{{Form::open([
              		'route' => ['pages.update', $page->id],
              		'files' => true,
                  'method'  => 'put',
              		'class' => 'form-horizontal'
              	])}}

                <div class="form-group">
                  <label class="col-lg-2 control-label">Изображение</label>
                  <div class="col-lg-6">
                  <img style="max-width: 200px" src="{{$page->getImage()}}" alt="">
                  </div>
                </div>

              	<div class="form-group">
                  <label class="col-lg-2 control-label">Изображение</label>
                  <div class="col-lg-6">
                    <input type="file" name="image" id="image">
                  </div>
                </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Название</label>
                    <div class="col-sm-10">
                      <input type="text" name="title" class="form-control" placeholder="Название" value="{{$page->title}}">
                    </div>
                  </div>


                  <div class="form-group">
                    <label class="col-sm-2 control-label">Категория</label>
                    <div class="col-sm-10">
                	   {{ Form::select('category_id', 
                          $categories,
                          $page->category->id, 
                          ['class'=>'form-control m-bot15']) 
                    }}
                    </div>
                  </div>

                  <div class="form-group">
                      <label class="col-sm-2 control-label">Meta title</label>
                      <div class="col-sm-10">
                          <input type="text" name="meta_title" class="form-control" value="{{$page->meta_title}}">
                      </div>
                  </div>

                  <div class="form-group">
                      <label class="col-sm-2 control-label">Meta description</label>
                      <div class="col-sm-10">
                          <textarea type="text" name="meta_description" class="form-control">{{$page->meta_description}}</textarea>
                      </div>
                  </div>

                  <div class="form-group">
                    <label class="col-sm-2 control-label">Краткое описание</label>
                    <div class="col-sm-10">
                      <textarea type="text" name="short_descr" id="ckeditor1" class="form-control" placeholder="Краткое описание">{{$page->short_descr}}</textarea>
                    </div>
                    <script src="https://cdn.ckeditor.com/4.11.4/standard/ckeditor.js"></script>
                     <script type="text/javascript">
                       CKEDITOR.replace('ckeditor1');
                     </script>
                  </div>

                  <div class="form-group">
                    <label class="col-sm-2 control-label">Описание</label>
                    <div class="col-sm-10">
                      <textarea type="text" name="descr" id="ckeditor" class="form-control" placeholder="Описание">{{$page->descr}}</textarea>
                    </div>
                    <script src="https://cdn.ckeditor.com/4.11.4/standard/ckeditor.js"></script>
                     <script type="text/javascript">
                       CKEDITOR.replace('ckeditor');
                     </script>
                  </div>

	                 <div class="btn-create" style="margin-top: 20px; text-align: right;">
	                  	<button type="submit" class="btn btn-success" title="Обновить">Обновить</button>
	                  </div>
	              
                  </div>

                 
                {{Form::close()}}
              </div>
          </div>
        </div>
      </section>
    </section>
    <!--main content end-->

@endsection