@extends('admin.layout')

@section('content')

    <!--main content start-->
    <section id="main-content">
        <section class="wrapper">

            @include('admin.common.breadcrumb_header')

            <div class="row">
                @include('admin.errors')
                <div class="col-sm-12">
                    <section class="panel">

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
                                        $user_mail->email,
                                        ['class'=>'form-control m-bot15'])
                                  }}
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">Дата</label>
                                <div class="col-sm-10">
                                    <input type="date" name="updated_at" class="form-control" value="{{$updated_at}}">
                                </div>

                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">Заголовок комментария</label>
                                <div class="col-sm-10">
                                    <input type="text" name="title" id="title" class="form-control" placeholder="Заголовок комментария"
                                           value="{{$comment->title}}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">Текст комментария</label>
                                <div class="col-sm-10">
                                    <textarea type="text" name="descr" id="ckeditor-comment" class="form-control"
                                              placeholder="Текст комментария">{{$comment->descr}}</textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label label_check c_off" for="status">
                                    <input name="status" id="status" value="1" type="checkbox" checked="{{$comment->status}}"> Опубликовать </label>
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

    <!--main content end-->
    <script src="https://cdn.ckeditor.com/4.11.4/standard/ckeditor.js"></script>
    <script type="text/javascript">
        CKEDITOR.replace('ckeditor-comment');
    </script>
@endsection