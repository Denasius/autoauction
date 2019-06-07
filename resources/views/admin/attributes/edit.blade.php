@extends('admin.layout')

@section('content')

    <!--main content start-->
    <section id="main-content">
        <section class="wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h3 class="page-header"><i class="fa fa-user-md"></i> Редактировать артибут</h3>
                    <ol class="breadcrumb">
                        <li><i class="fa fa-home"></i><a href="{{route('admin')}}">Главная</a></li>
                        <li><i class="icon_documents_alt"></i>Редактировать атрибут</li>
                    </ol>
                </div>
            </div>
            <div class="row">
            </div>
            <!-- page start-->
            <div class="row">
                @include('admin.errors')
                <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading tab-bg-info">
                            <ul class="nav nav-tabs">
                                <li>
                                    <a href="{{ url()->previous() }}">
                                        <i class="icon-home"></i>
                                        Все атрибуты
                                    </a>
                                </li>
                                <li class="active">
                                    <a href="{{route('attributes.create')}}">
                                        <i class="icon-user"></i>
                                        Создать атрибут
                                    </a>
                                </li>
                            </ul>
                        </header>
                        <div class="panel-body">

                            <div>
                                <div id="edit-profile" class="tab-pane">
                                    <section class="panel">
                                        <div class="panel-body bio-graph-info">
                                            <h1>Изменить атрибут {{$attribute->title}}</h1>
                                            {{-- <form class="form-horizontal" role="form"> --}}
                                            {{Form::open([
                                              'route' => ['attributes.update', $attribute->id],
                                              'method' => 'put',
                                              'class'=>'form-horizontal',
                                              'role'>'form'
                                              ])}}
                                            <input type="hidden" name="id" value="{{$attribute->id}}">

                                            <div class="form-group">
                                                <label class="col-lg-2 control-label">Название</label>
                                                <div class="col-lg-6">
                                                    <input type="text" name="title" class="form-control" id="f-name" placeholder="Название типа атрибута" value="{{$attribute->title}}">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-lg-2 control-label">Тип</label>
                                                <div class="col-lg-6">
                                                    <select name="type_id" class="form-control">
                                                        @foreach($types as $item)
                                                            <option value="{{$item->id}}" {{$item->id == $attribute->type_id ? 'selected' : false}} >{{$item->title}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-lg-offset-2 col-lg-10">
                                                    <button type="submit" class="btn btn-primary">Изменить</button>
                                                    <a href="{{ url()->previous() }}" type="reset" class="btn btn-danger">Назад</a>
                                                </div>
                                            </div>
                                            {{Form::close()}}
                                        </div>
                                    </section>
                                </div>
                            </div>
                        </div>

                    </section>
                </div>
            </div>

            <!-- page end-->
        </section>
    </section>
    <!--main content end-->

@endsection