$(document).ready(function() {



    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (function() {
        'use strict'

        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.querySelectorAll('.needs-validation')

        // Loop over them and prevent submission
        Array.prototype.slice.call(forms)
            .forEach(function(form) {
                form.addEventListener('submit', function(event) {
                    if (!form.checkValidity()) {
                        event.preventDefault()
                        event.stopPropagation()
                    }

                    form.classList.add('was-validated')
                }, false)
            })
    })()


    /* display the selected filename */
    $('#image').change(function(e) {
        if (!$(this).get(0).files.length == 0) {
            var fileName = e.target.files[0].name;
            $("#outSelected").text(fileName);
        }
    });


    function fetchBlogData() {
        $.ajax({
            type: "POST",
            url: "../PHP/blog_fetch.php",
            dataType: "TEXT",
            success: function(response) {
                $("#blogTable tbody").html(response);
            },
            error: function(xhr, status, error) {
                console.error(error);
                console.log(xhr);
            }

        });
    }

    fetchBlogData();


    $(document).on("click", ".delete", function() {

        $("#delete").attr("value", $(this).val());
        $("#deleteModal").modal("show");

    });

    $("#delete").on("click", function() {
        var id = $(this).val();
        $.ajax({
            type: "POST",
            url: "../PHP/blog_delete.php",
            data: { "blog_id": id },
            dataType: "text",
            success: function(response) {
                console.log(response);
                fetchBlogData();
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