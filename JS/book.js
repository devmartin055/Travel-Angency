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



    function fetchInclusion() {
        var formData = new FormData(document.getElementById("inclusion"));
        $.ajax({
            type: "POST",
            url: "../includes/inclusion.php",
            processData: false,
            contentType: false,
            cache: false,
            data: formData,
            dataType: "text",
            success: function(response) {
                $("#packageInformation").html(response);

                $("#btnInclusion").addClass("active");
                $("#btnItenary").removeClass("active");
                $("#btnAccomodation").removeClass("active");
            },
            error: function(xhr, status, error) {
                console.error(error);
                console.warn(xhr);
            }
        });
    }

    $("#btnItenary").click(function() {
        var formData = new FormData(document.getElementById("itenarary"));
        $.ajax({
            type: "POST",
            url: "../includes/itenerary.php",
            processData: false,
            contentType: false,
            cache: false,
            data: formData,
            dataType: "text",
            success: function(response) {
                $("#packageInformation").html(response);

                $("#btnItenary").addClass("active");
                $("#btnInclusion").removeClass("active");
                $("#btnAccomodation").removeClass("active");
            },
            error: function(xhr, status, error) {
                console.error(error);
                console.warn(xhr);
            }
        });

    });

    $("#btnAccomodation").click(function() {
        var formData = new FormData(document.getElementById("accomodation"));
        $.ajax({
            type: "POST",
            url: "../includes/accomodation.php",
            processData: false,
            contentType: false,
            cache: false,
            data: formData,
            dataType: "text",
            success: function(response) {
                $("#packageInformation").html(response);

                $("#btnAccomodation").addClass("active");
                $("#btnInclusion").removeClass("active");
                $("#btnItenary").removeClass("active");
            },
            error: function(xhr, status, error) {
                console.error(error);
                console.warn(xhr);
            }
        });

    });


    $("#btnInclusion").click(function() {
        fetchInclusion();
    });


    $(document).on('change', '#selectType', function() {
        var id = $("#selectType").val();
        /* check if has selected value */
        if (id != "" && id != null) {
            $.ajax({
                type: "POST",
                url: "../PHP/type_price_fetch.php",
                data: { "type_id": id },
                dataType: "json",
                success: function(response) {
                    $("#price").html("₱ " + response["price"]);
                },
                error: function(xhr, status, error) {
                    console.error(error);
                    console.warn(xhr);
                    $("#price").html("₱ 0");
                }
            });
        } else {
            /* print zero peso if there is no selected option */
            $("#price").html("₱ 0");
        }

    });


    /* date picker */
    $('.date-picker').datepicker({
        format: "MM d, yyyy",
        clearBtn: true,
        startDate: "today",
        daysOfWeekHighlighted: "0"
    });



    fetchInclusion();
});