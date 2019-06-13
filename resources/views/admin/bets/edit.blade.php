@extends('admin.layout')

@section('content')

    <!--main content start-->
    <section id="main-content">
        <section class="wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h3 class="page-header"><i class="fas fa-hand-holding-usd"></i> Редактировать Ставку</h3>
                    <ol class="breadcrumb">
                        <li><i class="fa fa-home"></i><a href="{{route('bets.index')}}">Главная</a></li>
                        <li><i class="icon_document_alt"></i>Редактировать Ставку</li>
                    </ol>
                </div>
            </div>
            <div class="row">
                @include('admin.errors')
                <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Редактировать страницу
                        </header>
                        <div class="panel-body">
                            {{Form::open([
                                'route' => ['bets.update', $item_info->id],
                                'files' => true,
                            'method'  => 'put',
                                'class' => 'form-horizontal'
                            ])}}

                            <div class="form-group">
                                <label class="col-sm-2 control-label">Ставка</label>
                                <div class="col-sm-10">
                                    <input type="number" name="price" step="0.01" class="form-control" placeholder="Ставка" value="{{$item_info->price}}">
                                </div>
                            </div>


                            <div class="form-group">
                                <label class="col-sm-2 control-label">Лот</label>
                                <div class="col-sm-10">
                                    {{ Form::select('lot_id',
                                       $lots,
                                       $item_info->lot_id,
                                       ['class'=>'form-control m-bot15'])
                                 }}
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">Пользователь</label>
                                <div class="col-sm-10">
                                    {{ Form::select('user_id',
                                    $users,
                                    $item_info->user_id,
                                    ['class'=>'form-control m-bot15'])
                                 }}
                                </div>
                            </div>

                            <div class="btn-create" style="margin-top: 20px; text-align: right;">
                                <button type="submit" class="btn btn-success" title="Обновить">Обновить</button>
                            </div>


                            {{Form::close()}}
                        </div>
                    </section>
                </div>
            </div>
            </div>
        </section>
    </section>
    <!--main content end-->

@endsection