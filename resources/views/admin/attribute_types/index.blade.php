@extends('admin.layout')

@section('content')

    <!--main content start-->
    <section id="main-content">
        <section class="wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h3 class="page-header"><i class="fa fa-user-md"></i> Пользователи</h3>
                    <ol class="breadcrumb">
                        <li><i class="fa fa-home"></i><a href="{{route('admin')}}">Главная</a></li>
                        <li><i class="icon_documents_alt"></i>Все пользователи</li>
                    </ol>
                </div>
            </div>
            <div class="row">
                <!-- page start-->
                @include('admin.errors')
                <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading tab-bg-info">
                            <ul class="nav nav-tabs">
                                <li class="active">
                                    <a href="{{route('attribute_types.index')}}">
                                        <i class="icon-home"></i>
                                        Все типы атрибутов
                                    </a>
                                </li>
                                <li>
                                    <a href="{{route('attribute_types.create')}}">
                                        <i class="icon-user"></i>
                                        Создать тип атрибута
                                    </a>
                                </li>
                            </ul>
                        </header>
                        <div class="panel-body">
                            {{-- Все пользователи --}}
                            <div>
                                <div id="recent-activity" class="tab-pane active">
                                    <div class="profile-activity">
                                        <table class="table table-striped table-advance table-hover">
                                            <tbody>
                                            <tr>
                                                <th><i class="icon_profile"></i> ID</th>
                                                <th><i class="icon_calendar"></i> Title</th>
                                                <th style="text-align: center;"><i class="icon_cogs"></i> Действия</th>
                                            </tr>
                                            @foreach( $results as $result )

                                                <tr>
                                                    <td>{{$result->id}}</td>
                                                    <td>{{$result->title}}</td>
                                                    <td style="text-align: center;">
                                                        <div class="btn-group">

                                                            <a class="btn btn-info" href="{{route('attribute_types.edit', $result->id)}}">
                                                                <i class="icon_pencil-edit"></i>
                                                            </a>
                                                            {{Form::open(['route'=>['attribute_types.destroy', $result->id], 'method'=>'delete', 'class'=>'inline_block'])}}
                                                            <button type="submit" class="btn btn-danger" data-attr="delete">
                                                                <i class="icon_close_alt2"></i>
                                                            </button>
                                                            {{Form::close()}}
                                                        </div>
                                                    </td>
                                                </tr>

                                            @endforeach


                                            </tbody>
                                        </table>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>


                <!-- page end-->
        </section>
    </section>
    <!--main content end-->

@endsection