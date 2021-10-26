$(document).ready(function() {
    function fetchBookData() {
        $.ajax({
            type: "POST",
            url: "../PHP/book_fetch.php",
            dataType: "TEXT",
            success: function(response) {
                $("#bookTable tbody").html(response);
            },
            error: function(xhr, status, error) {
                console.error(error);
                console.log(xhr);
            }
        });
    }
    /* delete button */
    $(document).on("click", ".delete", function() {
        $("#delete").attr("value", $(this).val());

        $("#viewBookModal").modal("hide");
        $("#deleteModal").modal("show");
    });

    /* if user clicked the confirm delete button */
    $("#delete").on("click", function() {
        var id = $(this).val();
        $.ajax({
            type: "POST",
            url: "../PHP/book_delete.php",
            data: { "book_id": id },
            dataType: "text",
            success: function(response) {
                console.log(response);
                fetchBookData();
                /* hide modal */
                $("#deleteModal").modal("hide");
            },
            error: function(xhr, status, error) {
                console.error(error);
                console.warn(xhr);
            }
        });
    });


    $(document).on("click", ".view", function() {
        var id = $(this).val();
        console.log(id);
        $.ajax({
            type: "POST",
            url: "../PHP/book_fetch_single.php",
            data: { "book_id": id },
            dataType: "json",
            success: function(response) {
                $("#package_name").val(response["package_name"]);
                $("#type_name").val(response["type_name"]);
                $("#number_of_person").val(response["number_of_person"]);
                $("#contact_person").val(response["contact_person"]);
                $("#contact_number").val(response["contact_number"]);
                $("#email").val(response["email"]);
                $("#country_origin").val(response["country_origin"]);
                $("#instruction").val(response["instruction"]);
                $("#viewModaldelete").val(response["book_id"]);
                $("#booked_date").val(response["booked_date"]);
                $("#date_departure").val(response["date_departure"]);
            },
            error: function(xhr, status, error) {
                console.error(error);
                console.warn(xhr);
            }
        });
    });

    fetchBookData();
    /* setInterval(function() { fetchBookData(); }, 3000); */
});