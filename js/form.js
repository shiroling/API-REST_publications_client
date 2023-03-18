
function publier(token) {

  let id = getId(token);
  const messageInput = document.querySelector('textarea[name="message"]');
  const message = messageInput.value;
  // On transmet au fichier php
  alert("id "+id);
    $.ajax({
    type: "GET",
    url: "../phpServicies/messages/enregistrer.php",
    data: {
      id: id,
      contenu: messageInput.value,
      nomChat: nomChat
    },
    success: function(response) {
      // Si l'enregistrement a réussi, réinitialiser le formulaire et rafraîchir la liste des messages
      messageInput.value = "";
      remplirChat(nomChat);
    },
    error: function(xhr, textStatus, errorThrown) {
      console.error(textStatus);
    }
  });
  // Empêcher le formulaire de se soumettre normalement
  return false;
}