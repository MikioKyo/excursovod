@extends('layouts.app')
<script src="https://unpkg.com/leaflet@1.2.0/dist/leaflet.js"></script>
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.2.0/dist/leaflet.css">
<!-- <link href="{{ asset('css/leaflet.css') }}" rel="stylesheet"> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Vue2Leaflet/1.0.2/vue2-leaflet.js"></script>

@include('navbar')

@section('content')
<style>
    .map {
        height: 90%;
        width: 100%;
    }
</style>
<div class="container mt-3 mt-sm-5" id="app">
  <div class="row">
    <div class="col-md-9">
      <div class="map" id="map"></div>
    </div>
    <div class="col-md-3">
      <div
        class="form-check"
        v-for="layer in layers"
        :key="layer.id"
      >
        <label class="form-check-label">
          <input
            class="form-check-input"
            type="checkbox"
            v-model="layer.active"
            @change="layerChanged(layer.id, layer.active)"
          />
          
        </label>
      </div>
    </div>
  </div>
</div>
<script src={{ asset('js/map.js') }}></script>
@endsection