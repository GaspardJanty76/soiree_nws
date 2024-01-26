var tileLayer = new L.TileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
  'attribution': 'Map data © <a href="http://openstreetmap.org">OpenStreetMap</a> contributors'
});

var map = new L.Map('map', {
  'center': [49.430682, 1.08063],
  'zoom': 15,
  'layers': [tileLayer]
});

map.on('popupopen', function(openEvent){
  $(function () {
    $('#marker-popover').popover();
  });
});

var marker = L.marker([49.430682, 1.08063])
  .addTo(map)
  .bindPopup('NWS');
