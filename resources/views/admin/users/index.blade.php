@extends('admin.layout')

@section('content')

<!--main content start-->
    <section id="main-content">
      <section class="wrapper">
        <div class="row">
          <div class="col-lg-12">
            <h3 class="page-header"><i class="fa fa-user-md"></i> Пользователи</h3>
            <ol class="breadcrumb">
              <li><i class="fa fa-home"></i><a href="{{route('admin')}}">Главная</a></li>
              <li><i class="icon_documents_alt"></i>Все пользователи</li>
            </ol>
          </div>
        </div>
        <div class="row">
        <!-- page start-->
        <div class="row">
        	@include('admin.errors')
          <div class="col-lg-12">
            <section class="panel">
              <header class="panel-heading tab-bg-info">
                <ul class="nav nav-tabs">
                  <li class="active">
                    <a href="{{route('users.index')}}">
                                          <i class="icon-home"></i>
                                          Все пользователи
                                      </a>
                  </li>
                  <li>
                    <a href="{{route('users.create')}}">
                                          <i class="icon-user"></i>
                                           Создать пользователя
                                      </a>
                  </li>
                </ul>
              </header>
              <div class="panel-body">
              	{{-- Все пользователи --}}
                <div>
                  <div id="recent-activity" class="tab-pane active">
                    <div class="profile-activity">
                      <table class="table table-striped table-advance table-hover">
		                <tbody>
		                  <tr>
		                    <th><i class="icon_profile"></i> ID</th>
		                    <th><i class="icon_calendar"></i> Имя</th>
		                    <th><i class="icon_mail_alt"></i> Email</th>
		                    <th><i class="icon_pin_alt"></i> Город</th>
		                    <th class="td_image"><i class="icon_mobile"></i> Аватар</th>
		                    <th style="text-align: center;"><i class="icon_cogs"></i> Действия</th>
		                  </tr>
		                  @foreach( $users as $user )
			                  <tr>
			                    <td>{{$user->id}}</td>
			                    <td>{{$user->name}}</td>
			                    <td>{{$user->email}}</td>
			                    <td>{{$user->town}}</td>
			                    <td class="td_image">
			                    	<img class="uploaded_image_index" src="{{$user->getImage()}}" alt="Avatar">
			                    </td>
			                    <td style="text-align: center;">
			                      <div class="btn-group">
			                        
			                        <a class="btn btn-info" href="{{route('users.edit', $user->id)}}"><i class="icon_pencil-edit"></i></a>
			                        {{Form::open(['route'=>['users.destroy', $user->id], 'method'=>'delete', 'class'=>'inline_block'])}}
			                           <button type="submit" class="btn btn-danger" data-attr="delete"><i class="icon_close_alt2"></i></button>
		                          {{Form::close()}}
			                      </div>
			                    </td>
			                  </tr>
		                  @endforeach

		                  
		                </tbody>
		              </table>

                    </div>
                </div>
              </div>
            </section>
          </div>
        </div>

        <!-- page end-->
      </section>
    </section>
    <!--main content end-->

@endsection