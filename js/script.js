var tileLayer = new L.TileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
  'attribution': 'Map data © <a href="http://openstreetmap.org">OpenStreetMap</a> contributors'
});

var map = new L.Map('map', {
  'center': [49.428701069635686, 1.065610984658815],
  'zoom': 15,
  'layers': [tileLayer]
});

map.on('popupopen', function(openEvent){
  $(function () {
    $('#marker-popover').popover();
  });
});

var marker = L.marker([49.428701069635686, 1.065610984658815])
  .addTo(map)
  .bindPopup('Seine Innopolis');
