new Vue({
  el: '#app',
  data: {
    map: null,
    tileLayer: null,
    layers: [
      {
        id: 0,
        name: 'Restaurants',
        active: false,
        features: [
        ],
      },
      {
        id: 1,
        name: 'City/County Boundaries',
        active: false,
        features: [
        ],
      }
    ],
  },
  mounted() {
    this.initMap();
    // this.initLayers();
    this.map.on('click', function(e) {
      alert("Lat, Lon : " + e.latlng.lat + ", " + e.latlng.lng);
      console.log(e.latlng.lat);
      // e.latlng.lat = parseFloat(e.latlng.lat);
      // e.latlng.lng = parseFloat(e.latlng.lng); 
      L.marker([parseFloat(e.latlng.lat), parseFloat(e.latlng.lng)]).addTo(this.map);   
  });
  },
  methods: {
    layerChanged(layerId, active) {
      const layer = this.layers.find(layer => layer.id === layerId);
      
      layer.features.forEach((feature) => {
        if (active) {
          feature.leafletObject.addTo(this.map);
        } else {
          feature.leafletObject.removeFrom(this.map);
        }
      });
    },
    initLayers() {
      this.layers.forEach((layer) => {
        const markerFeatures = layer.features.filter(feature => feature.type === 'marker');
        const polygonFeatures = layer.features.filter(feature => feature.type === 'polygon');
        
        markerFeatures.forEach((feature) => {
          feature.leafletObject = L.marker(feature.coords)
            .bindPopup(feature.name);
        });
        
        polygonFeatures.forEach((feature) => {
          feature.leafletObject = L.polygon(feature.coords)
            .bindPopup(feature.name);
        });
      });
    },
    initMap() {
      this.map = L.map('map').setView([52.28, 104.28], 12);
      this.tileLayer = L.tileLayer(
        'https://cartodb-basemaps-{s}.global.ssl.fastly.net/rastertiles/voyager/{z}/{x}/{y}.png',
        {
          maxZoom: 18,
          attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>, &copy; <a href="https://carto.com/attribution">CARTO</a>',
        }
      );
        
      this.tileLayer.addTo(this.map);
      
    },
  },
});