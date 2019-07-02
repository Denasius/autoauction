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
                        <header class="panel-heading">
                            <div class="col-sm-12">
                                <ul class="nav nav-tabs" role="tablist">
                                    <li role="presentation" class="active">
                                        <a href="#main_tab" aria-controls="main_tab" role="tab" data-toggle="tab">Основное</a>
                                    </li>
                                    <li role="presentation">
                                        <a href="#image_tab" aria-controls="image_tab" role="tab" data-toggle="tab">Изображения</a>
                                    </li>
                                    <li role="presentation">
                                        <a href="#arrt_tab" aria-controls="arrt_tab" role="tab" data-toggle="tab">Атрибуты</a>
                                    </li>
                                    <li role="presentation">
                                        <a href="#tag_tab" aria-controls="tag_tab" role="tab" data-toggle="tab">Теги</a>
                                    </li>
                                </ul>
                            </div>
                        </header>
                        <div class="panel-body">
                            {{Form::open([
                                'route' => 'lots.store',
                                'files' => true,
                                'class' => 'form-horizontal',
                            ])}}
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane active" id="main_tab">

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
                                        <label class="col-sm-2 control-label">Год выпуска</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="date" class="form-control" placeholder="Год выпуска">
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
                                        <label class="col-sm-2 control-label">Вид топлива</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="fuel" class="form-control" placeholder="Вид топлива">
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
                                            <input type="number" name="status" class="form-control" placeholder="Статус" value="1">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Просмотры</label>
                                        <div class="col-sm-10">
                                            <input type="number" name="views" class="form-control" placeholder="Просмотры" value="0">
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

                                {{--Изображения--}}
                                <div role="tabpanel" class="tab-pane" id="image_tab">
                                    <div class="container">
                                        <div class="row">
                                            <div id="drop_element" class="upload">
                                                <input type="file" multiple id="gallery-photo-add">
                                                <div class="gallery gallery__images"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                {{--Атрибуты--}}
                                <div role="tabpanel" class="tab-pane " id="arrt_tab">
                                    <div class="col-sm-12 text-center">
                                        <strong>Основные атрибуты</strong>
                                    </div>
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
                                    <div class="col-sm-12 text-center">
                                        <strong>Дополнительные атрибуты</strong>
                                    </div>
                                    @foreach($attrs_dop as $attr)
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">{{$attr['title']}}</label>
                                            <div class="col-sm-10">
                                                @foreach($attr['items'] as $item)
                                                    <div class="radio">
                                                        <label>
                                                            {{Form::checkbox('attrs['.$item['id'].']', $item['id'] )}}
                                                            {{$item->title}}
                                                        </label>
                                                    </div>
                                                @endforeach

                                            </div>
                                        </div>
                                    @endforeach
                                </div>

                                {{--Теги--}}
                                <div role="tabpanel" class="tab-pane " id="tag_tab">
                                    @foreach($tags as $item)
                                        <div class="form-group">
                                            <label style="display:block;">
                                                <div class="col-sm-2 control-label" data-id="tab_{{$item->id}}">{{$item->title}}</div>
                                                <div class="col-sm-10">
                                                    <div class="checkbox">
                                                        {{ Form::checkbox('tags['.$item->id.']', $item->id, false, [
                                                        'class' => 'active',
                                                        'id'    => 'tab_'.$item->id,
                                                        ]) }}
                                                    </div>
                                                </div>
                                            </label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="btn-create text-right col-sm-12">
                                    <button type="submit" class="btn btn-add" title="Сохранить">Сохранить</button>
                                </div>
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