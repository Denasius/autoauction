@extends('layout')

@section('seo')
    <title>{{ $meta_title }}</title>
    <meta name="description" content="{{ $meta_description }}">
@endsection

@section('content')

    <div id="page-heading" class="lazyloading" data-src="{{ asset('img/user_bg.jpg') }}" style="background-image: url({{ asset('img/th.jpg') }})">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h1>Профиль {{$user->name}}</h1>
                    <div class="line"></div>
                    <span></span>
                    <div class="page-active">
                        <ul>
                            <li><a href="/">Главная</a></li>
                            <li><i class="fa fa-dot-circle-o"></i></li>
                            <li><a>Профиль</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="profiles">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="contact-form">
                        <form id="contact_form" action="#" method="POST" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-6 col-sm-12 col-xs-12">
                                    <label>Логин</label>
                                    <input type="text" name="name" placeholder="Имя" value="{{$user->name}}">
                                </div>
                                <div class="col-md-6 col-sm-12 col-xs-12">
                                    <label>Email пользователя</label>
                                    <input type="text" name="email" placeholder="Email пользователя" value="{{$user->email}}">
                                </div>
                                <div class="col-md-6 col-sm-12 col-xs-12">
                                    <label>Телефон</label>
                                    <input type="text" name="user_phone" placeholder="Телефон" value="{{$user->user_phone}}">
                                </div>
                                <div class="col-md-6 col-sm-12 col-xs-12">
                                    <label>Дата рождения</label>
                                    <input type="date" name="user_dob" value="{{$user->user_dob}}">
                                </div>

                                <div class="col-md-6 col-sm-12 col-xs-12">
                                    <label>Имя</label>
                                    <input type="text" name="user_name" placeholder="Имя" value="{{$user->user_name}}">
                                </div>
                                <div class="col-md-6 col-sm-12 col-xs-12">
                                    <label>Фамилия</label>
                                    <input type="text" name="user_surname" placeholder="Фамилия" value="{{$user->user_surname}}">
                                </div>

                                <div class="col-md-6 col-sm-12 col-xs-12">
                                    <label>Страна</label>
                                    <input type="text" name="user_country" placeholder="Страна" value="{{$user->user_country}}">
                                </div>
                                <div class="col-md-6 col-sm-12 col-xs-12">
                                    <label>Регион</label>
                                    <input type="text" name="user_region" placeholder="Регион" value="{{$user->user_region}}">
                                </div>

                                <div class="col-md-6 col-sm-12 col-xs-12">
                                    <label>Город</label>
                                    <input type="text" name="town" placeholder="Город" value="{{$user->town}}">
                                </div>
                                <div class="col-md-6 col-sm-12 col-xs-12">
                                    <label>Почтовый индекс</label>
                                    <input type="text" name="user_index" placeholder="Почтовый индекс" value="{{$user->user_index}}">
                                </div>

                                <div class="col-md-6 col-sm-12 col-xs-12">
                                    <label>Адрес</label>
                                    <input type="text" name="user_addres" placeholder="Адрес" value="{{$user->user_addres}}">
                                </div>
                                <div class="col-md-6 col-sm-12 col-xs-12">
                                    <label>Адрес 2</label>
                                    <input type="text" name="user_addres_2" placeholder="Адрес 2" value="{{$user->user_addres_2}}">
                                </div>

                                <div class="col-md-6 col-sm-12 col-xs-12">
                                    <label>Юридическое лицо</label>
                                    <select name="entity" class="form-control">
                                        <option value="0" @if($user->entity == 0) selected @endif >Нет</option>
                                        <option value="1" @if($user->entity == 1) selected @endif >Да</option>
                                    </select>
                                </div>
                                <div class="col-md-6 col-sm-12 col-xs-12" @if($user->entity == 0) style="display: none;" @endif>
                                    <label>Название компании</label>
                                    <input type="text" name="user_company" placeholder="Название компании" value="{{$user->user_company}}">
                                </div>


                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="advanced-button">
                                        <a href="#">Сохранить<i class="fa fa-paper-plane"></i></a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        $('[name="entity"]').change(function () {
            if ($(this).val() == 1) {
                $('[name="user_company"]').parent().show();
            } else {
                $('[name="user_company"]').parent().hide();
            }
        });
    </script>


@endsection