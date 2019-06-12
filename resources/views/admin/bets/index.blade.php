@extends('admin.layout')

@section('content')

    <!--main content start-->
    <section id="main-content">
        <section class="wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h3 class="page-header"><i class="fas fa-hand-holding-usd"></i> Ставки</h3>
                    <ol class="breadcrumb">
                        <li><i class="fa fa-home"></i><a href="{{route('admin')}}">Главная</a></li>
                        <li><i class="fa fa-table"></i>Ставки</li>
                    </ol>
                </div>
            </div>
            <!-- page start-->
            <div class="row">
                <div class="col-lg-12">
                    <div class="add-button" style="margin-bottom:20px;">
                        <a class="btn btn-success" href="{{route('bets.create')}}" title="Добавить диск">Добавить</a>
                    </div>

                    <section class="panel">

                        <header class="panel-heading">
                            Список Ставок
                        </header>

                        <table class="table table-striped table-advance table-hover">
                            <tbody>


                            <tr>
                                <th><i class="fas fa-id-card-alt"></i> ID</th>
                                <th><i class="fas fa-hand-holding-usd"></i>  Ставка</th>
                                <th><i class="fas fa-car"></i> Лот</th>
                                <th><i class="fas fa-users"></i> Пользователь</th>
                                <th style="text-align: right;"><i class="icon_cogs"></i> Действия</th>
                            </tr>
                            @foreach ($bets as $item)
                                <tr>
                                    <td>{{$item->id}}</td>
                                    <td>{{$item->price}}</td>
                                    <td><a href="lots/{{$item->lot_id}}/edit">{{$item->lot_title}}</a></td>
                                    <td>{{$item->user_name}} ({{$item->user_email}})</td>
                                    <td style="text-align: right;">
                                        <div class="btn-group">
                                            <a class="btn btn-primary" href="{{route('bets.edit', $item->id)}}"><i class="icon_pencil-edit"></i></a>
                                            {{Form::open(['route'=>['bets.destroy', $item->id], 'method'=>'delete', 'class'=>'inline_block'])}}
                                            <button type="submit" class="btn btn-danger" data-attr="delete"><i class="icon_close_alt2"></i></button>
                                            {{Form::close()}}
                                        </div>
                                    </td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </section>
                </div>
            </div>
            <!-- page end-->
        </section>
    </section>
    <!--main content end-->

@endsection