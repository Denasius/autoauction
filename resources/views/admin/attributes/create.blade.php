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

                            {{Form::open(['route' => 'attributes.store', 'files' => true, 'class'=>'form-horizontal', 'role'>'form'])}}

                            <div class="form-group">
                                <label class="col-lg-2 control-label">Название</label>
                                <div class="col-lg-6">
                                    <input type="text" name="title" class="form-control" id="f-name" placeholder="Название типа атрибута"
                                           value="{{old('title')}}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-lg-2 control-label">Тип</label>
                                <div class="col-lg-6">
                                    <select name="type_id" class="form-control">
                                        @foreach($types as $item)
                                            <option value="{{$item->id}}">{{$item->title}}</option>
                                        @endforeach
                                    </select>
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