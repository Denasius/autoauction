@extends('admin.layout')

@section('content')
<!--main content start-->
<section id="main-content">
  <section class="wrapper">
    <div class="row">
      <div class="col-lg-12">
        <h3 class="page-header"><i class="fa fa-table"></i> Комментарии</h3>
        <ol class="breadcrumb">
          <li><i class="fa fa-home"></i><a href="{{route('admin')}}">Главная</a></li>
          <li><i class="fa fa-table"></i>Комментарии</li>
        </ol>
      </div>
    </div>
    <!-- page start-->
    <div class="row">
      <div class="col-lg-12">
          <div class="add-button" style="margin-bottom:20px;">
              <a class="btn btn-success" href="{{route('comments.create')}}" title="Добавить комментарий">Добавить</a>
            </div>
        <section class="panel">
          <header class="panel-heading">
            Все комментарии
          </header>

          <table class="table table-striped table-advance table-hover">
            <tbody>
              <tr>
                <th><i class="icon_paperclip"></i> ID</th>
                <th><i class="icon_paperclip"></i> Заголовок</th>
                <th><i class="icon_menu-square_alt2"></i> К странице</th>
                <th><i class="icon_profile"></i> Email пользователя</th>
                <th><i class="icon_calendar"></i> Дата</th>
                
                <th><i class="icon_cogs"></i> Действия</th>
              </tr>
              @foreach ($comments as $comment)
                <tr>
                  <td>{{$comment->id}}</td>
                  <td>{{$comment->title}}</td>
                  <td>{{$comment->page_title}}</td>
                  <td>{{$comment->author}}</td>
                  <td>{{$date}}</td>
                  <td>
                    <td style="text-align: right;">
                      <div class="btn-group">
                        <a class="btn btn-primary" href="{{route('comments.edit', $comment->id)}}"><i class="icon_pencil-edit"></i></a>
                        {{Form::open(['route'=>['comments.destroy', $comment->id], 'method'=>'delete', 'class'=>'inline_block'])}}
                           <button type="submit" class="btn btn-danger" data-attr="delete"><i class="icon_close_alt2"></i></button>
                        {{Form::close()}}
                      </div>
                    </td>
                  </td>
                </tr>
              @endforeach
              
            </tbody>
          </table>
        </section>
      </div>
    </div>
    <!-- page end-->
  </section>
</section>
<!--main content end-->
@endsection