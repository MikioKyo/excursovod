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
        @foreach ($markers as $marker)

            <tr>
                <td> <p> {{ $marker->id   }} </p> </td>
                <td> <P> {{ $marker->name }} </p> </td>
                <td> <p> Создана: {{ date('M j, Y', strtotime($marker->created_at)) }} </p> </td>
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