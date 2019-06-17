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
                                'route' => 'pages.store',
                                'files' => true,
                                'class' => 'form-horizontal'
                            ])}}

                            <div class="form-group images">
                                <label class="col-sm-2 control-label">Изображение</label>
                                <div class="col-sm-10">
                                    <img src="/" alt="">
                                    <label>
                                        <input type="file" name="image" class="preview_img hide">
                                        <i class="fas fa-upload"></i>
                                    </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Название</label>
                                <div class="col-sm-10">
                                    <input type="text" name="title" class="form-control" placeholder="Название">
                                </div>
                            </div>


                            <div class="form-group">
                                <label class="col-sm-2 control-label">Категория</label>
                                <div class="col-sm-10">
                                    {{ Form::select('category_id',
                                       $categories,
                                       null,
                                       ['class'=>'form-control m-bot15'])
                                 }}
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">Краткое описание</label>
                                <div class="col-sm-10">
                                    <textarea type="text" name="short_descr" id="ckeditor1" class="form-control"
                                              placeholder="Краткое описание"></textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">Описание</label>
                                <div class="col-sm-10">
                                    <textarea type="text" name="descr" id="ckeditor" class="form-control" placeholder="Описание"></textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">Meta title</label>
                                <div class="col-sm-10">
                                    <input type="text" name="meta_title" class="form-control" value="">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">Meta description</label>
                                <div class="col-sm-10">
                                    <textarea type="text" name="meta_description" class="form-control"></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="btn-create text-right col-sm-12">
                                    <button type="submit" class="btn btn-add" title="Сохранить">Сохранить</button>
                                </div>
                            </div>

                            {{Form::close()}}
                        </div>
                    </section>
                </div>
            </div>
            </div>
        </section>
    </section>
    <!--main content end-->
    <script src="https://cdn.ckeditor.com/4.11.4/standard/ckeditor.js"></script>
    <script type="text/javascript">
        CKEDITOR.replace('ckeditor');
        CKEDITOR.replace('ckeditor1');
    </script>
@endsection