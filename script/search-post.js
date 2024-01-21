// ricerca post
$(document).ready(function() {
  $(document).on('submit', '#search_form', function(e) {
    e.preventDefault();
    var keywords = $(this).find("input[name='searchKeywords']").val();

    // richiamo l'API per la ricerca
    $.ajax({
      url: 'api_server/searchPost.php',
      dataType: "json",
      type: 'GET',
      data: {keywords : keywords},
      success: function(data) {
        showPosts(data.postList);
      },
      error: function(data) {
        $("#postContainer").html('<p>' + data.responseJSON.message + '</p>');
      }
    });
  });
});