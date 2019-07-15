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
                            {{Form::open(['route'=>'categories.store', 'class'=>'form-horizontal'])}}

                            <div class="form-group">
                                <label class="col-sm-2 control-label">Название</label>
                                <div class="col-sm-10">
                                    <input type="text" name="title" class="form-control" value="{{old('title')}}" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">Тип шаблона</label>
                                <div class="col-sm-10">
                                     {{-- Значение value лучше не изменять, та как эти значения уже используются при выборке --}}
                                    <select name="template" class="form-control">
                                        <option value="default" selected>По умолчанию</option>
                                        <option value="auctions">Аукционы</option>
                                        <option value="blogs">Новостной</option>
                                       
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">Описание</label>
                                <div class="col-sm-10">
                                    <textarea type="text" name="descr" id="ckeditor" class="form-control"></textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">Родительская категория</label>
                                <div class="col-sm-10">
                                    <select name="parent_category" class="form-control">
                                        <option value="0" selected>Нет</option>
                                        @foreach($categories as $item)
                                            <option value="{{$item->id}}">{{$item->title}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">Meta title</label>
                                <div class="col-sm-10">
                                    <input type="text" name="meta_title" class="form-control" value="{{old('meta_title')}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Meta description</label>
                                <div class="col-sm-10">
                                    <textarea type="text" name="meta_description" class="form-control">{{old('meta_description')}}</textarea>
                                </div>
                            </div>

                            <div class="btn-create text-right">
                                <button type="submit" class="btn btn-add" title="Создать">Создать</button>
                            </div>
                            {{Form::close()}}
                        </div>
                    </section>
                </div>
            </div>
            <!-- page end-->
        </section>
    </section>
    <!--main content end-->

    {{-- html editor --}}
    @include('admin.editor._html_editor')
@endsection