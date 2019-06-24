@extends('admin.layout')

@section('content')

    <!--main content start-->
    <section id="main-content">
        <section class="wrapper">

            @include('admin.common.breadcrumb_header')

            <div class="row">
                <!-- page start-->

                @include('admin.errors')

                <div class="col-lg-12">
                    <section class="panel">

                        <div class="panel-body">

                            <table class="table table-striped table-advance table-hover">
                                <tbody>
                                <tr>
                                    <th>ID</th>
                                    <th>Title</th>
                                    <th>Тип</th>
                                    <th class="text-right">Действия</th>
                                </tr>
                                @foreach( $results as $result )

                                    <tr>
                                        <td>{{$result->id}}</td>
                                        <td>{{$result->title}}</td>
                                        <th>@if($result->type == 0) Общие @else Дополнительные @endif </th>
                                        <td class="text-right">
                                            <div class="btn-group event_btn_group">
                                                <a class="btn btn-primary" href="{{route('attribute-category.edit', $result->id)}}"><i class="fas fa-edit"></i></a>
                                                {{Form::open(['route'=>['attribute-category.destroy', $result->id], 'method'=>'delete', 'class'=>'inline_block'])}}
                                                <button type="submit" class="btn btn-danger" data-attr="delete"><i class="fas fa-trash-alt"></i></button>
                                                {{Form::close()}}
                                            </div>
                                        </td>
                                    </tr>

                                @endforeach


                                </tbody>
                            </table>

                        </div>

                    </section>
                </div>
            </div>
        </section>
    </section>
    <!--main content end-->

@endsection