document.addEventListener('DOMContentLoaded', function () {
    // Date limite du compte à rebours (remplacez par votre date)
    const countdownDate = new Date('2024-01-10T11:00:00').getTime();

    // Mettez à jour le compte à rebours toutes les 1 seconde
    const countdownInterval = setInterval(function () {
        const currentDate = new Date().getTime();
        const timeDifference = countdownDate - currentDate;

        const days = Math.floor(timeDifference / (1000 * 60 * 60 * 24));
        const hours = Math.floor((timeDifference % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        const minutes = Math.floor((timeDifference % (1000 * 60 * 60)) / (1000 * 60));
        const seconds = Math.floor((timeDifference % (1000 * 60)) / 1000);

        const countdownElement = document.getElementById('countdown');
        countdownElement.innerHTML = `${days}j ${hours}h ${minutes}m ${seconds}s`;

        // Si le compte à rebours est terminé, affichez un message
        if (timeDifference < 0) {
            clearInterval(countdownInterval);
            countdownElement.innerHTML = 'Le compte à rebours est terminé!';

            // Affichez le bouton une fois que le compte à rebours est terminé
            document.getElementById('surveyButton').classList.remove('hidden');
        }
    }, 1000);
});
