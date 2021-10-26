$(document).ready(function() {


    /* inclusion page */
    addkeyListener("#flight");
    addkeyListener("#inputHotel");
    addkeyListener("#inputMeals");
    addkeyListener("#inputTours");
    addkeyListener("#inputGuide");
    addkeyListener("#inputInsurance");


    /* iteration input fields key listne rage */
    setIterationKeyListener();

    /* accomodation page/form */
    //addkeyListener(".key-listen");

    function setIterationKeyListener() {
        /* first get the duration of the package */
        $.ajax({
            type: "POST",
            url: "../PHP/temp_session.php",
            data: { "formID": "getDay" },
            dataType: "json",
            success: function(response) {

                /* bind key inputs */
                for (var i = 0; i < response[0]; i++) {
                    addkeyListener("#inputDestination" + i);
                    addkeyListener("#inputDescription" + i);
                }
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

    /* attach key listener to every input class of insert page */
    $(".key-listener").on("input", function() {
        ajax(".key-listener");
    });




    function ajax(elementID) {

        /* get the DOM teble */
        var formID = $(elementID).closest("form").attr('id');

        /* get the table data */
        var formData = new FormData(document.getElementById(formID));

        /* append the form id to the form data */
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

    /* display the selected filename */
    $('.image-input').on("change", function(e) {
        if (!$(this).get(0).files.length == 0) {
            var fileName = e.target.files[0].name;
            $(".image-output").text(fileName);

            ajax('.image-input');
        }
    });


});