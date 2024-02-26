$(document).ready(function() {
  var tileLayer = new L.TileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    'attribution': 'Map data © <a href="http://openstreetmap.org">OpenStreetMap</a> contributors'
  });

  var map = new L.Map('map', {
    'center': [49.428701069635686, 1.065610984658815],
    'zoom': 15,
    'layers': [tileLayer],
    'scrollWheelZoom': false, // Désactiver le zoom avec la molette de la souris
    'doubleClickZoom': false, // Désactiver le zoom double clic
    'zoomControl': false,     // Désactiver les boutons de contrôle du zoom
    'dragging': false         // Désactiver le défilement de la carte en cliquant et en faisant glisser
  });

  var marker = L.marker([49.428701069635686, 1.065610984658815])
    .addTo(map)
    .bindPopup('Seine Innopolis');

  var firstClick = true;

  map.once('click', function() {
    if(firstClick) {
      map.scrollWheelZoom.enable(); // Activer le zoom avec la molette de la souris après le premier clic
      map.doubleClickZoom.enable(); // Activer le zoom double clic après le premier clic
      L.control.zoom({position: 'topright'}).addTo(map); // Ajouter le contrôle du zoom
      map.dragging.enable(); // Activer le défilement de la carte en cliquant et en faisant glisser
      firstClick = false;
    }
  });
});
