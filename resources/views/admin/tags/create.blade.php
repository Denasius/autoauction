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
                            {{Form::open(['route'=>'tags.store', 'class'=>'form-horizontal'])}}

                            <div class="form-group">
                                <label class="col-sm-2 control-label">Название</label>
                                <div class="col-sm-10">
                                    <input type="text" name="title" class="form-control" id="f-name" placeholder="Название типа атрибута" value="{{old('title')}}">
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
            <!-- page end-->
        </section>
    </section>
    <!--main content end-->

@endsection