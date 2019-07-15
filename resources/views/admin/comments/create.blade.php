@extends('admin.layout')

@section('content')
    <!--main content start-->
    <section id="main-content">
        <section class="wrapper">

            @include('admin.common.breadcrumb_header')

            <div class="row">
                @include('admin.errors')
                <div class="col-lg-12">
                    <section class="panel">
                        <div class="panel-body">
                            {{Form::open([
                              'route' => 'comments.store',
                              'files' => true,
                              'class' => 'form-horizontal'
                            ])}}
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Название страницы</label>
                                <div class="col-sm-10">
                                    {{ Form::select('page_id',
                                        $pages,
                                        null,
                                        ['class'=>'form-control m-bot15'])
                                  }}
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">E-mail пользователя</label>
                                <div class="col-sm-10">
                                    {{ Form::select('user_id',
                                        $users,
                                        null,
                                        ['class'=>'form-control m-bot15'])
                                  }}
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">Дата</label>
                                <div class="col-sm-10">
                                    <input type="date" id="dp1" name="created_at" class="form-control">
                                </div>

                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">Заголовок</label>
                                <div class="col-sm-10">
                                    <input type="text" name="title" id="title" class="form-control" placeholder="Заголовок комментария">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">Текст комментария</label>
                                <div class="col-sm-10">
                                    <textarea type="text" name="descr" id="ckeditor" class="form-control"
                                              placeholder="Текст комментария"></textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label label_check c_off" for="status">
                                    <input name="status" id="status" value="1" type="checkbox"> Опубликовать </label>
                            </div>

                            <div class="form-group">
                                <div class="btn-create text-right col-sm-12">
                                    <button type="submit" class="btn btn-add" title="Сохранить">Сохранить</button>
                                </div>
                            </div>

                        </div>


                    {{Form::close()}}
                </div>
            </div>
            </div>
        </section>
    </section>
    <!--main content end-->
    {{-- html editor --}}
    @include('admin.editor._html_editor')
@endsection