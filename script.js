$(document).ready(function () {
    $(".login-form").hide();
    $(".register-li").addClass("active");

    $(".login-li").click(function () {
        $(this).addClass("active");
        $(".register-li").removeClass("active");
        $(".register-form").hide();
        $(".login-form").show();
    });

    $(".register-li").click(function () {
        $(this).addClass("active");
        $(".login-li").removeClass("active");
        $(".login-form").hide();
        $(".register-form").show();
    });

    $("#login-btn").click(function (event) {
        event.preventDefault(); // Prevent the default action of the click event

        // Retrieve input values
        var email = $("#email").val();
        var password = $("#password").val();

        // AJAX request to authenticate user
        $.ajax({
            url: "login.php", // Change to your server-side script for login authentication
            method: "POST",
            data: {
                email: email,
                password: password
            },
            success: function (response) {
                if (response !== "failure") {
                    // Redirect to home.html with userId as a query parameter

                    window.location.href = "home.php";
                } else {
                    alert("Invalid email or password. Please try again.");
                }
            },
            error: function (xhr, status, error) {
                console.error(xhr.responseText); // Log any error messages
            }
        });
    });


    $("#register-btn").click(function (event) {
        event.preventDefault(); // Prevent form submission

        // AJAX request to add account to XML file
        $.ajax({
            url: 'register.php', // Change to your server-side script for adding account to XML
            method: 'POST',
            data: {
                username: $('#registerUsername').val(),
                email: $('#registerEmail').val(),
                password: $('#registerPassword').val()
            },
            success: function (response) {
                alert(response); // Show success message
                $('#registerUsername').val("");
                $('#registerEmail').val("");
                $('#registerPassword').val("");
            },
            error: function (xhr, status, error) {
                console.error(xhr.responseText); // Log any errors
            }
        });
    });

    $("#update-btn").click(function (event) {
        event.preventDefault(); // Prevent form submission

        // AJAX request to add account to XML file
        $.ajax({
            url: 'updatetest.php', // Change to your server-side script for adding account to XML
            method: 'POST',
            data: {
                username: $('#newUsername').val(),
                email: $('#newEmail').val(),
                password: $('#newPassword').val()
            },
            success: function (response) {
                alert(response); // Show success message
                window.location.href = "profile.php";
            },
            error: function (xhr, status, error) {
                console.error(xhr.responseText); // Log any errors
            }
        });
    });





    //home page

});

