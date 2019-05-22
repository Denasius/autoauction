@extends('admin.layout')

@section('content')

<!--main content start-->
    <section id="main-content">
      <section class="wrapper">
        <div class="row">
          <div class="col-lg-12">
            <h3 class="page-header"><i class="fa fa-table"></i> Марка автомобиля</h3>
            <ol class="breadcrumb">
              <li><i class="fa fa-home"></i><a href="{{route('admin')}}">Главная</a></li>
              <li><i class="fa fa-table"></i>Марка авто</li>
            </ol>
          </div>
        </div>
        <!-- page start-->
        <div class="row">
          <div class="col-lg-12">
          <div class="add-button" style="margin-bottom:20px;">
          	<a class="btn btn-success" href="{{route('brands.create')}}" title="Добавить категорию">Добавить</a>
          </div>
          @if(! empty( $brands ))
            <section class="panel">              
              
              <header class="panel-heading">
                Список марок авто
              </header>

              <table class="table table-striped table-advance table-hover">
                <tbody>


                  <tr>
                    <th><i class="icon_profile"></i> ID</th>
                    <th><i class="icon_calendar"></i> Название</th>
                    <th style="text-align: right;"><i class="icon_cogs"></i> Действия</th>
                  </tr>

                  @foreach ($brands as $brand)
	                  <tr>
	                    <td>{{$brand->id}}</td>
	                    <td>{{$brand->title}}</td>
	                    <td style="text-align: right;">
	                      <div class="btn-group">
	                        <a class="btn btn-primary" href="{{route('brands.edit', $brand->id)}}"><i class="icon_pencil-edit"></i></a>
                          {{Form::open(['route'=>['brands.destroy', $brand->id], 'method'=>'delete', 'class'=>'inline_block'])}}
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
	                <h1>Список марок авто пуст</h1>
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