@extends('layouts.app')
@include('navbar')
@section('content')
<script>
    window.Laravel = <?php echo json_encode([
        'csrfToken' => csrf_token(),
    ]); ?>
</script>

<div id="app" style="width: 100%;height: 94.5%;margin: -20px 0 0px 0;">
    <l-map :zoom=13 :center="center" @click="onMapClick">
      <l-tile-layer url="http://{s}.tile.osm.org/{z}/{x}/{y}.png"></l-tile-layer>
      <l-marker v-for="item in markers" :lat-lng="item.latlng" :id='item.id' @click="openPopup">
        <l-popup :options="{ autoClose: false, closeOnClick: true }" style="width: 300px; margin: 0px auto;text-align: center;">
            <div style="margin: 0 auto">
                <p><b style="margin: 0 auto;max-width: 180px;max-height: 70px;display: block; word-wrap: break-word;overflow: hidden;">Название: <h4>{=item.name=}</h4></b><br><input type="text" maxlength="40" size="30%" placeholder="Название" v-model='item.name'></p>
                <b style="margin: 0 auto;max-width: 180px;max-height: 70px;display: block; word-wrap: break-word;overflow: hidden;"><h6>{=item.text=}</h6></b> <br>
                <textarea placeholder="Описание" v-model='item.text' style="resize: none;"  maxlength="80" cols="30"></textarea>
            </div>
            <div class="panel-body">
                <p><b style="margin: 0 auto;max-width: 180px;max-height: 70px;display: block; word-wrap: break-word;overflow: hidden;">Картинка:</b></p>
                <div class="" style="max-height: 100px">
                    <img :src="image" class="img-responsive" style="max-width: 100px;">
                </div>
                <input type="file" id="files" v-on:change="onFileChange" class="inputfile" style="display: none;">
                <label for="files">Choose a file</label>
            </div>
            <button type="submit" class="btn btn-primary" style="margin: 15px 0 0px 0px;" @click="createMarker(item.name, item.text, item.latlng, item.pic)">
            Сохранить
            </button>
        </l-popup>
      </l-marker>
    </l-map>
</div>
@endsection