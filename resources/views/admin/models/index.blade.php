@extends('admin.layout')

@section('content')

    <!--main content start-->
    <section id="main-content">
        <section class="wrapper">

        @include('admin.common.breadcrumb_header')


        <!-- page start-->
            <div class="row">
                @include('admin.errors')
                <div class="col-lg-12">

                    @if(! empty( $models ))
                        <section class="panel">

                            <table class="table table-striped table-advance table-hover">
                                <tbody>
                                <tr>
                                    <th>ID</th>
                                    <th>Название</th>
                                    <th>Бренд</th>
                                    <th class="text-right">Действия</th>
                                </tr>
                                @foreach ($models as $item)
                                    <tr>
                                        <td>{{$item->id}}</td>
                                        <td>{{$item->title}}</td>
                                        <td>{{$item->brand}}</td>
                                        <td class="text-right">
                                            <div class="btn-group event_btn_group">
                                                <a class="btn btn-primary" href="{{route('models.edit', $item->id)}}"><i class="fas fa-edit"></i></a>
                                                {{Form::open(['route'=>['models.destroy', $item->id], 'method'=>'delete', 'class'=>'inline_block'])}}
                                                <button type="submit" class="btn btn-danger" data-attr="delete"><i class="fas fa-trash-alt"></i></button>
                                                {{Form::close()}}
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach

                                </tbody>
                            </table>
                        </section>
                    @else
                        <section class="panel">
                            <header class="panel-heading">
                                <h1>Список Брендов пуст</h1>
                            </header>
                        </section>
                    @endif
                </div>
            </div>
            <!-- page end-->
        </section>
    </section>
    <!--main content end-->

@endsection