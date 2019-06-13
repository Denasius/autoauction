@extends('admin.layout')

@section('content')

    <!--main content start-->
    <section id="main-content">
        <section class="wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h3 class="page-header"><i class="fas fa-hand-holding-usd"></i>Создать Ставку</h3>
                    <ol class="breadcrumb">
                        <li><i class="fa fa-home"></i><a href="{{route('bets.index')}}">Главная</a></li>
                        <li><i class="icon_document_alt"></i>Создать ставку</li>
                    </ol>
                </div>
            </div>
            <div class="row">
                @include('admin.errors')
                <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Создание новой страницы
                        </header>
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



                            <div class="btn-create" style="margin-top: 20px; text-align: right;">
                                <button type="submit" class="btn btn-success" href="{{route('bets.create')}}" title="Сохранить">Сохранить</button>
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