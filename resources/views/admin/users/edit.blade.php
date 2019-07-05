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

                            {{Form::open([
                              'route' => ['users.update', $user->id],
                              'files' => true,
                              'method' => 'put',
                              'class'=>'form-horizontal',
                              'role'>'form'
                              ])}}

                            <div class="form-group">
                                <label class="col-sm-2 control-label">Логин</label>
                                <div class="col-sm-10">
                                    <input type="text" name="name" class="form-control" value="{{$user->name}}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">Тип пользователя</label>
                                <div class="col-sm-10">
                                    <select name="role_id" class="form-control">
                                        @foreach($roles as $item)
                                            <option value="{{$item->id}}" @if($user->role_id == $item->id) selected @endif >{{$item->title}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">Город</label>
                                <div class="col-sm-10">
                                    <input type="text" name="town" class="form-control" id="c-town" placeholder="Город пользователя"
                                           value="{{$user->town}}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">Email</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="email" id="email" placeholder="Email пользователя"
                                           value="{{$user->email}}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">Пароль</label>
                                <div class="col-sm-10">
                                    <input type="password" name="password" class="form-control" id="password" placeholder="">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-4 text-right">
                                    <img class="uploaded_image" src="{{$user->getImage()}}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">Аватар</label>
                                <div class="col-sm-10">
                                    <input type="file" name="avatar" id="avatar">
                                </div>
                            </div>


                            <div class="form-group">
                                <label class="col-sm-2 control-label">Юридическое лицо</label>
                                <div class="col-sm-10">
                                    <select name="entity" class="form-control">
                                        <option value="0" @if($user->entity == 0) selected @endif >Нет</option>
                                        <option value="1" @if($user->entity == 1) selected @endif >Да</option>
                                    </select>
                                </div>
                            </div>



                            <div class="form-group" @if($user->entity != 1) style="display:none;" @endif >
                                <label class="col-sm-2 control-label">Название компании</label>
                                <div class="col-sm-10">
                                    <input type="text" name="user_company" class="form-control" value="{{$user->user_company}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Имя</label>
                                <div class="col-sm-10">
                                    <input type="text" name="user_name" class="form-control" value="{{$user->user_name}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Фамилия</label>
                                <div class="col-sm-10">
                                    <input type="text" name="user_surname" class="form-control" value="{{$user->user_surname}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Адрес</label>
                                <div class="col-sm-10">
                                    <input type="text" name="user_addres" class="form-control" value="{{$user->user_addres}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Адрес 2</label>
                                <div class="col-sm-10">
                                    <input type="text" name="user_addres_2" class="form-control" value="{{$user->user_addres_2}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Страна</label>
                                <div class="col-sm-10">
                                    <input type="text" name="user_country" class="form-control" value="{{$user->user_country}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Регион</label>
                                <div class="col-sm-10">
                                    <input type="text" name="user_region" class="form-control" value="{{$user->user_region}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Почтовый индекс</label>
                                <div class="col-sm-10">
                                    <input type="text" name="user_index" class="form-control" value="{{$user->user_index}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Телефон</label>
                                <div class="col-sm-10">
                                    <input type="text" name="user_phone" class="form-control" value="{{$user->user_phone}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Дата рождения</label>
                                <div class="col-sm-10">
                                    <input type="date" name="user_dob" class="form-control" value="{{$user->user_dob}}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">Изображения документов</label>
                                <div class="col-sm-10">
                                    <div class="col-sm-12">
                                        <input type="file" name="images" class="form-control" value="{{$user->images}}">
                                    </div>
                                    <div class="col-sm-12">
                                        <input type="file" name="images" class="form-control" value="{{$user->images}}">
                                    </div>
                                </div>
                            </div>


                            <div class="form-group">
                                <div class="btn-create text-right col-sm-12">
                                    <button type="submit" class="btn btn-add" title="Обновить">Обновить</button>
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