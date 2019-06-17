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


                        <table class="table table-striped table-advance table-hover">
                            <tbody>
                            <tr>
                                <th>ID</th>
                                <th>Имя</th>
                                <th>Email</th>
                                <th>Город</th>
                                <th class="td_image">Аватар</th>
                                <th class="text-right">Действия</th>
                            </tr>
                            @foreach( $users as $user )
                                @if ( ! $user->is_admin )
                                    <tr>
                                        <td>{{$user->id}}</td>
                                        <td>{{$user->name}}</td>
                                        <td>{{$user->email}}</td>
                                        <td>{{$user->town}}</td>
                                        <td class="td_image">
                                            <img class="uploaded_image_index" src="{{$user->getImage()}}" alt="Avatar">
                                        </td>
                                        <td class="text-right">
                                            <div class="btn-group event_btn_group">
                                                <a class="btn btn-primary" href="{{route('users.edit', $user->id)}}"><i class="fas fa-edit"></i></a>
                                                {{Form::open(['route'=>['users.destroy', $user->id], 'method'=>'delete', 'class'=>'inline_block'])}}
                                                <button type="submit" class="btn btn-danger" data-attr="delete"><i class="fas fa-trash-alt"></i></button>
                                                {{Form::close()}}
                                            </div>
                                        </td>
                                    </tr>
                                @endif
                            @endforeach


                            </tbody>
                        </table>
                    </section>
                </div>
                <!-- page end-->
        </section>
    </section>
    <!--main content end-->

@endsection