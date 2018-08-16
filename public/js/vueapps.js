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
        ],
        image: '',
        cost: '500',
        
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
                    id: Math.floor(Math.random() * 1000000),
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

            }, response => {

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

        onFileChange(e) {
            let files = e.target.files || e.dataTransfer.files;
            if (!files.length)
                return;
            this.createImage(files[0]);
        },

        createImage(file) {
            let reader = new FileReader();
            let vm = this;
            reader.onload = (e) => {
                vm.image = e.target.result;
            };
            reader.readAsDataURL(file);
        },

        upload(){
            axios.post('/api/upload',{image: this.image}).then(response => {

            });
        },
    }
})
