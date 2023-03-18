function remplirChat(nom_chat, role) {
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

function getPublications(token) {
  // Construct the URL
  const url = 'http://localhost/api/src/api/appServer.php';

  // Create the request headers
  const headers = {
    'Authorization': 'Bearer ' + token
  };

  // Send the GET request with the headers
  fetch(url, {
    method: 'GET',
    headers: headers
  })
  .then(response => {
    if (response.ok) {
      // Handle successful response here
      return response.json();
    } else {
      // Handle error response here
      throw new Error('Request failed');
    }
  })
  .then(data => {
    // Handle response data here
    console.log("25565"+data);
  })
  .catch(error => {
    // Handle error here
    console.error("25565"+error);
  });
}