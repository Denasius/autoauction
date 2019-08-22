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


                            {{Form::open(['route' => 'attribute-category.store', 'files' => true, 'class'=>'form-horizontal', 'role'>'form'])}}

                            <div class="form-group">
                                <label class="col-sm-2 control-label">Название</label>
                                <div class="col-sm-10">
                                    <input type="text" name="title" class="form-control" id="f-name" placeholder="Название типа атрибута"
                                           value="{{old('name')}}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">Выводить в фильтр</label>
                                <div class="col-sm-10">
                                    
                                    <div class="radio" style="padding-left: 0;">
                                            <input name="add_filter" type="checkbox" value="1" class="checkbox-attr-categories">
                                        
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">Тип</label>
                                <div class="col-sm-10">
                                    <div class="radio">
                                        <label>
                                            {{Form::radio('type', 0, true)}}
                                            Общие атрибуты (select)
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label>
                                            {{Form::radio('type', 1, false)}}
                                            Дополнительные атрибуты (checkbox)
                                        </label>
                                    </div>
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
        </section>
    </section>

    <!--main content end-->

@endsection