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



<div class='col-md-4'></div>
<div class='col-md-4' style="padding-top: 30px;">
    <form role="form">
    <div class="form-group">
        <label>Название</label>
        <input type="email" class="form-control" placeholder="Введите название">
    </div>
    <div class="form-group">
        <label>Полное описание</label>
        <textarea style='margin: 0 auto; width: 587.667px; height: 150px; resize: none;'></textarea>
    </div>
    <div class="form-group" style="padding-left: 205px;">
        <form>
            <label>Цена:</label><label style='margin-left: 7px;'>{= cost =}</label><br>
            <input type="range" v-model='cost' min="100" max="1000"  step='10' value="500">
        </form>
    </div>
    <button class='btn btn-primary' type="submit" class="btn btn-default" style="margin: 0 0 0 39%;">Подтвердить</button>
    </form>
</div>
<div class='col-md-4'></div>

<script>

</script>

@endsection