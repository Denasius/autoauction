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
                                    <li role="presentation" class="">
                                        <a href="#image_tab" aria-controls="main_tab" role="tab" data-toggle="tab">Изображения</a>
                                    </li>
                                    <li role="presentation">
                                        <a href="#arrt_tab" aria-controls="arrt_tab" role="tab" data-toggle="tab">Атрибуты</a>
                                    </li>
                                    <li role="presentation">
                                        <a href="#tag_tab" aria-controls="tag_tab" role="tab" data-toggle="tab">Теги</a>
                                    </li>
                                    @if(isset($bets))
                                        <li role="presentation">
                                            <a href="#bet_tab" aria-controls="bet_tab" role="tab" data-toggle="tab">Ставки</a>
                                        </li>
                                    @endif
                                </ul>
                            </div>

                        </header>
                        <div class="panel-body">
                            {{Form::open(['route' => ['lots.update', $lot->id],'files' => true,'method' => 'put','class' => 'form-horizontal'])}}
                            <div class="tab-content">

                                {{--Основные поля--}}
                                <div role="tabpanel" class="tab-pane active" id="main_tab">
                                    {{Form::hidden('id', $lot->id)}}

                                    <div class="form-group images">
                                        <label class="col-sm-2 control-label">Изображение</label>
                                        <div class="col-sm-10">
                                            <img src="/{{$lot->image}}" alt="">
                                            <label>
                                                <input type="file" name="image" class="preview_img hide" value="{{$lot->image}}">
                                                <i class="fas fa-upload"></i>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Название</label>
                                        <div class="col-sm-10">
                                            {{Form::text('title', $lot->title, ['class'=>'form-control', 'placeholder' => 'Название'])}}
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Описание</label>
                                        <div class="col-sm-10">
                                            {{Form::textarea('desr', $lot->desr, ['id'=> 'ckeditor', 'class'=>'form-control', 'placeholder' => 'Описание'])}}
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Модель</label>
                                        <div class="col-sm-10">
                                            {{Form::text('car_model', $lot->car_model, ['class'=>'form-control', 'placeholder' => 'Модель'])}}
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">VIN</label>
                                        <div class="col-sm-10">
                                            {{Form::text('vin', $lot->vin, ['class'=>'form-control', 'placeholder' => 'VIN'])}}
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Категория</label>
                                        <div class="col-sm-10">

                                            {{ Form::select('category_id',
                                                      $categories,
                                                      $lot->category_id,
                                                      ['class'=>'form-control m-bot15'])
                                                  }}

                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Адрес</label>
                                        <div class="col-sm-10">
                                            {{Form::text('address', $lot->address, ['class'=>'form-control', 'placeholder' => 'Адрес'])}}
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Пробег</label>
                                        <div class="col-sm-10">
                                            {{Form::text('car_mileage', $lot->car_mileage, ['class'=>'form-control', 'placeholder' => 'Пробег'])}}
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Опции</label>
                                        <div class="col-sm-10">
                                            {{Form::text('car_options', $lot->car_options, ['class'=>'form-control', 'placeholder' => 'Опции'])}}
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Статус</label>
                                        <div class="col-sm-10">
                                            {{Form::number('status', $lot->status, ['class'=>'form-control', 'placeholder' => 'Статус'])}}
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Просмотры</label>
                                        <div class="col-sm-10">
                                            {{Form::number('views', $lot->views, ['class'=>'form-control', 'placeholder' => 'Просмотры'])}}
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Meta title</label>
                                        <div class="col-sm-10">
                                            {{Form::text('meta_title', $lot->meta_title, ['class'=>'form-control', 'placeholder' => 'Meta title'])}}
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Meta descr</label>
                                        <div class="col-sm-10">
                                            {{Form::text('meta_description', $lot->meta_description, ['class'=>'form-control', 'placeholder' => 'Meta descr'])}}
                                        </div>
                                    </div>
                                    @if(isset($aliase->slug))
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">ЧПУ</label>
                                            <div class="col-sm-10" style="display:flex;">
                                                <input type="text" class="form-control" value="{{$aliase->slug}}" disabled>
                                                <a class="btn btn-primary" href="{{route('aliases.edit', $aliase->id)}}"><i class="fas fa-edit"></i></a>
                                            </div>
                                        </div>
                                    @endif
                                </div>

                                {{-- Изображения --}}
                                {{--Изображения--}}
                                <div role="tabpanel" class="tab-pane" id="image_tab">
                                    <div class="container">
                                        <div class="row">
                                            <div id="drop_element" class="upload">
                                                <input type="file" multiple id="gallery-photo-add">
                                                <div class="gallery gallery__images">

                                                    @foreach($images as $item)
                                                        <div class="uploadedImage">
                                                            <img src="/{{$item->image_src}}">
                                                            <input type="text" placeholder="Название (alt)" name="images[alt][]" value="{{$item->image_alt}}">
                                                            <input type="text" placeholder="Заголовок (title)" name="images[title][]" value="{{$item->image_title}}">
                                                            <input type="text" placeholder="Описание (description)" name="images[descr][]" value="{{$item->image_descr}}">
                                                            <input type="hidden" name="images[src][]" value="{{$item->image_src}}">
                                                            <a href="javascript:void(0);" class="btn btn-info btn-remove">Удалить</a>
                                                        </div>
                                                    @endforeach

                                                </div>
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
                                                        <option value="{{$item->id}}"
                                                                @if(in_array($item->id, $lot_attr)) selected @endif >{{$item->title}}</option>
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
                                                                {{Form::checkbox('attrs['.$item['id'].']', $item['id'], (in_array($item->id, $lot_attr)) ? true : false )}}
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
                                                        {{Form::checkbox('tags['.$item->id.']', $item->id, in_array($item->id, $lot_tag), [
                                                        'class' => 'active',
                                                        'id'    => 'tab_'.$item->id,
                                                        ])}}
                                                    </div>
                                                </div>
                                            </label>
                                        </div>
                                    @endforeach
                                </div>

                                {{--Ставки--}}
                                @if(isset($bets))
                                    <div role="tabpanel" class="tab-pane " id="bet_tab">
                                        <table class="table hover_black">
                                            <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Ставка</th>
                                                <th>Пользователь</th>
                                                <th>Дата</th>
                                                <th class="text-right">Действие</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($bets as $item)
                                                <tr>
                                                    <th scope="row">{{$item->id}}</th>
                                                    <td>{{$item->price}}</td>
                                                    <td>{{$item->user_name}} ({{$item->user_email}})</td>
                                                    <td>{{$item->updated_at}}</td>
                                                    <td class="text-right">
                                                        <div class="btn-group">
                                                            <a class="btn btn-primary" href="{{route('bets.edit', $item->id)}}">
                                                                <i class="fas fa-edit"></i>
                                                            </a>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                @endif


                                <div class="form-group">
                                    <div class="btn-create text-right col-sm-12">
                                        <button type="submit" class="btn btn-add" title="Обновить">Обновить</button>
                                    </div>
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
        CKEDITOR.replace('ckeditor');
        $('.uploadedImage .btn-remove').click(function () {
            $(this).parent().remove();
        });
    </script>
@endsection