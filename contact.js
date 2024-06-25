document.addEventListener('DOMContentLoaded', function() {
            const form = document.querySelector('form');
            const successMessage = document.createElement('div');
            successMessage.className = 'notification success';
            successMessage.innerText = 'Votre message a été envoyé avec succès !';
            successMessage.style.display = 'none';
            document.body.appendChild(successMessage);

            const errorMessage = document.createElement('div');
            errorMessage.className = 'notification error';
            errorMessage.innerText = 'Erreur lors de l\'envoi du message. Veuillez réessayer.';
            errorMessage.style.display = 'none';
            document.body.appendChild(errorMessage);

            form.addEventListener('submit', function(event) {
                event.preventDefault();

                // Simulate a successful form submission
                successMessage.style.display = 'block';
                setTimeout(() => {
                    successMessage.style.display = 'none';
                }, 3000);
                
                // In case of an error
                // errorMessage.style.display = 'block';
                // setTimeout(() => {
                //     errorMessage.style.display = 'none';
                // }, 3000);

                form.reset();
            });
        });