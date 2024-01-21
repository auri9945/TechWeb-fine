// lettura dei post
$(document).ready(function() {
  loadPosts();
});

// funzione che richiama l'API per ottenere i post dal DB
function loadPosts() {
  $.ajax({
    url: 'api_server/readPosts.php',
    type: 'GET',
    dataType: "json",
    data: {},
    success: function(data) {
      showPosts(data.postList);
    }
});
}

