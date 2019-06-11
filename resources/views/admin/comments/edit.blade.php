@extends('admin.layout')

@section('content')

<!--main content start-->
<section id="main-content">
  <section class="wrapper">
    <div class="row">
      <div class="col-lg-12">
        <h3 class="page-header"><i class="fa fa-file-text-o"></i> Редактировать комментарий  </h3>
        <ol class="breadcrumb">
          <li><i class="fa fa-home"></i><a href="index.html">Главная</a></li>
          <li><i class="icon_document_alt"></i>Редактировать комментарий</li>
        </ol>
      </div>
    </div>
    <div class="row">
      @include('admin.errors')
      <div class="col-lg-12">
        <section class="panel">
          <header class="panel-heading">
            Редактировать комментарий
          </header>
          <div class="panel-body">
            {{Form::open([
              'route' => ['comments.update', $comment->id],
              'files' => true,
              'method'  => 'put',
              'class' => 'form-horizontal'
            ])}}
              <div class="form-group">
                <label class="col-sm-2 control-label">Название страницы</label>
                <div class="col-sm-10">
                  {{ Form::select('page_id', 
                      $pages,
                      $comment->page->title, 
                      ['class'=>'form-control m-bot15']) 
                }}
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">E-mail пользователя</label>
                <div class="col-sm-10">
                  {{ Form::select('user_id', 
                      $users,
                      $comment->author->email,
                      ['class'=>'form-control m-bot15']) 
                }}
                </div>
              </div>

              <div class="form-group">
                  <label class="col-sm-2 control-label">Дата</label>
                  <div class="col-sm-10">
                  <input type="date" name="created_at" class="form-control" value="{{$comment->created_at}}">
                  </div>
                  
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Заголовок комментария</label>
                <div class="col-sm-10">
                <input type="text" name="title" id="title" class="form-control" placeholder="Заголовок комментария" value="{{$comment->title}}">
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Текст комментария</label>
                <div class="col-sm-10">
                <textarea type="text" name="descr" id="ckeditor-comment" class="form-control" placeholder="Текст комментария">{{$comment->descr}}</textarea>
                </div>
                <script src="https://cdn.ckeditor.com/4.11.4/standard/ckeditor.js"></script>
                 <script type="text/javascript">
                   CKEDITOR.replace('ckeditor-comment');
                 </script>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label label_check c_off" for="status">
                <input name="status" id="status" value="1" type="checkbox" checked="{{$comment->status}}"> Опубликовать </label>
              </div>

               <div class="btn-create" style="margin-top: 20px; text-align: right;">
                  <button type="submit" class="btn btn-success" href="{{route('comments.create')}}" title="Сохранить">Сохранить</button>
                </div>
            
              </div>

             
            {{Form::close()}}
          </div>
      </div>
    </div>
  </section>
</section>
<!--main content end-->

@endsection