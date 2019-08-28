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
                                <th><i class="fas fa-id-card-alt"></i> ID</th>
                                <th><i class="fas fa-hand-holding-usd"></i>  Ставка</th>
                                <th><i class="fas fa-money-bill-alt"></i>  Общая стоимость</th>
                                <th><i class="fas fa-car"></i> Лот</th>
                                <th><i class="fas fa-users"></i> Пользователь</th>
                                <th class="text-right"><i class="icon_cogs"></i> Действия</th>
                            </tr>
                            @foreach ($bets as $item)
                                <tr>
                                    <td>{{$item->id}}</td>
                                    <td>{{$item->price}}</td>
                                    @if($item->lot_currency == 'BYN')
                                    <td>{{ number_format( ((int)$item->price + (int)$item->lot_price), 0, ' ', ' ' ) }} BYN</td>
                                    @elseif($item->lot_currency == 'EUR')
                                    <td>&#8364; {{ number_format( ((int)$item->price + (int)$item->lot_price), 0, ' ', ' ' ) }}</td>
                                    @endif
                                    <td><a href="lots/{{$item->lot_id}}/edit">{{$item->lot_title}}</a></td>
                                    <td>{{$item->user_name}} ({{$item->user_email}})</td>
                                    <td class="text-right">
                                        <div class="btn-group event_btn_group">
                                            <a class="btn btn-primary" href="{{route('bets.edit', $item->id)}}"><i class="fas fa-edit"></i></a>
                                            {{Form::open(['route'=>['bets.destroy', $item->id], 'method'=>'delete', 'class'=>'inline_block'])}}
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