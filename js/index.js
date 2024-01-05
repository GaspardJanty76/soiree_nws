var countdownDate = new Date(2024, 6, 9, 0, 0, 0).getTime();
    
var countdownInterval = setInterval(function() {
    var now = new Date().getTime();
    var distance = countdownDate - now;

    var days = Math.floor(distance / (1000 * 60 * 60 * 24));
    var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));

    // Mise à jour des éléments HTML avec les valeurs calculées
    document.getElementById("days").innerHTML = days;
    document.getElementById("hours").innerHTML = hours;
    document.getElementById("minutes").innerHTML = minutes;

    if (distance < 0) {
        clearInterval(countdownInterval);
        document.getElementById("countdown").innerHTML = "EXPIRED";
    }
}, 1000);

// Fonction pour afficher le popup
function showPopup() {
    document.getElementById('overlay').style.display = 'flex';
    }

// Fonction pour fermer le popup
function closePopup() {
document.getElementById('overlay').style.display = 'none';
}