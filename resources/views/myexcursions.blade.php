@extends('layouts.app')
@include('navbar')
@section('content')

<nav class="navbar navbar-default" role="navigation" style="display: block; margin-bottom: 0px;">
    <ul class="nav navbar-nav" style="width: 100%;">
        <li style="width: 50%; display: block; text-align: center;">
            <a  href="#">
                <h4>Купленные мной</h4>
            </a>
        </li> 
        <li style="width: 50%; display: block; text-align: center;">
            <a  href="#">
                <h4>Созданные мной</h4>
            </a>
        </li>
    </ul>
</nav>

<div style="width: 95%;margin: 0 auto;">
    <table class="table table-hover" style="text-align: center">
            <tr>
                <td> <p> Номер экскурсии </p> </td>
                <td> <P> Название </p> </td>
                <td> <P> Автор </p> </td>
                <td> <p> Дата создания </p> </td>
            </tr>
        @foreach ($excursions as $excursion)
            <tr>
                <td> <p> {{ $excursion->id   }} </p> </td>
                <td> <P> {{ $excursion->name }} </p> </td>
                <td> <P> {{ $excursion->user_id }} </p> </td>
                <td> <p> {{ date('M j, Y', strtotime($excursion->created_at)) }} </p> </td>
            </tr>

        @endforeach
    </table>
</div>

<div>
    <a href="http://voicesofrussia.com/myexcursions/add">
        <button class='btn btn-primary' style="position: absolute; bottom: 0px; right: 0px; width: 200px;margin: 0 40px 40px 0px;">
            Создать новую <br> экскурсию
        </button>
    </a>
</div>

@endsection