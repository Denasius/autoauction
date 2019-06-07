@extends('admin.layout')

@section('content')

	@if ($user->role_id == 1)
		<!--main content start-->
		<section id="main-content">
	      <section class="wrapper">
	        <div class="row">
	          <div class="col-lg-12">
	            <h3 class="page-header"><i class="fa fa-user-md"></i> Профиль администратора</h3>
	            <ol class="breadcrumb">
	              <li><i class="fa fa-home"></i><a href="{{route('admin')}}">Главная</a></li>
	              <li><i class="icon_documents_alt"></i>Профиль</li>
	            </ol>
	          </div>
	        </div>
	        <div class="row">
	        	@include('admin.errors')
	          <!-- profile-widget -->
	          <div class="col-lg-12">
	            <div class="profile-widget profile-widget-info">
	              <div class="panel-body">
	                <div class="col-lg-2 col-sm-2">
	                  <h4>{{$user->name}}</h4>
	                  <div class="follow-ava">
	                    <img src="{{$user->getImage()}}" alt="{{$user->name}}">
	                  </div>
	                  <h6>Администратор</h6>
	                </div>
	                <div class="col-lg-4 col-sm-4 follow-info">
	                  <p>{{$user->town}}</p>
	                  <p>{{$user->email}}</p>
	                </div>
	                <div class="col-lg-2 col-sm-6 follow-info weather-category">
	                  <ul>
	                    <li class="active">

	                      <i class="fa fa-comments fa-2x"> </i><br> Contrary to popular belief, Lorem Ipsum is not simply
	                    </li>

	                  </ul>
	                </div>
	                <div class="col-lg-2 col-sm-6 follow-info weather-category">
	                  <ul>
	                    <li class="active">

	                      <i class="fa fa-bell fa-2x"> </i><br> Contrary to popular belief, Lorem Ipsum is not simply
	                    </li>

	                  </ul>
	                </div>
	                <div class="col-lg-2 col-sm-6 follow-info weather-category">
	                  <ul>
	                    <li class="active">

	                      <i class="fa fa-tachometer fa-2x"> </i><br> Contrary to popular belief, Lorem Ipsum is not simply
	                    </li>

	                  </ul>
	                </div>
	              </div>
	            </div>
	          </div>
	        </div>
	        <!-- page start-->
	        <div class="row">
	          <div class="col-lg-12">
	            <section class="panel">
	              <header class="panel-heading tab-bg-info">
	                <ul class="nav nav-tabs">
	                  <li class="active">
	                    <a href="#recent-activity">
	                                          <i class="icon-home"></i>
	                                          Редактировать профиль
	                                      </a>
	                  </li>
	                  
	                </ul>
	              </header>
	              <div class="panel-body">
	                <div class="tab-content">
	                 @if (session('status'))
	                 	<div class="alert alert-success">
	                 		{{session('status')}}
	                 	</div>
	                 @endif
	                  <div id="edit-profile" class="tab-pane active">
	                    <section class="panel">
	                      <div class="panel-body bio-graph-info">
	                      	
	                        <form class="form-horizontal" method="POST" action="/admin/profile" role="form" enctype="multipart/form-data">
							{{csrf_field()}}
	                          <div class="form-group">
	                            <label class="col-lg-2 control-label">Имя</label>
	                            <div class="col-lg-6">
	                              <input type="text" name="name" class="form-control" id="f-name" placeholder="Имя пользователя" value="{{$user->name}}">
	                            </div>
	                          </div>

	                          <div class="form-group">
	                            <label class="col-lg-2 control-label">Город</label>
	                            <div class="col-lg-6">
	                              <input type="text" name="town" class="form-control" id="c-town" placeholder="Город пользователя" value="{{$user->town}}">
	                            </div>
	                          </div>

	                          <div class="form-group">
	                            <label class="col-lg-2 control-label">Email</label>
	                            <div class="col-lg-6">
	                              <input type="text" class="form-control" name="email" id="email" placeholder="Email пользователя" value="{{$user->email}}">
	                            </div>
	                          </div>

	                          <div class="form-group">
	                            <label class="col-lg-2 control-label">Пароль</label>
	                            <div class="col-lg-6">
	                              <input type="password" name="password" class="form-control" id="password" placeholder="">
	                            </div>
	                          </div>

	                          <div class="form-group">                          	
		                          <div class="col-lg-4 text-right">
		                              
		                              <img class="uploaded_image" src="{{$user->getImage()}}">
		                              
		                            </div>
	                          </div>


	                          <div class="form-group">
	                            <label class="col-lg-2 control-label">Аватар</label>
	                            <div class="col-lg-6">
	                              <input type="file" name="avatar" id="avatar">
	                            </div>
	                          </div>
	                          

	                          <div class="form-group">
	                            <div class="col-lg-offset-2 col-lg-10">
	                              <button type="submit" class="btn btn-primary">Обновить</button>
	                              <button type="reset" class="btn btn-danger">Сброс</button>
	                              <a href="{{route('users.index')}}" class="btn btn-default">Назад</a>
	                            </div>
	                          </div>
	                        </form>
	                        {{Form::close()}}
	                      </div>
	                    </section>
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
	@endif

@endsection