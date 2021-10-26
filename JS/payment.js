$(document).ready(function() {
    $('#sandbox-container .input-group.date').datepicker({
        format: "MM d, yyyy",
        clearBtn: true,
        orientation: "bottom auto",
        autoclose: true,
        todayHighlight: true
    });


    /* detect radio change */
    $('input[type=radio][name=paymentOption]').change(function() {
        if (this.value == 'Credit Card') { /* show input fields for credit card if  radio was checked*/
            $("#cardInformation").collapse("show");
            AddRequiredAttr(); //add required attribute to card informations
        } else {
            $("#cardInformation").collapse("hide");
            removeRequireAttr(); //remove the required attribute to credit card information input fields
        }
    });


    function AddRequiredAttr() {
        $("#cardInformation input").prop("required", true);
    }

    function removeRequireAttr() {
        $("#cardInformation input").prop("required", false);
    }
});