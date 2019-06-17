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
                                'route' => 'bets.store',
                                'files' => true,
                                'class' => 'form-horizontal'
                            ])}}

                            <div class="form-group">
                                <label class="col-sm-2 control-label">Ставка</label>
                                <div class="col-sm-10">
                                    <input type="number" name="price" step="0.01" class="form-control" placeholder="Ставка">
                                </div>
                            </div>


                            <div class="form-group">
                                <label class="col-sm-2 control-label">Лот</label>
                                <div class="col-sm-10">
                                    {{ Form::select('lot_id',
                                       $lots,
                                       null,
                                       ['class'=>'form-control m-bot15'])
                                 }}
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">Пользователь</label>
                                <div class="col-sm-10">
                                    {{ Form::select('user_id',
                                       $users,
                                       null,
                                       ['class'=>'form-control m-bot15'])
                                 }}
                                </div>
                            </div>


                            <div class="form-group">
                                <div class="btn-create text-right col-sm-12">
                                    <button type="submit" class="btn btn-add" title="Сохранить">Сохранить</button>
                                </div>
                            </div>

                        </div>


                    {{Form::close()}}
                </div>
            </div>
            </div>
        </section>
    </section>
    <!--main content end-->

@endsection