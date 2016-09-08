$(function () {
    $('.handle').on('click', function () {
        $('nav ul').toggleClass('showing');
    });
});


$(function() {
    $("#messages li").click(function() {
        $(this).fadeOut();
    });

    setTimeout(function() {
        $("ul#messages li.info").fadeOut();
    }, 2000);
});



function setFieldValue(fieldName, fieldValue) {
    let field = $("input[name='" + fieldName + "'], textarea[name='" + fieldName + "']");
    field.val(fieldValue);
}

function showValidationError(fieldName, errorMsg) {
    let field = $("input[name='" + fieldName + "'], textarea[name='" + fieldName + "']");
    field.after(
        $("<span class='validation-error'>").text(errorMsg)
    );
    field.focus();
}


