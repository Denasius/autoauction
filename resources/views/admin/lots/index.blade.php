@extends('admin.layout')

@section('content')

    <!--main content start-->
    <section id="main-content">
        <section class="wrapper">

        @include('admin.common.breadcrumb_header')
            
            <!-- Секция для активных лотов -->
            <div class="row">
                <div class="col-lg-12">
                    <h3>Активные лоты</h3>
                </div>
                <div class="col-lg-12">
                    @if(! empty( $lots ))
                        <section class="panel">
                            <table class="table table-striped table-advance table-hover">
                                <tbody>
                                <tr>
                                    <th>ID</th>
                                    <th>Название</th>
                                    <th class="text-right">Действия</th>
                                </tr>
                                @foreach ($lots as $lot)
                                    <tr>
                                        <td>{{$lot->id}}</td>
                                        <td>{{$lot->title}}</td>

                                        <td class="text-right">
                                            <div class="btn-group event_btn_group">
                                                <a class="btn btn-primary" href="{{route('lots.edit', $lot->id)}}"><i class="fas fa-edit"></i></a>
                                                {{Form::open(['route'=>['lots.destroy', $lot->id], 'method'=>'delete', 'class'=>'inline_block'])}}
                                                <button type="submit" class="btn btn-danger" data-attr="delete"><i class="fas fa-trash-alt"></i>
                                                </button>
                                                {{Form::close()}}
                                            </div>
                                        </td>
                                        </td>
                                    </tr>
                                @endforeach

                                </tbody>
                            </table>
                        </section>
                    @else
                        <section class="panel">
                            <header class="panel-heading">
                                <h1>Список лотов пуст</h1>
                            </header>
                        </section>
                    @endif
                </div>
            </div>

            <!-- Секция для неактивных лотов -->
            @if( $unactive_lots->count() >= 1 )
                <div class="row">
                     <div class="col-lg-12">
                         <h3>Неактивные лоты</h3>
                     </div>
                    
                    <div class="col-lg-12">
                        <section class="panel">
                            <table class="table table-striped table-advance table-hover">
                                <tbody>
                                <tr>
                                    <th>ID</th>
                                    <th>Название</th>
                                    <th class="text-right">Действия</th>
                                </tr>
                                @foreach ($unactive_lots as $lot)
                                    <tr>
                                        <td>{{$lot->id}}</td>
                                        <td>{{$lot->title}}</td>

                                        <td class="text-right">
                                            <div class="btn-group event_btn_group">
                                                <a class="btn btn-primary" href="{{route('lots.edit', $lot->id)}}"><i class="fas fa-edit"></i></a>
                                                {{Form::open(['route'=>['lots.destroy', $lot->id], 'method'=>'delete', 'class'=>'inline_block'])}}
                                                <button type="submit" class="btn btn-danger" data-attr="delete"><i class="fas fa-trash-alt"></i>
                                                </button>
                                                {{Form::close()}}
                                            </div>
                                        </td>
                                        </td>
                                    </tr>
                                @endforeach

                                </tbody>
                            </table>
                        </section>
                    </div>
                </div>
            @endif
        </section>
    </section>
    <!--main content end-->

@endsection