@extends('layouts.app')
@section('content')
    <div class="">
        <div class="flex-center position-ref full-height">
            <div class="content" style="margin: 0 auto;width: 220px;">
                <div class="title m-b-md" style="margin: 100px 0 100px 0px;">
                    <h1>Экскурсовод</h1>
                </div>

                <div class="" style="padding: 0px 20px 37px 20px;">
                    <a href="/register"><button type="button" class="btn btn-primary">Зарегистрироваться</button></a>
                </div>
                <div class="" style="padding: 0px 0px 0px 20px;margin: 0 auto;">
                    <p>Уже зарегистрированы?</p>
                    <a href="/login"><button type="button" class="btn btn-primary" style="margin: 2px 20px 20px 43px;"
                    >Войти</button></a>
                </div>
            </div>
        </div>
    </div>
@endsection