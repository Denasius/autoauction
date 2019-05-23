@extends('admin.layout')

@section('content')

<!--main content start-->
    <section id="main-content">
      <section class="wrapper">
        <div class="row">
          <div class="col-lg-12">
            <h3 class="page-header"><i class="fa fa-user-md"></i> Создать пользователя</h3>
            <ol class="breadcrumb">
              <li><i class="fa fa-home"></i><a href="{{route('admin')}}">Главная</a></li>
              <li><i class="icon_documents_alt"></i>Создать пользователя</li>
            </ol>
          </div>
        </div>
        <div class="row">
        </div>
        <!-- page start-->
        <div class="row">
          @include('admin.errors')
          <div class="col-lg-12">
            <section class="panel">
              <header class="panel-heading tab-bg-info">
                <ul class="nav nav-tabs">
                  <li>
                    <a href="{{route('users.index')}}">
                                          <i class="icon-home"></i>
                                          Все пользователи
                                      </a>
                  </li>
                  <li class="active">
                    <a href="{{route('users.create')}}">
                                          <i class="icon-user"></i>
                                           Создать пользователя
                                      </a>
                  </li>
                </ul>
              </header>
              <div class="panel-body">
              	
                <div>
                  <div id="edit-profile" class="tab-pane">
                    <section class="panel">
                      <div class="panel-body bio-graph-info">
                        <h1>Создание нового пользователя</h1>
                        {{-- <form class="form-horizontal" role="form"> --}}
                          {{Form::open(['route' => 'users.store', 'files' => true, 'class'=>'form-horizontal', 'role'>'form'])}}

                          <div class="form-group">
                            <label class="col-lg-2 control-label">Имя</label>
                            <div class="col-lg-6">
                              <input type="text" name="name" class="form-control" id="f-name" placeholder="Имя пользователя" value="{{old('name')}}">
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="col-lg-2 control-label">Город</label>
                            <div class="col-lg-6">
                              <input type="text" name="town" class="form-control" id="c-town" placeholder="Город пользователя" value="{{old('town')}}">
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="col-lg-2 control-label">Email</label>
                            <div class="col-lg-6">
                              <input type="text" class="form-control" name="email" id="email" placeholder="Email пользователя" value="{{old('email')}}">
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="col-lg-2 control-label">Пароль</label>
                            <div class="col-lg-6">
                              <input type="password" name="password" class="form-control" id="password" placeholder="">
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
                              <button type="submit" class="btn btn-primary">Создать</button>
                              <button type="reset" class="btn btn-danger">Сброс</button>
                              <a href="{{route('users.index')}}" class="btn btn-default">Назад</a>
                            </div>
                          </div>
                        {{Form::close()}}
                      </div>
                    </section>
                  </div>
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