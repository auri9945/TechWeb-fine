// elimina post
$(document).ready(function(){
// script pop up cancellazione post
    $("#popupClsDelete, #popupClDelete2").click(function() {
        // prendi il popup del login tramite ID - JQuery
        $("#myModalDelete").hide();
        $("#popupDlsDelete").attr("data-post-id", "");
    });

    $(document).on('click', '.cardEliminaPost', function(e) {
        var postId = $(this).attr("data-post-id");

        $("#popupDlsDelete").attr("data-post-id", postId);

        // prendi il popup del login tramite ID - JQuery
        $("#myModalDelete").show();
    });

    // popup per la cancellazione dei post
    $("#popupDlsDelete").click(function() {
        var postId = $(this).attr("data-post-id");
        $.ajax({
        url: 'api_server/deletePost.php',
        dataType: "json",
        type: 'GET',
        data: {postId : postId},
        success: function(data) {
            console.log(data.message);
            loadPosts();
            $("#myModalDelete").hide();
            $("#popupDlsDelete").attr("data-post-id", "");
        },
        error: function(data) {
            console.log(data.message);
        }
        });
    });
});