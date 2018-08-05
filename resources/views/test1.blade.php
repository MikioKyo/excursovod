@extends('layouts.app')
<script src="https://unpkg.com/leaflet@1.2.0/dist/leaflet.js"></script>
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.2.0/dist/leaflet.css">
<!-- <link href="{{ asset('css/leaflet.css') }}" rel="stylesheet"> -->

@include('navbar')

@section('content')
<script>
    window.Laravel = <?php echo json_encode([
        'csrfToken' => csrf_token(),
    ]); ?>
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Vue2Leaflet/1.0.2/vue2-leaflet.js"></script>
<div id="app" style="width: 100%;height: 94.5%;margin: -20px 0 0px 0;">
    <l-map :zoom=13 :center="center" @click="onMapClick">
      <l-tile-layer url="http://{s}.tile.osm.org/{z}/{x}/{y}.png"></l-tile-layer>
      <l-marker v-for="item in markers" :lat-lng="item.latlng" @click="openPopup">
        <l-popup :options="{ autoClose: false, closeOnClick: true }" style="width: 300px; margin: 0px auto;text-align: center;">
            <div style="margin: 0 auto">
                <p><b style="margin: 0 auto;max-width: 180px;max-height: 70px;display: block; word-wrap: break-word;overflow: hidden;">Название: <h4>{=item.name=}</h4></b><br><input type="text" maxlength="40" size="30%" placeholder="Название" v-model='item.name'></p>
                <b style="margin: 0 auto;max-width: 180px;max-height: 70px;display: block; word-wrap: break-word;overflow: hidden;"><h6>{=item.text=}</h6></b> <br>
                <textarea placeholder="Описание" v-model='item.text' style="resize: none;"  maxlength="80" cols="30"></textarea>
            </div>
            <button type="submit" style="margin: 15px 0 0px 0px;" @click="createMarker(item.name, item.text, item.latlng, item.pic)">
            Сохранить
            </button>
        </l-popup>
      </l-marker>
    </l-map>
</div>
   
   
        <script>
            var { LMap, LTileLayer, LMarker, LPopup } = Vue2Leaflet;
 
            var app = new Vue({
                el: '#app',
                components: { LMap, LTileLayer, LMarker, LPopup },
                delimiters: ["{=","=}"],
                data: {
                    zoom:13,
                    center: L.latLng(47.41763, -1.22875),
                    url:'http://{s}.tile.osm.org/{z}/{x}/{y}.png',
                    attribution:'&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors',
                    marker: L.latLng(47.413220, -1.219482),
                    markers: [
                        {
                            id: '0',
                            name: '',
                            latlng: L.latLng(47.417220, -1.24),
                            pic: 'placeholder',
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
                        alert("You clicked the map at " + e.latlng);
                        this.markers.push(
                            {
                                name: '',
                                latlng: L.latLng(e.latlng.lat, e.latlng.lng),
                                pic: 'placeholder',
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
                                        id: t.id,
                                        name: t.name,
                                        latlng: L.latLng(t.lat,t.lng),
                                        pic: t.pic,
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
                    },

                    createMarker: function(name, text, latlng, pic) {
                        this.$http.post('/map1', {
                                        name: name,
                                        lat: latlng.lat,
                                        lng: latlng.lng,
                                        pic: pic,
                                        text: text
                                    }, 
                                    {
                                    headers: {
                                        'X-CSRF-TOKEN': Laravel.csrfToken
                                    }
                                    }
                                ).then(response => {
                            // get status
                            response.status;

                            // get status text
                            response.statusText;

                            // get 'Expires' header
                            response.headers.get('Expires');       
                            console.log("test",this.$http)
                        }, response => {
                            // error callback
                        }); 
                    },
                }
            })
        </script>
@endsection