@extends('admin.layout')

@section('content')

    <!--main content start-->
    <section id="main-content">
        <section class="wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h3 class="page-header"><i class="icon_tools"></i> Создать атрибут</h3>
                    <ol class="breadcrumb">
                        <li><i class="fa fa-home"></i><a href="{{route('admin')}}">Главная</a></li>
                        <li><i class="icon_documents_alt"></i>Создать атрибут</li>
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
                                    <a href="{{route('attributes.index')}}">
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
                                            <h1>Создание нового атрибута</h1>
                                            {{Form::open(['route' => 'attributes.store', 'files' => true, 'class'=>'form-horizontal', 'role'>'form'])}}

                                            <div class="form-group">
                                                <label class="col-lg-2 control-label">Название</label>
                                                <div class="col-lg-6">
                                                    <input type="text" name="title" class="form-control" id="f-name" placeholder="Название типа атрибута" value="{{old('title')}}">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-lg-2 control-label">Тип</label>
                                                <div class="col-lg-6">
                                                    <select name="type_id" class="form-control">
                                                        @foreach($types as $item)
                                                            <option value="{{$item->id}}">{{$item->title}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            
                                            

                                            <div class="form-group">
                                                <div class="col-lg-offset-2 col-lg-10">
                                                    <button type="submit" class="btn btn-primary">Создать</button>
                                                    <button type="reset" class="btn btn-danger">Сброс</button>
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