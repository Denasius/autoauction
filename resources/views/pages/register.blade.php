@extends('loginlayout')

@section('content')

<div class="container">
  @include('admin.errors')

    {{Form::open(['route'=>'register', 'class'=>'login-form'])}}
    
      <div class="login-wrap">
        <p class="login-img"><i class="icon_lock_alt"></i></p>
        <div class="input-group">
          <span class="input-group-addon"><i class="icon_profile"></i></span>
          <input type="text" name="name" class="form-control" placeholder="Имя" value="{{old('name')}}" autofocus>
        </div>
        <div class="input-group">
          <span class="input-group-addon"><i class="icon_mail_alt"></i></span>
          <input type="text" name="email" class="form-control" placeholder="Email" value="{{old('email')}}" autofocus>
        </div>
        <div class="input-group">
          <span class="input-group-addon"><i class="icon_profile"></i></span>
          <input type="text" name="town" class="form-control" placeholder="Город" value="{{old('town')}}" autofocus>
        </div>
        <div class="input-group">
          <span class="input-group-addon"><i class="icon_key_alt"></i></span>
          <input type="password" name="password" class="form-control" placeholder="Password">
        </div>
        {{-- <button class="btn btn-primary btn-lg btn-block" type="submit">Аутентификация</button> --}}
        <button class="btn btn-info btn-lg btn-block" type="submit">Зарегистрироваться</button>
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