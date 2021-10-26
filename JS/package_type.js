$(document).ready(function() {
    /* insert form */
    $("#insertForm").submit(function(e) {
        e.preventDefault();
        var formData = new FormData(this);
        $.ajax({
            type: "POST",
            url: "../PHP/package_type_insert.php",
            processData: false,
            contentType: false,
            data: formData,
            dataType: "text",
            success: function(response) {
                /*  console.log(response); */
                fetchType();
                $("#insertModal").modal("hide");
                $('#insertForm').trigger("reset");

            },
            error: function(xhr, status, error) {
                console.error(error);
                console.warn(xhr);
            }
        });
    });

    function fetchType() {
        $.ajax({
            url: "../PHP/package_type_fetch.php",
            dataType: "text",
            success: function(response) {
                $("#typeTable tbody").html(response);
            }
        });
    }

    fetchType();

    $(document).on('click', ".edit", function() {
        $("#updateModal").modal("show");
        var id = $(this).val();
        $("#type_id").val(id);

        $.ajax({
            type: "POST",
            url: "../PHP/package_type_fetch_single.php",
            data: { "type_id": id },
            dataType: "JSON",
            success: function(response) {
                $("input[name='type']").val(response["type_name"]);
                $("input[name='price']").val(response["price"]);
            }
        });
    });

    /* update form */
    $("#updateForm").submit(function(e) {
        e.preventDefault();
        var formData = new FormData(this);
        $.ajax({
            type: "POST",
            url: "../PHP/package_type_update.php",
            processData: false,
            contentType: false,
            data: formData,
            dataType: "text",
            success: function(response) {
                //console.log(response);
                $("#updateModal").modal("hide");
                fetchType();
            },
            error: function(xhr, status, error) {
                console.error(error);
                console.warn(xhr);
            }
        });
    });

    /* delete table table */
    $(document).on("click", ".delete", function() {

        $("#delete").attr("value", $(this).val());
        $("#deleteModal").modal("show");

    });

    /* delete in modal*/
    $("#delete").on("click", function() {
        var id = $(this).val();
        $.ajax({
            type: "POST",
            url: "../PHP/package_type_delete.php",
            data: { "type_id": id },
            dataType: "text",
            success: function(response) {
                /* console.log(response); */
                fetchType();
                /* hide modal */
                $("#deleteModal").modal("hide");

            },
            error: function(xhr, status, error) {
                console.error(error);
                console.warn(xhr);
            }
        });
    });
});