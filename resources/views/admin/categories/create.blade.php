@extends('admin.layout')

@section('content')

    <!--main content start-->
    <section id="main-content">
        <section class="wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h3 class="page-header"><i class="fa fa-file-text-o"></i> Добавление категории</h3>
                    <ol class="breadcrumb">
                        <li><i class="fa fa-home"></i><a href="{{route('admin')}}">Главная</a></li>
                        <li><i class="fa fa-table"></i><a href="{{route('categories.index')}}">Категории</a></li>
                        <li><i class="fa fa-file-text-o"></i>Добавить категорию</li>
                    </ol>
                </div>
            </div>
            <div class="row">
                @include('admin.errors')
                <div class="col-sm-12">
                    <section class="panel">
                        <header class="panel-heading">
                            <div class="col-sm-12">
                                Добавление категории
                            </div>
                        </header>

                        <div class="panel-body">
                            {{Form::open(['route'=>'categories.store', 'class'=>'form-horizontal'])}}

                            <div class="form-group">
                                <label class="col-sm-2 control-label">Название</label>
                                <div class="col-sm-10">
                                    <input type="text" name="title" class="form-control" value="{{old('title')}}" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">Описание</label>
                                <div class="col-sm-10">
                                    <textarea type="text" name="descr" id="ckeditor" class="form-control"></textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">Родительская категория</label>
                                <div class="col-sm-10">
                                    <select name="parent_category" class="form-control">
                                        <option value="0" selected>Нет</option>
                                        @foreach($categories as $item)
                                            <option value="{{$item->id}}">{{$item->title}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">Meta title</label>
                                <div class="col-sm-10">
                                    <input type="text" name="meta_title" class="form-control" value="{{old('meta_title')}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Meta description</label>
                                <div class="col-sm-10">
                                    <textarea type="text" name="meta_description" class="form-control">{{old('meta_description')}}</textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-lg-offset-2 col-lg-10">
                                    <button type="submit" class="btn btn-primary">Создать</button>
                                </div>
                            </div>
                            {{Form::close()}}
                        </div>
                    </section>
                </div>
            </div>
            <!-- page end-->
        </section>
    </section>
    <!--main content end-->

    <script src="https://cdn.ckeditor.com/4.11.4/standard/ckeditor.js"></script>
    <script type="text/javascript">
        CKEDITOR.replace('ckeditor');
    </script>
@endsection