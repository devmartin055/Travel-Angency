$(document).ready(function() {
    /* display the selected filename */
    $('#packageImage').change(function(e) {
        var fileName = e.target.files[0].name;
        $("#outSelected").text(fileName);
    });

    function initIncDecButtons(inc, dec, input) {

        /* decrement */
        $(dec).click(function(e) {
            e.preventDefault();

            /* get current value of the input */
            var val = parseInt($(input).val());

            var min = parseInt($(input).attr("min"));
            if (val >= min) {
                val--; /* decrement val if it is greater or equal to min attr */
                $(input).val(val);
            } else if (val < min - 1) { /* if val is negative and non zero */
                val = 0; /* set val to zero */
                $(input).val(val);
            }
        });

        /* increment */
        $(inc).click(function(e) {

            e.preventDefault();

            /* get current value of the input */
            var val = parseInt($(input).val());

            if (val < parseInt($(input).attr("max")) && val >= $(input).attr("min")) {
                var days = val + 1; /* increment value by 1 */
                $(input).val(days);

            } else if (val < $(input).attr("min")) { /* if value is less than min attr */
                var days = 1; /* make value by 1 */
                $(input).val(days);
            }
        });
    }

    initIncDecButtons("#incrementDays", "#decrementDays", "#daysValue");
    initIncDecButtons("#incNight", "#decNight", "#night");


    function fetchPackages() {
        $.ajax({
            type: "POST",
            url: "../PHP/admin_package_fetch.php",
            dataType: "text",
            success: function(response) {
                $("#packageTable tbody").html(response);
            }
        });
    }
    fetchPackages();

    $(document).on("click", ".delete-btn", function() {
        $("#delete").attr("value", $(this).val());
        $("#deleteModal").modal("show");
    });

    $("#delete").on("click", function() {
        var id = $(this).val();
        $.ajax({
            type: "POST",
            url: "../PHP/delete.php",
            data: { "package_id": id },
            dataType: "text",
            success: function(response) {
                /* console.log(response); */

                fetchPackages();
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