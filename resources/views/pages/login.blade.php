@extends('loginlayout')

@section('content')

<div class="container">

    {{Form::open(['route'=>'login', 'class'=>'login-form', 'style'=>'margin-top:100px'])}}

      <div class="login-row">
          @include('admin.errors')
          @if(session('status'))
            <div class="alert alert-danger" style="text-align: center; padding: 10px;">
              {{session('status')}}
          </div>
          @endif
      </div>
    
      <div class="login-wrap">
        <p class="login-img"><i class="icon_lock_alt"></i></p>
        
        <div class="input-group">
          <span class="input-group-addon"><i class="icon_mail_alt"></i></span>
          <input type="text" name="email" class="form-control" placeholder="Email" autofocus>
        </div>
        <div class="input-group">
          <span class="input-group-addon"><i class="icon_key_alt"></i></span>
          <input type="password" name="password" class="form-control" placeholder="Password">
        </div>
        <label class="checkbox">
                <input type="checkbox" name="remember" value="remember-me"> Запомнить меня
                <span class="pull-right"> <a href="#"> Забыли пароль?</a></span>
            </label>
        <button class="btn btn-primary btn-lg btn-block" type="submit">Войти</button>
        <a href="{{route('registerView')}}" class="btn btn-info btn-lg btn-block" type="submit" style="color:#fff !important;">Регистрация</a>
      </div>
    {{Form::close()}}
    <div class="text-right">
      <div class="credits">
          <!--
            All the links in the footer should remain intact.
            You can delete the links only if you purchased the pro version.
            Licensing information: https://bootstrapmade.com/license/
            Purchase the pro version form: https://bootstrapmade.com/buy/?theme=NiceAdmin
          -->
          Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
        </div>
    </div>
  </div>

  @endsection