function getToken(username, password) {
    $.ajax({
        url: "http://localhost/R4.01/Projet/src/api/authServer.php",
        type: 'POST',
        data: {
            "username": username,
            "password": password
        },
        success: function(message) {
            alert(message);
        },
        error: function() {
            console.log("Erreur getToken");
        }
    });
}