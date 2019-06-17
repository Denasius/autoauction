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
                              'route' => ['attributes.update', $attribute->id],
                              'method' => 'put',
                              'class'=>'form-horizontal',
                              'role'>'form'
                              ])}}
                            <input type="hidden" name="id" value="{{$attribute->id}}">

                            <div class="form-group">
                                <label class="col-lg-2 control-label">Название</label>
                                <div class="col-lg-6">
                                    <input type="text" name="title" class="form-control" id="f-name" placeholder="Название типа атрибута"
                                           value="{{$attribute->title}}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-lg-2 control-label">Тип</label>
                                <div class="col-lg-6">
                                    <select name="type_id" class="form-control">
                                        @foreach($types as $item)
                                            <option value="{{$item->id}}" {{$item->id == $attribute->type_id ? 'selected' : false}} >{{$item->title}}</option>
                                        @endforeach
                                    </select>
                                </div>
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

@endsection