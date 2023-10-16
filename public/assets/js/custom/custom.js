$(document).ready(function () {
    /*** Hide Alert ***/
    jQuery(document).ready(function () {
        setTimeout(function () {
            $('#alert').addClass('hide');
        }, 8000);
        setTimeout(function () {
            $('#alertContainer').fadeOut("slow", function () {
                $(this).addClass('inactive');
            });
        }, 500);
    });

    /*** Save or Update Button ***/
    var button = document.querySelector("#saveOrUpdateBtn");

   // Handle button click event
    button.addEventListener("click", function () {
        // Activate indicator
        button.setAttribute("data-kt-indicator", "on");

        // Disable indicator after 3 seconds
        setTimeout(function () {
            button.removeAttribute("data-kt-indicator");
        }, 3000);
    });





});


