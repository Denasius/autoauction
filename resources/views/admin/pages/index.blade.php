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
                                <th><i class="icon_profile"></i> ID</th>
                                <th><i class="icon_calendar"></i> Название</th>
                                <th><i class="icon_calendar"></i> Категория</th>
                                <th class="text-right"><i class="icon_cogs"></i> Действия</th>
                            </tr>
                            @foreach ($posts as $post)
                                <tr>
                                    <td>{{$post->id}}</td>
                                    <td>{{$post->title}}</td>
                                    <td>{{$post->cat_title}}</td>
                                    <td class="text-right">
                                        <div class="btn-group event_btn_group">
                                            
                                            <a class="btn btn-primary" href="{{route('pages.edit', $post->id)}}"><i class="fas fa-edit"></i></a>
                                            {{Form::open(['route'=>['pages.destroy', $post->id], 'method'=>'delete', 'class'=>'inline_block'])}}
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