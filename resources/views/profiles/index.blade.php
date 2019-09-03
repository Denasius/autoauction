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
                <div class="col-md-12">
                    
                    <div class="image_steps">
                        <a href="@if( $user->confirm_register == null ) {{ route('profile') }} @else javascript:void(0) @endif">
                            <div class="item">
                                <img class="lazyloading" src="{{ asset('img/th.jpg') }}" data-src="{{ asset('img/input_data.png') }}" alt="image">
                                <div class="radio">
                                    <img class="lazyloading" src="{{ asset('img/th.jpg') }}" data-src="{{ asset('img/elipce_1.png') }}" alt="image">
                                    <img class="lazyloading" src="{{ asset('img/th.jpg') }}" data-src="{{ asset('img/elipse_2.png') }}" alt="image">
                                </div>
                            </div>
                        </a>
                        <a href="@if( $user->confirm_register == null ) {{ route('profile.info') }} @else javascript:void(0) @endif">
                            <div class="item">
                                <img class="lazyloading" src="{{ asset('img/th.jpg') }}" data-src="{{ asset('img/upload_doc.png') }}" alt="image">
                                <div class="radio">
                                    <img class="lazyloading" src="{{ asset('img/th.jpg') }}" data-src="{{ asset('img/elipce_1.png') }}" alt="image">
                                </div>
                            </div>
                        </a>
                        
                        <a href="javascript:void(0)">
                            <div class="item">
                                <img class="lazyloading" src="{{ asset('img/th.jpg') }}" data-src="{{ asset('img/buy_auto.png') }}" alt="image">
                                <div class="radio">
                                    <img class="lazyloading" src="{{ asset('img/th.jpg') }}" data-src="{{ asset('img/elipce_1.png') }}" alt="image">
                                </div>
                            </div>
                        </a>
                    </div>
                    
                </div>
            </div>
        </div>
    </section>
    @if ($errors->confirmRigister->any())
    <section class="container-errors container">
        <div class="row">
            <div class="col-md-12">
                <ul class="alert alert-danger">
                    @foreach ($errors->confirmRigister->all() as $element)
                        <li>{{ $element }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    </section>
    @endif
    <section class="profiles profiles-info">
        <div class="container">
            <div class="col-sm-12">
                @if(session('profile-success-update'))
                <div class="alert alert-success">
                    {{ session('profile-success-update') }}
                </div>
                @endif
                <div class="contact-form">
                    <form id="contact_form" data-toggle="validator" role="form" action="{{ route('profile.edit') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="radio">
                                    <input id="yur_per" type="radio" name="entity" value="yur_per" @if( $user->entity === 'yur_per' ) checked @endif>
                                    <label for="yur_per" class="for_radio">Юридическое лицо</label>
                                    <input id="fiz_per" type="radio" name="entity" value="fiz_per" @if( $user->entity === 'fiz_per' ) checked @endif>
                                    <label for="fiz_per" class="for_radio">Физическое лицо</label>
                                </div>
                            </div>
                        </div>                
                        <div class="row">
                            <div class="col-md-6 col-sm-12 col-xs-12">
                                <label>Имя</label>
                                <input type="text" name="name" value="{{ old('name', $user->name) }}">
                            </div>
                            <div class="col-md-6 col-sm-12 col-xs-12 @if($errors->has('user_surname')) error-field @endif">
                                <label>Фамилия</label>
                                <input type="text" name="user_surname" value="{{ old('user_surname', $user->user_surname) }}">
                            </div>
                            <div class="col-md-6 col-sm-12 col-xs-12 @if($errors->has('email')) error-field @endif">
                                <label>Почта</label>
                                <input type="text" name="email" value="{{ old('email', $user->email) }}">
                            </div>
                            <div class="col-md-6 col-sm-12 col-xs-12 @if( $errors->has('user_company') ) error-field @endif">
                                <label>Название организации</label>
                                <input type="text" name="user_company" value="{{ old('user_company', $user->user_company) }}">
                            </div>
                            <div class="col-md-6 col-sm-12 col-xs-12 @if( $errors->has('user_addres') ) error-field @endif">
                                <label>Адрес организации</label>
                                <input type="text" name="user_addres" value="{{ old('user_addres', $user->user_addres) }}">
                            </div>

                            <div class="col-md-6 col-sm-12 col-xs-12 @if( $errors->has('user_addres_2') ) error-field @endif">
                                <label>Адрес организации 2 (для юр. лиц)</label>
                                <input type="text" name="user_addres_2" value="{{ old('user_addres_2', $user->user_addres_2) }}">
                            </div>
                            <div class="col-md-6 col-sm-12 col-xs-12 @if( $errors->has('user_country') ) error-field @endif">
                                <label>Страна</label>
                                <input type="text" name="user_country" value="{{ old('user_country', $user->user_country) }}">
                            </div>
                            <div class="col-md-6 col-sm-12 col-xs-12 @if( $errors->has('user_region') ) error-field @endif">
                                <label>Область</label>
                                <input type="text" name="user_region" value="{{ old('user_region', $user->user_region) }}">
                            </div>

                            <div class="col-md-6 col-sm-12 col-xs-12 @if( $errors->has('town') ) error-field @endif">
                                <label>Город</label>
                                <input type="text" name="town" value="{{ old('town', $user->town) }}">
                            </div>

                            <div class="col-md-6 col-sm-12 col-xs-12 @if( $errors->has('user_index') ) error-field @endif">
                                <label>Почтовый индекс</label>
                                <input type="text" name="user_index" value="{{ old('user_index', $user->user_index) }}">
                            </div>

                            <div class="col-md-6 col-sm-12 col-xs-12 @if( $errors->has('user_phone') ) error-field @endif">
                                <label>Телефон</label>
                                <input type="text" name="user_phone" value="{{ old('user_phone', $user->user_phone) }}">
                            </div>

                            <div class="col-md-6 col-sm-12 col-xs-12 @if( $errors->has('user_dob') ) error-field @endif">
                                <label>Дата рождения</label>
                                <input type="text" name="user_dob" value="{{ old('user_dob', $user->user_dob) }}">
                            </div>

                            <div class="col-md-6 col-sm-12 col-xs-12 @if( $errors->has('user_interested') ) error-field @endif">
                                <label>Меня интересует</label>
                                <input type="text" name="user_interested" value="{{ old('user_interested', $user->user_interested) }}">
                            </div>
                            <div class="col-md-6 col-sm-12 col-xs-12 @if( $errors->has('user_for') ) error-field @endif">
                                <label>Покупаю для</label>
                                <input type="text" name="user_for" value="{{ old('user_for', $user->user_for) }}">
                            </div>

                            <div class="col-md-12 col-sm-12 col-xs-12">
                            @if( $user->confirm_register != null )
                                <div class="advanced-button">
                                    <button type="submit">Следующий шаг<i class="fa fa-paper-plane"></i></button>
                                </div>
                            @else
                            <div class="advanced-button">
                                    <button type="submit">Обновить<i class="fa fa-paper-plane"></i></button>
                                </div>
                            @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>            
        </div>
    </section>
@endsection