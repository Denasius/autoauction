@extends('admin.layout')

@section('content')

<!--main content start-->
    <section id="main-content">
      <section class="wrapper">
        <div class="row">
          <div class="col-lg-12">
            <h3 class="page-header"><i class="fa fa-table"></i> Привод</h3>
            <ol class="breadcrumb">
              <li><i class="fa fa-home"></i><a href="{{route('admin')}}">Главная</a></li>
              <li><i class="fa fa-table"></i>Привод</li>
            </ol>
          </div>
        </div>
        <!-- page start-->
        <div class="row">
          <div class="col-lg-12">
          <div class="add-button" style="margin-bottom:20px;">
          	<a class="btn btn-success" href="{{route('drives.create')}}" title="Добавить привод">Добавить</a>
          </div>
          @if(! empty( $drives ))
            <section class="panel">              
              
              <header class="panel-heading">
                Список тегов
              </header>

              <table class="table table-striped table-advance table-hover">
                <tbody>


                  <tr>
                    <th><i class="icon_profile"></i> ID</th>
                    <th><i class="icon_calendar"></i> Название</th>
                    <th style="text-align: right;"><i class="icon_cogs"></i> Действия</th>
                  </tr>

                  @foreach ($drives as $drive)
	                  <tr>
	                    <td>{{$drive->id}}</td>
	                    <td>{{$drive->title}}</td>
	                    <td style="text-align: right;">
	                      <div class="btn-group">
	                        <a class="btn btn-primary" href="{{route('drives.edit', $drive->id)}}"><i class="icon_pencil-edit"></i></a>
                          {{Form::open(['route'=>['drives.destroy', $drive->id], 'method'=>'delete', 'class'=>'inline_block'])}}
	                           <button type="submit" class="btn btn-danger" data-attr="delete"><i class="icon_close_alt2"></i></button>
                          {{Form::close()}}
	                      </div>
	                    </td>
	                  </tr>
                  @endforeach
                  
                </tbody>
              </table>
            </section>
          @else
          	<section class="panel">
          		<header class="panel-heading">
	                <h1>Список привода пуст</h1>
	              </header>
          	</section>
          @endif
          </div>
        </div>
        <!-- page end-->
      </section>
    </section>
    <!--main content end-->

@endsection