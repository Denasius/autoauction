@extends('admin.layout')

@section('content')

    <!--main content start-->
    <section id="main-content">
        <section class="wrapper">

        @include('admin.common.breadcrumb_header')

            <!-- page start-->
            <div class="row">
                <div class="col-sm-12">

                    <section class="panel">

                        <table class="table table-striped table-advance table-hover">
                            <tbody>


                            <tr>
                                <th>ID</th>
                                <th>Изображение</th>
                                <th>Название</th>
                                <th class="text-right">Действия</th>
                            </tr>
                            @foreach ($sliders as $item)
                                <tr>
                                    <td>{{$item->id}}</td>
                                    <td><img src="/{{$item->image}}" alt="" style="width: 100px; height: 100px; object-fit: contain"></td>
                                    <td>{{$item->title}}</td>
                                    <td class="text-right">
                                        <div class="btn-group event_btn_group">
                                            <a class="btn btn-primary" href="{{route('sliders.edit', $item->id)}}"><i class="fas fa-edit"></i></a>
                                            {{Form::open(['route'=>['sliders.destroy', $item->id], 'method'=>'delete', 'class'=>'inline_block'])}}
                                            <button type="submit" class="btn btn-danger" data-attr="delete"><i class="fas fa-trash-alt"></i></button>
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