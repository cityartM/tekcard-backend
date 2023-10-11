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

    /*** Delete confirmation ***/
   /* $('.delete_confirm').click(function (event) {
        var form = $(this).closest("form");
        event.preventDefault();
        Swal.fire({
            title: $(this).data("confirm-title"),
            text: $(this).data("confirm-text"),
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: $(this).data("confirm-delete"),
            cancelButtonText: $(this).data("confirm-cancel"),
        }).then((result) => {
            if (result.isConfirmed) {
                // Create a form element
                var form = document.createElement("form");

                // Set form attributes
                const hrefValue = $(this).attr('href');

                form.setAttribute("action", hrefValue);
                form.setAttribute("method", "POST");
                form.setAttribute("id", "deleteRoleForm");

                // Create a hidden input field for the DELETE method
                var methodField = document.createElement("input");
                methodField.setAttribute("type", "hidden");
                methodField.setAttribute("name", "_method");
                methodField.setAttribute("value", "DELETE");
                form.appendChild(methodField);

                // Create a CSRF token field
                var csrfField = document.createElement("input");
                csrfField.setAttribute("type", "hidden");
                csrfField.setAttribute("name", "_token");
                csrfField.setAttribute("value", "{{ csrf_token() }}");
                form.appendChild(csrfField);
                // Find the anchor element
                var anchor = document.querySelector(".delete_confirm");
                // Replace the anchor with the form
                anchor.parentNode.replaceChild(form, anchor);
                // Append the anchor to the form
                form.appendChild(anchor);
                form.submit();
            }
        })
    });*/

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


