@extends('admin.layout')

@section('content')
    <!--main content start-->
    <section id="main-content">
        <section class="wrapper">

            <div class="row">
                <div class="col-sm-12">
                    <ol class="breadcrumb">
                        <li><i class="fa fa-home"></i><a href="{{route('admin')}}">Главная</a></li>
                    </ol>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-12">
                    <div class="header_block">
                        <h1 class="page-header"><i class="fas fa-file"></i> Админ-панель</h1>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-12">
                    <p>
                        Здесь будет находится общая информация, либо виджеты, какие либо плюшки, в общем все, что захочет клиент
                    </p>
                </div>
                <!--/.col-->

            </div>
            <!--/.row-->

        </section>
    </section>
    <!--main content end-->

@endsection