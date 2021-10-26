$(document).ready(function() {
    $('#image').change(function(e) {
        if (!$(this).get(0).files.length == 0) {
            var fileName = e.target.files[0].name;
            $("#outSelected").text(fileName);
        }
    });
});