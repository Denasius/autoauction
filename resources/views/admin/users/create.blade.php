@extends('admin.layout')

@section('content')

    <!--main content start-->
    <section id="main-content">
        <section class="wrapper">

        @include('admin.common.breadcrumb_header')

        <!-- page start-->
            <div class="row">
                @include('admin.errors')
                <div class="col-sm-12">
                    <section class="panel">

                        <div class="panel-body">


                            {{Form::open(['route' => 'users.store', 'files' => true, 'class'=>'form-horizontal', 'role'>'form'])}}

                            <div class="form-group">
                                <label class="col-sm-2 control-label">Имя</label>
                                <div class="col-sm-10">
                                    <input type="text" name="name" class="form-control" id="f-name" placeholder="Имя пользователя"
                                           value="{{old('name')}}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">Город</label>
                                <div class="col-sm-10">
                                    <input type="text" name="town" class="form-control" id="c-town" placeholder="Город пользователя"
                                           value="{{old('town')}}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">Email</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="email" id="email" placeholder="Email пользователя"
                                           value="{{old('email')}}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">Пароль</label>
                                <div class="col-sm-10">
                                    <input type="password" name="password" class="form-control" id="password" placeholder="">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">Аватар</label>
                                <div class="col-sm-10">
                                    <input type="file" name="avatar" id="avatar">
                                </div>
                            </div>


                            <div class="form-group">
                                <div class="btn-create text-right col-sm-12">
                                    <button type="submit" class="btn btn-add" title="Сохранить">Сохранить</button>
                                </div>
                            </div>
                            {{Form::close()}}
                        </div>
                    </section>
                </div>
            </div>

        </section>
    </section>

@endsection