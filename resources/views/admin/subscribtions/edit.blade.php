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
                            {{Form::open(['route'=>['subscribtions.update', $subscribe->id], 'method'=>'put',  'class' => 'form-horizontal'])}}
                            <input type="hidden" name="id" value="{{$subscribe->id}}">

                            <div class="form-group">
                                <label class="col-sm-2 control-label">Email</label>
                                <div class="col-sm-10">
                                    <input type="text" name="email" class="form-control" placeholder="Email" value="{{$subscribe->email}}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">Token</label>
                                <div class="col-sm-10">
                                    <input type="text" name="token" class="form-control" placeholder="Token" value="{{$subscribe->token}}">
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