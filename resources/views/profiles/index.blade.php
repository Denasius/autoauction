@extends('layout')

@section('seo')
    <title>{{ $meta_title }}</title>
    <meta name="description" content="{{ $meta_description }}">
@endsection

@section('content')

    <div id="page-heading" style="background-image: url('img/user_bg.jpg')">
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
                                    <input type="text" name="name" placeholder="Имя" value="{{$user->name}}">
                                </div>
                                <div class="col-md-6 col-sm-12 col-xs-12">
                                    <input type="text" name="email" placeholder="Email пользователя" value="{{$user->email}}">
                                </div>
                                <div class="col-md-6 col-sm-12 col-xs-12">
                                    <input type="text" name="user_phone" placeholder="Телефон" value="{{$user->user_phone}}">
                                </div>
                                <div class="col-md-6 col-sm-12 col-xs-12">
                                    <input type="date" name="user_dob" value="{{$user->user_dob}}">
                                </div>
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <textarea id="message" class="message" name="message" placeholder="Write message"></textarea>
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

@endsection