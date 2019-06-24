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
                                <label class="col-sm-2 control-label">Логин</label>
                                <div class="col-sm-10">
                                    <input type="text" name="name" class="form-control" value="{{old('name')}}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">Тип пользователя</label>
                                <div class="col-sm-10">
                                    <select name="role_id" class="form-control">
                                        @foreach($roles as $item)
                                            <option value="{{$item->id}}" @if($item->id == 3) selected @endif >{{$item->title}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">Город</label>
                                <div class="col-sm-10">
                                    <input type="text" name="town" class="form-control" value="{{old('town')}}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">Email</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="email" id="email" placeholder="Email пользователя" value="{{old('email')}}">
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
                                    <input type="file" name="avatar" id="avatar" value="{{old('avatar')}}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">Юридическое лицо</label>
                                <div class="col-sm-10">
                                    <select name="entity" class="form-control">
                                        <option value="0" selected >Нет</option>
                                        <option value="1">Да</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group"style="display:none;">
                                <label class="col-sm-2 control-label">Название компании</label>
                                <div class="col-sm-10">
                                    <input type="text" name="user_company" class="form-control" value="{{old('user_company')}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Имя</label>
                                <div class="col-sm-10">
                                    <input type="text" name="user_name" class="form-control" value="{{old('user_name')}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Фамилия</label>
                                <div class="col-sm-10">
                                    <input type="text" name="user_surname" class="form-control" value="{{old('user_surname')}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Адрес</label>
                                <div class="col-sm-10">
                                    <input type="text" name="user_addres" class="form-control" value="{{old('user_addres')}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Адрес 2</label>
                                <div class="col-sm-10">
                                    <input type="text" name="user_addres_2" class="form-control" value="{{old('user_addres_2')}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Страна</label>
                                <div class="col-sm-10">
                                    <input type="text" name="user_country" class="form-control" value="{{old('user_country')}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Регион</label>
                                <div class="col-sm-10">
                                    <input type="text" name="user_region" class="form-control" value="{{old('user_region')}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Почтовый индекс</label>
                                <div class="col-sm-10">
                                    <input type="text" name="user_index" class="form-control" value="{{old('user_index')}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Телефон</label>
                                <div class="col-sm-10">
                                    <input type="text" name="user_phone" class="form-control" value="{{old('user_phone')}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Дата рождения</label>
                                <div class="col-sm-10">
                                    <input type="date" name="user_dob" class="form-control" value="{{old('user_dob')}}">
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

    <script>
        $('[name="entity"]').change(function () {
            if ($(this).val() == 1) {
                $('[name="user_company"]').parent().parent().show();
            } else {
                $('[name="user_company"]').parent().parent().hide();
            }
        });
    </script>

@endsection