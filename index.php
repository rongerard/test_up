<!DOCTYPE html>
<html>
<head>
    <title>Edit Profile</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <style>
        /* Modal styles */
        .modal {
            display: none; /* Hidden by default */
            position: fixed; /* Stay in place */
            z-index: 1; /* Sit on top */
            left: 0;
            top: 0;
            width: 100%; /* Full width */
            height: 100%; /* Full height */
            overflow: auto; /* Enable scroll if needed */
            background-color: rgb(0,0,0); /* Fallback color */
            background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
        }

        /* Modal content */
        .modal-content {
            background-color: #fefefe;
            margin: 15% auto; /* 15% from the top and centered */
            padding: 20px;
            border: 1px solid #888;
            width: 80%; /* Could be more or less, depending on screen size */
        }

        /* Close button */
        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Edit Profile</h1>
    <!-- Button to open the modal -->
    <button onclick="openModal()">Edit Profile</button>
</div>

<!-- The Modal -->
<div id="myModal" class="modal">

    <!-- Modal content -->
    <div class="modal-content">
        <span class="close" onclick="closeModal()">&times;</span>
        <form id="edit-profile-form">
            <label for="password">New Password:</label>
            <input type="password" id="password" name="password">
            <button type="button" onclick="editProfile()">Save</button>
        </form>
    </div>

</div>

<script>
    // Get the modal
    var modal = document.getElementById("myModal");

    // Function to open the modal
    function openModal() {
        modal.style.display = "block";
    }

    // Function to close the modal
    function closeModal() {
        modal.style.display = "none";
    }

    function editProfile() {
        // Retrieve the new password from the input field
        var newPassword = document.getElementById('password').value;

        // Make an AJAX request to edit the profile
        $.ajax({
            url: 'edit_profile.php',
            type: 'POST',
            data: { password: newPassword },
            success: function(response) {
                // Handle the success response (if needed)
                alert('Profile updated successfully');
                // Close the modal after successful update
                closeModal();
            },
            error: function(xhr, status, error) {
                // Handle errors (if any)
                console.error('Error:', error);
                alert('An error occurred while updating the profile');
            }
        });
    }
</script>

</body>
</html>
