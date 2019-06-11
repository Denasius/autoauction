@extends('admin.layout')

@section('content')

<!--main content start-->
    <section id="main-content">
      <section class="wrapper">
        <div class="row">
          <div class="col-lg-12">
            <h3 class="page-header"><i class="fa fa-table"></i> Страница</h3>
            <ol class="breadcrumb">
              <li><i class="fa fa-home"></i><a href="{{route('admin')}}">Главная</a></li>
              <li><i class="fa fa-table"></i>Страницы</li>
            </ol>
          </div>
        </div>
        <!-- page start-->
        <div class="row">
          <div class="col-lg-12">
          <div class="add-button" style="margin-bottom:20px;">
          	<a class="btn btn-success" href="{{route('pages.create')}}" title="Добавить диск">Добавить</a>
          </div>
      
            <section class="panel">              
              
              <header class="panel-heading">
                Список страниц
              </header>

              <table class="table table-striped table-advance table-hover">
                <tbody>


                  <tr>
                    <th><i class="icon_profile"></i> ID</th>
                    <th><i class="icon_calendar"></i> Название</th>
                    <th><i class="icon_calendar"></i> Категория</th>
                    <th style="text-align: right;"><i class="icon_cogs"></i> Действия</th>
                  </tr>
                  @foreach ($posts as $post)
	                  <tr>
	                    <td>{{$post->id}}</td>
                      <td>{{$post->title}}</td>
                      <td>{{$post->cat_title}}</td>
	                    <td style="text-align: right;">
	                      <div class="btn-group">
	                        <a class="btn btn-primary" href="{{route('pages.edit', $post->id)}}"><i class="icon_pencil-edit"></i></a>
                          {{Form::open(['route'=>['pages.destroy', $post->id], 'method'=>'delete', 'class'=>'inline_block'])}}
	                           <button type="submit" class="btn btn-danger" data-attr="delete"><i class="icon_close_alt2"></i></button>
                          {{Form::close()}}
	                      </div>
	                    </td>
	                  </tr>
                  @endforeach
                  
                </tbody>
              </table>
            </section>
          </div>
        </div>
        <!-- page end-->
      </section>
    </section>
    <!--main content end-->

@endsection