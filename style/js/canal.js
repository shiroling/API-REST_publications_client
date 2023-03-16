function remplirChat(nom_chat) {
  const url = "../phpServicies/messages/recuperer.php?nom_chat=" + encodeURIComponent(nom_chat);

  $.ajax({
    url: url,
    type: "GET",
    dataType: "json",
    success: function(messages) {
      let messagesDiv = $("#messages");

      if (messages.length > 1) {
        messagesDiv.empty();

        // Boucle inversé pour les messages
        for (let i = messages.length - 1; i >= 0; i--) {
          const message = messages[i];
          // Créer un élément de message
          const messageDiv = $("<div>").addClass("message");

          // Ajouter l'élément info
          const infoDiv = $("<div>").addClass("info");

          // Ajouter l'élément utilisateur
          const utilisateurP = $("<p>").addClass("utilisateur").text(message.sender);

          // Ajouter l'élément date et heure
          const dateEtHeureP = $("<p>").addClass("dateEtHeure").text(message.dateEnvoi);

          // Ajouter les éléments utilisateur et date et heure à infoDiv
          infoDiv.append(utilisateurP);
          infoDiv.append(dateEtHeureP);

          // Ajouter l'élément contenu
          const contenuP = $("<p>").addClass("contenu").text(message.contenu);

          // Ajouter l'élément info et contenu à messageDiv
          messageDiv.append(infoDiv);
          messageDiv.append(contenuP);

          // Ajouter messageDiv à messagesDiv
          messagesDiv.append(messageDiv);
        }
      }
    },
    error: function(xhr, textStatus, errorThrown) {
      console.error("Erreur lors de la requête AJAX.");
    }
  });
}

function remplirListeCanaux() {
  $.ajax({
    url: '../phpServicies/canaux/get_canaux.php',
    type: 'GET',
    dataType: 'json',
    success: function(canaux) {
      $('#listeCanaux').empty();

      $.each(canaux, function(index, canal) {
        const messageDiv = $('<div>').addClass('message');

        const canalP = $('<p>').text(canal.nom_canal);

        const canalA = $('<a>').attr('href', 'canal.php?chat=' + canal.nom_canal).text('Chatter');

        messageDiv.append(canalP);
        messageDiv.append(canalA);

        $('#listeCanaux').append(messageDiv);
      });
    },
    error: function(xhr, status, error) {
      console.error("Erreur lors de la requête AJAX : " + error);
    }
  });
}


