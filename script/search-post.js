// ricerca post
$(document).ready(function() {
  $(document).on('submit', '#searchForm', function(e) {
    e.preventDefault();
    var keywords = $(this).find("input[name='searchKeywords']").val();

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