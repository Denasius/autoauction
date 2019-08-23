@extends('admin.layout')

@section('content')

    <!--main content start-->
    <section id="main-content">
        <section class="wrapper">
            @if( session('lot_disallow') )
                <div class="row">
                    <div class="col-md-12">
                        <div class="alert alert-success">
                            {{session('lot_disallow')}}
                        </div>
                    </div>
                </div>
            @endif

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
                            
                                <div class="btn-close-lot">
                                    {{Form::open(['route' => ['finish.lot'], 'method' => 'post','class' => 'form-horizontal'])}}
                                    <input type="hidden" name="lot_id" value="{{ $lot->id }}">
                                    @if($lot->status == 1)
                                        <button class="btn btn-danger">Закрыть лот от участия в торгах</button>
                                    @else
                                        <button class="btn btn-primary">Открыть лот для торгов</button>
                                    @endif
                                    {{Form::close()}}
                                </div>
                            
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
                                            {{Form::textarea('desr', $lot->desr, ['id'=> 'ckeditor', 'class'=>'form-control', 'placeholder' => 'Описание', 'value'=>$lot->desr])}}
                                        </div>
                                    </div>

                                    <div class="form-group form-brand">
                                        <label class="col-sm-2 control-label">Марка</label>
                                        <div class="col-sm-10">
                                                                                         
                                            <select id="car_brend" name="car_brend" class="form-control">
                                                <option value="{{ $lot->car_brend }}" selected>{{ $lot->getBrandTitle($lot->car_brend)  }}</option>
                                                @foreach ($brands as $brand)
                                                    @if ($lot->car_brend != $brand->id )
                                                        <option value="{{ $brand->id }}">{{ $brand->title }}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Модель</label>
                                        <div class="col-sm-10">
                                            <select id="car_model" name="car_model" class="form-control">
                                                <option value="{{ $lot->car_model }}" class="selected" selected>{{ $lot->car_model }}</option>
                                                @foreach ($lot->getCarModelsByBrandId($lot->car_brend) as $model)
                                                    <option value="{{ $model->title }}">{{ $model->title }}</option>
                                                @endforeach
                                                
                                            </select>
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Год выпуска</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="date" class="form-control" placeholder="Год выпуска" value="{{ $lot->date }}">
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">VIN</label>
                                        <div class="col-sm-10">
                                            {{Form::text('vin', $lot->vin, ['class'=>'form-control', 'placeholder' => 'VIN', 'value'=>$lot->vin])}}
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
                                            {{Form::text('address', $lot->address, ['class'=>'form-control', 'placeholder' => 'Адрес', 'value'=>$lot->address])}}
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Пробег</label>
                                        <div class="col-sm-10">
                                            {{Form::text('car_mileage', $lot->car_mileage, ['class'=>'form-control', 'placeholder' => 'Пробег', 'value'=>$lot->car_mileage])}}
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Вид топлива</label>
                                        <div class="col-sm-10">
                                            {{Form::text('fuel', $lot->fuel, ['class'=>'form-control', 'placeholder' => 'Вид топлива'])}}
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Цена</label>
                                        <div class="col-sm-10">
                                            <input type="number" name="price" class="form-control" placeholder="Цена" value="{{ $lot->price }}">
                                        </div> 
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Минимальная ставка</label>
                                        <div class="col-sm-10">
                                            <input type="number" name="lot_bet" class="form-control" placeholder="Ставка" value="{{ $lot->lot_bet }}">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Минимальный шаг в ставке</label>
                                        <div class="col-sm-10">
                                            <input type="number" name="min_bet" class="form-control" placeholder="Минимальный шаг в ставке" value="{{ $lot->min_bet }}">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Цена купить в один клик</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="buy_one_click_price" class="form-control" placeholder="Цена купить в один клик" value="{{ $lot->buy_one_click_price }}">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="checkbox-inline col-sm-2 control-label" style="padding-top:0; font-weight: bold;">
                                           Цена с НДС?
                                        </label>
                                        <div class="col-sm-10">
                                            <input type="checkbox" id="tax" name="tax" @if($lot->tax == 'on') checked @endif class="checkbox-tax">  
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-2 control-label" style="padding-top:0;">Купить в один клик</label>
                                        <div class="col-sm-10">
                                            <input type="checkbox" id="buy_one_click" name="buy_one_click" @if($lot->buy_one_click == 'on') checked @endif class="checkbox-one-click"> 
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Валюта</label>
                                        <div class="col-sm-10">
                                            <select name="currency" class="form-control">
                                                <option value="{{ $lot->currency }}" selected>{{ $lot->currency }}</option>
                                                @if ($lot->currency == 'BYN')
                                                    <option value="EUR">EUR</option>
                                                @else
                                                 <option value="BYN">BYN</option>
                                                @endif
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Опции</label>
                                        <div class="col-sm-10">
                                            {{Form::text('car_options', $lot->car_options, ['class'=>'form-control', 'placeholder' => 'Опции', 'value'=>$lot->car_options])}}
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Статус</label>
                                        <div class="col-sm-10">
                                            {{Form::number('status', $lot->status, ['class'=>'form-control', 'placeholder' => 'Статус', 'value' => $lot->status])}}
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Просмотры</label>
                                        <div class="col-sm-10">
                                            {{Form::number('views', $lot->views, ['class'=>'form-control', 'placeholder' => 'Просмотры', 'value'=>$lot->views])}}
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Шаг в ставке</label>
                                        <div class="col-sm-10">
                                            <input type="number" name="lot_step" class="form-control" placeholder="Шаг в ставке" value="{{ $lot->lot_step }}">
                                        </div>
                                    </div>

                                    <div class="form-group form-group">
                                        <label class="col-sm-2 control-label">Дополнительные сборы</label>
                                        <div class="col-sm-10">
                                            <input type="number" name="fees_all" class="form-control" placeholder="Дополнительные сборы" value="{{ $lot->fees_all }}">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Дата открытия торгов</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="lot_start" class="form-control" placeholder="Дата открытия торгов" @if($lot->lot_start != null) value="{{ date('Y-m-d', strtotime($lot->lot_start)) }}" @endif>
                                            <small style="font-size: 12px; opacity: 0.6; font-style:italic;">Сначала ГОД, потом МЕСЯЦ, потом ДЕНЬ</small>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Дата завершения торгов</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="lot_time" class="form-control" placeholder="Дата завершения торгов" @if($lot->lot_time != null) value="{{ date('Y-m-d H:i:s', strtotime($lot->lot_time)) }}" @endif>
                                            <small style="font-size: 12px; opacity: 0.6; font-style:italic;">Сначала ГОД, потом МЕСЯЦ, потом ДЕНЬ, затем ЧАСЫ, МИНУТЫ и СЕКУНДЫ (секунды можно не указывать)</small>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Meta title</label>
                                        <div class="col-sm-10">
                                            {{Form::text('meta_title', $lot->meta_title, ['class'=>'form-control', 'placeholder' => 'Meta title', 'value'=>$lot->meta_title])}}
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Meta descr</label>
                                        <div class="col-sm-10">
                                            {{Form::text('meta_description', $lot->meta_description, ['class'=>'form-control', 'placeholder' => 'Meta descr', 'value'=>$lot->meta_description])}}
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-2 control-label pt-0" style="padding-top:0;">Лот для особенных</label>
                                        <div class="col-sm-10">
                                            <input type="checkbox" id="lot_vip" name="lot_vip" @if($lot->lot_vip == 'on') checked @endif class="checkbox-vip"> 
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-2 control-label" style="padding-top:0;">Авто из Европы</label>
                                        <div class="col-sm-10">
                                            <input type="checkbox" id="car_from_europe" name="car_from_europe" @if($lot->car_from_europe == 'on') checked @endif class="checkbox-europe"> 
                                        </div>
                                    </div>

                                    <div class="form-group form-group-europe">
                                        <label class="col-sm-2 control-label">Стоимость доставки</label>
                                        <div class="col-sm-10">
                                            <input type="number" name="shipping" class="form-control" placeholder="Стоимость доставки" value="{{ $lot->shipping }}">
                                        </div>
                                    </div>

                                    <div class="form-group form-group-europe">
                                        <label class="col-sm-2 control-label">Дополнительные сборы для Европы</label>
                                        <div class="col-sm-10">
                                            <input type="number" name="fees" class="form-control" placeholder="Дополнительные сборы для Европы" value="{{ $lot->fees }}">
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
                                {{--Изображения--}}
                                <div role="tabpanel" class="tab-pane" id="image_tab">
                                    <div class="container">
                                        <div class="row">
                                            <div id="drop_element" class="upload">
                                                <input type="file" multiple id="gallery-photo-add">
                                                <div class="gallery gallery__images">

                                                    @foreach($images as $item)
                                                        <div class="uploadedImage">
                                                            <div class="img"><img src="/{{$item->image_src}}"></div>
                                                            
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
                                <div class="min-max-bets">
                                    <span class="min_bet">Минимальная ставка: <strong>{{ $lot->lot_bet }}</strong></span>
                                    <span class="max_bet">Максимальная ставка: <strong>{{ $max_bet }}</strong></span>
                                </div>
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
    {{-- html editor --}}
    @include('admin.editor._html_editor')
    <script type="text/javascript">
        $('.uploadedImage .btn-remove').click(function () {
            $(this).parent().remove();
        });

        (function ($) {
            var getModels = function () {
                $('#car_brend').on('change', function () {
                    var _this = $(this),
                        _token = _this.closest('form').find('input[name="_token"]').val(),
                        _method = 'get',
                        _url = "{{ route('showmodels') }}",
                        value = _this.val();            

                    return $.ajax({
                     headers: {
                         'X-CSRF-TOKEN':_token
                     },
                     type: _method,
                     url: _url,
                     data: {values: value},
                     success:function (response) {
                         $('#car_model').find('option').not('.selected').remove();
                         $('#car_model').append(response);
                     },
                     error: function (request, errorStatus, errorThrown) {
                            console.log(request);
                            console.log(errorStatus);
                            console.log(errorThrown);
                        }
                    });
                });
            }

            $(document).ready(function () {
                getModels();
            });
        })(jQuery)
    </script>

@endsection