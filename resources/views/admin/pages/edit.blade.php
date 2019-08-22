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
                                'route' => ['pages.update', $page->id],
                                'files' => true,
                                'method'  => 'put',
                                'class' => 'form-horizontal'
                            ])}}

                            <div class="form-group col-sm-12">
                                <div class="btn-create text-right">
                                    <button type="submit" class="btn btn-add" title="Обновить">Обновить</button>
                                </div>
                            </div>

                            <div class="form-group images">
                                <label class="col-sm-2 control-label">Изображение</label>
                                <div class="col-sm-10">
                                    <img src="{{$page->getImage()}}" alt="">
                                    <label>
                                        <input type="file" name="image" class="preview_img hide" value="{{$page->getImage()}}">
                                        <i class="fas fa-upload"></i>
                                    </label>
                                </div>
                            </div>


                            <div class="form-group">
                                <label class="col-sm-2 control-label">Название</label>
                                <div class="col-sm-10">
                                    <input type="text" name="title" class="form-control" placeholder="Название" value="{{$page->title}}">
                                </div>
                            </div>


                            <div class="form-group">
                                <label class="col-sm-2 control-label">Категория</label>
                                <div class="col-sm-10">
                                    {{ Form::select('category_id',
                                       $categories,
                                       $page->category->id,
                                       ['class'=>'form-control m-bot15'])
                                 }}
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">Тип шаблона</label>
                                <div class="col-sm-10">
                                    <select name="template" class="form-control">
                                        {{-- Значение value лучше не изменять, та как эти значения уже используются при выборке --}}
                                        <option value="{{ $page->template }}" selected>
                                            @switch($page->template)
                                                @case('contacts')
                                                    Контакты
                                                    @break

                                                @case('about')
                                                    О нас
                                                    @break

                                                @case('seller')
                                                    Продавцам
                                                    @break 

                                                @case('buyer')
                                                    Покупателям
                                                    @break 

                                                @case('service')
                                                    Услуги
                                                    @break 

                                                @case('news')
                                                    Новость
                                                    @break 

                                                @case('customs_calculator')
                                                    Тамженный калькулятор
                                                    @break

                                                @case('check_vin')
                                                    Проверка по VIN
                                                    @break
                                            
                                                @default
                                                    По умолчанию
                                            @endswitch                                            
                                        </option>
                                        @if ( $page->template != 'default' ) 
                                            <option value="default">По умолчанию</option>
                                        @endif

                                        @if ( $page->template != 'auctions' ) 
                                            <option value="contacts">Контакты</option>
                                        @endif

                                        @if ( $page->template != 'blogs' ) 
                                            <option value="about">О нас</option>
                                        @endif
                                       
                                        @if ( $page->template != 'seller' ) 
                                            <option value="seller">Продавцам</option>
                                        @endif

                                         @if ( $page->template != 'buyer' ) 
                                            <option value="buyer">Покупателям</option>
                                        @endif
                                        
                                        @if ( $page->template != 'service' ) 
                                            <option value="service">Услуги</option>
                                        @endif

                                        @if ( $page->template != 'news' ) 
                                            <option value="news">Новость</option>
                                        @endif

                                        @if ( $page->template != 'customs_calculator' ) 
                                            <option value="customs_calculator">Тамженный калькулятор</option>
                                        @endif

                                        @if ( $page->template != 'check_vin' ) 
                                            <option value="check_vin">Проверка по VIN</option>
                                        @endif
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">Краткое описание</label>
                                <div class="col-sm-10">
                                    <textarea type="text" name="short_descr" id="ckeditor1" class="form-control"
                                              placeholder="Краткое описание">{{$page->short_descr}}</textarea>
                                </div>

                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">Описание</label>
                                <div class="col-sm-10">
                                    <textarea type="text" name="descr" id="ckeditor" class="form-control" placeholder="Описание">{{$page->descr}}</textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">Meta title</label>
                                <div class="col-sm-10">
                                    <input type="text" name="meta_title" class="form-control" value="{{$page->meta_title}}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">Meta description</label>
                                <div class="col-sm-10">
                                    <textarea type="text" name="meta_description" class="form-control">{{$page->meta_description}}</textarea>
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

                            <div class="form-group col-sm-12">
                                <div class="btn-create text-right">
                                    <button type="submit" class="btn btn-add" title="Обновить">Обновить</button>
                                </div>
                            </div>

                        </div>


                    {{Form::close()}}
                </div>
            </div>
            </div>
        </section>
    </section>
   @include('admin.editor._html_editor')
@endsection
