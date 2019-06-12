@extends('admin.layout')

@section('content')

    <!--main content start-->
    <section id="main-content">
        <section class="wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h3 class="page-header"><i class="fa fa-file-text-o"></i> Создать лот</h3>
                    <ol class="breadcrumb">
                        <li><i class="fa fa-home"></i><a href="index.html">Главная</a></li>
                        <li><i class="icon_document_alt"></i>Создать лот</li>
                    </ol>
                </div>
            </div>
            <div class="row">
                @include('admin.errors')
                <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            <div class="col-sm-12">
                                <ul class="nav nav-tabs" role="tablist">
                                    <li role="presentation" class="active">
                                        <a href="#main_tab" aria-controls="main_tab" role="tab" data-toggle="tab">Основное</a>
                                    </li>
                                    <li role="presentation">
                                        <a href="#arrt_tab" aria-controls="arrt_tab" role="tab" data-toggle="tab">Атрибуты</a>
                                    </li>
                                </ul>
                            </div>
                        </header>
                        <div class="panel-body">
                            {{Form::open([
                                'route' => 'lots.store',
                                'files' => true,
                                'class' => 'form-horizontal'
                            ])}}
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane active" id="main_tab">
                                    <div class="form-group">
                                        <label class="col-lg-2 control-label">Изображение</label>
                                        <div class="col-lg-6">
                                            <input type="file" name="image" id="image">
                                            <p class="help-block">Какое-нибудь уведомление о форматах..</p>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Название</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="title" class="form-control" placeholder="Название">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Описание</label>
                                        <div class="col-sm-10">
                                            <textarea type="text" name="descr" id="ckeditor" class="form-control" placeholder="Описание"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Модель</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="car_model" class="form-control" placeholder="Модель">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">VIN</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="vin" class="form-control" placeholder="VIN">
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
                                        <label class="col-sm-2 control-label">Адрес</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="address" class="form-control" placeholder="Адрес">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Пробег</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="car_mileage" class="form-control" placeholder="Пробег">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Опции</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="car_options" class="form-control" placeholder="Опции">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Статус</label>
                                        <div class="col-sm-10">
                                            <input type="number" name="status" class="form-control" placeholder="Статус">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Просмотры</label>
                                        <div class="col-sm-10">
                                            <input type="number" name="views" class="form-control" placeholder="Просмотры">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Meta title</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="meta_title" class="form-control" placeholder="Meta title">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Meta descr</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="meta_description" class="form-control" placeholder="Meta descr">
                                        </div>
                                    </div>
                                </div>
                                {{--Атрибуты--}}
                                <div role="tabpanel" class="tab-pane " id="arrt_tab">
                                    @foreach($attrs as $attr)
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">{{$attr['title']}}</label>
                                            <div class="col-sm-10">

                                                <select name="attrs[{{$attr['id']}}]" class="form-control m-bot15">
                                                    <option value="">Нету</option>
                                                    @foreach($attr['items'] as $item)
                                                        <option value="{{$item->id}}">{{$item->title}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>






                            <div class="btn-create" style="margin-top: 20px; text-align: right;">
                                <button type="submit" class="btn btn-success" href="{{route('lots.create')}}" title="Сохранить">Сохранить</button>
                            </div>

                        </div>
                    </section>
                    {{Form::close()}}
                </div>
            </div>
        </section>
    </section>
    <!--main content end-->
    <script src="https://cdn.ckeditor.com/4.11.4/standard/ckeditor.js"></script>
    <script type="text/javascript">
        CKEDITOR.replace('ckeditor');
    </script>
@endsection