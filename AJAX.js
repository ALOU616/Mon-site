<script>
    document.getElementById('votingForm').addEventListener('submit', function(e) {
      e.preventDefault(); // Empêche le rechargement de la page
    
      var formData = new FormData(this);
    
      // Envoie les données via AJAX
      fetch('submit_vote.php', {
        method: 'POST',
        body: formData
      })
      .then(response => response.text())
      .then(data => {
        alert(data); // Affiche la réponse du serveur (par exemple, "Merci pour votre vote !")
      })
      .catch(error => {
        console.error('Erreur:', error);
      });
    });
    </script>
    