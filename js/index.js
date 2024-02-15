var countdownDate = new Date(2024, 4, 18, 0, 0, 0).getTime();

var countdownInterval = setInterval(function() {
    var now = new Date().getTime();
    var distance = countdownDate - now;

    var days = Math.floor(distance / (1000 * 60 * 60 * 24));
    var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    var seconds = Math.floor((distance % (1000 * 60)) / 1000);  

    document.getElementById("days").innerHTML = days;
    document.getElementById("hours").innerHTML = hours;
    document.getElementById("minutes").innerHTML = minutes;
    document.getElementById("seconds").innerHTML = seconds;

    if (distance < 0) {
        clearInterval(countdownInterval);
        document.getElementById("countdown").innerHTML = "EXPIRED";
    }
}, 1000);



document.addEventListener("DOMContentLoaded", function() {
    const popoverTriggers = document.querySelectorAll('.popover-trigger');

    popoverTriggers.forEach(trigger => {
        trigger.addEventListener('mouseover', function() {
            const popover = this.nextElementSibling;
            popover.style.display = 'block';
        });

        trigger.addEventListener('mouseout', function() {
            const popover = this.nextElementSibling;
            popover.style.display = 'none';
        });

        trigger.addEventListener('focus', function() {
            const popover = this.nextElementSibling;
            popover.style.display = 'block';
        });

        trigger.addEventListener('blur', function() {
            const popover = this.nextElementSibling;
            popover.style.display = 'none';
        });
    });
});