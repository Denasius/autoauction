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
                            {{Form::open(['route'=>['aliases.update', $info->id], 'method'=>'put',  'class' => 'form-horizontal'])}}
                            <input type="hidden" name="id" value="{{$info->id}}">
                            <input type="hidden" name="type" value="{{$info->type}}">
                            <input type="hidden" name="type_id" value="{{$info->type_id}}">

                            <div class="form-group">
                                <label class="col-sm-2 control-label">ЧПУ</label>
                                <div class="col-sm-10">
                                    <input class="form-control m-bot15" type="text" name="slug" placeholder="ЧПУ"
                                           value="{{$info->slug}}">
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
            <!-- page end-->
        </section>
    </section>
    <!--main content end-->

@endsection