document.addEventListener('DOMContentLoaded', function() {
    const teamLinks = document.querySelectorAll('.teams p');
    const sections = document.querySelectorAll('.products-container');

    // Afficher toutes les sections au démarrage
    sections.forEach(section => {
        section.style.display = 'flex';
    });

    teamLinks.forEach(link => {
        link.addEventListener('click', function() {
            const teamId = this.dataset.team;
            sections.forEach(section => {
                if (section.id === teamId) {
                    section.style.display = 'flex';
                } else {
                    section.style.display = 'none';
                }
            });
        });
    });
});