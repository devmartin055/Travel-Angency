$(document).ready(function() {




    /* display the selected filename */
    $('#packageImage').change(function(e) {
        if (!$(this).get(0).files.length == 0) {
            var fileName = e.target.files[0].name;
            $("#outSelected").text(fileName);
            ajax('#packageImage');
        }
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
            ajax(dec);
        });

        /* increment */
        $(inc).click(function(e) {

            e.preventDefault();

            /* get current value of the input */
            var val = parseInt($(input).val());
            /* console.log(val); */
            if (val < parseInt($(input).attr("max")) && val >= $(input).attr("min")) {
                var days = val + 1; /* increment value by 1 */
                $(input).val(days);

            } else if (val < $(input).attr("min") || isNaN(val)) { /* if value is less than min attr */
                var days = 1; /* make value by 1 */
                $(input).val(days);
            }
            ajax(inc);
        });


    }

    function ajax(elementID) {

        /* get the DOM teble */
        var formID = $(elementID).closest("form").attr('id');

        /*  console.log(formID); */
        /* get the table data */
        var formData = new FormData(document.getElementById(formID));

        formData.append("formID", formID);

        var url = "../PHP/temp_session.php";
        $.ajax({
            type: "POST",
            url: url,
            cache: false,
            contentType: false,
            processData: false,
            data: formData,
            dataType: "text",

            success: function(response) {
                //console.log(response);
            },
            error: function(xhr, status, error) {
                console.error(error);
                console.warn(xhr);
            }
        });
    }

    function addkeyListener(inputID) {
        $(inputID).on("input", function() {
            ajax(inputID);
        });
    }


    /* confirm exit */
    function ConfirmDialog(message) {
        if (confirm(message)) {
            window.location.href = "admin_package.php";
        }
    };


    $("#backToAdmin").click(function(e) {
        e.preventDefault();
        ConfirmDialog("ARE YOU SURE?\nIf you click yes all data that you entered will be discarded.");
    });


    initIncDecButtons("#incrementDays", "#decrementDays", "#daysValue");
    initIncDecButtons("#incNight", "#decNight", "#night");


    addkeyListener("#inputPackageName");
    addkeyListener("#daysValue");
    addkeyListener("#night");
    addkeyListener("#inputDestination");


    /* confirm befor exit */

});