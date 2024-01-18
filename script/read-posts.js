$(document).ready(function() {
  loadPosts();
});

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

