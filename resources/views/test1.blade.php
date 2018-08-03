@extends('layouts.app')
<script src="https://unpkg.com/leaflet@1.2.0/dist/leaflet.js"></script>
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.2.0/dist/leaflet.css">
<!-- <link href="{{ asset('css/leaflet.css') }}" rel="stylesheet"> -->

@include('navbar')

@section('content')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Vue2Leaflet/1.0.2/vue2-leaflet.js"></script>
<div id="app" style="width: 100%;height: 94.5%;margin: -20px 0 0px 0;">
    <l-map :zoom=13 :center="center" @click="onMapClick">
      <l-tile-layer url="http://{s}.tile.osm.org/{z}/{x}/{y}.png"></l-tile-layer>
      <l-marker v-for="item in markers" :lat-lng="item.latlng" @click="openPopup">
        <l-popup :content="item.text" :options="{ autoClose: false, closeOnClick: true }"></l-popup>
      </l-marker>
    </l-map>
</div>
   
        <script>
            var { LMap, LTileLayer, LMarker, LPopup } = Vue2Leaflet;
 
            var app = new Vue({
                el: '#app',
                components: { LMap, LTileLayer, LMarker, LPopup },
                data: {
                    zoom:13,
                    center: L.latLng(52.2879, 104.28068),
                    url:'http://{s}.tile.osm.org/{z}/{x}/{y}.png',
                    attribution:'&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors',
                    marker: L.latLng(47.413220, -1.219482),
                    markers: [
                        {
                            latlng: L.latLng(47.417220, -1.24),
                            content: 'Another',
                            text: 'хоба'
                        }
                    ]
                },
                
                mounted() {
                    this.getMarkers();
                    console.log(this);
                },

                methods: {
                    onMapClick(e) {
                        // alert("You clicked the map at " + e.latlng);
                        this.markers.push(
                            {
                                latlng: L.latLng(e.latlng.lat, e.latlng.lng),
                                content: 'Another',
                                text: '123'
                            }
                        );
                        this.center = L.latLng(e.latlng.lat, e.latlng.lng);
                    },

                    openPopup: function (event) {
                      Vue.nextTick(() => {
                          event.target.openPopup();
                      })
                    },

                    getMarkers: function() {
                        // GET /someUrl
                        this.$http.get('/map').then(response => {
                            
                            this.arr = response.body.markers;
                            for (var i = this.arr.length - 1; i >= 0; i--) {
                                t = this.arr[i];
                                this.markers.push(
                                    {
                                        latlng: L.latLng(t.lat,t.lng),
                                        text: t.description
                                    }
                                );
                            } ; 
                            console.log("test", this.markers); 


                            // this.markers.concat(
                            //     response.body.markers
                            // );
                            // console.log(response.body.markers);
                            
                            // this.someData = response.body;

                        }, response => {
                            // error callback
                        });  
                    }
                }
            })
        </script>
@endsection