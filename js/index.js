<<<<<<< HEAD

        var countdownDate = new Date(2024, 4, 25, 0, 0, 0).getTime();
    
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
=======
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
>>>>>>> e5f0a9fc0ec41f78f854d6e91ed02084eb92f67f
