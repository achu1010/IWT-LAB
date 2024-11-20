<?php
session_start();

// Destroy session on logout
if (isset($_POST['logout'])) {
    session_destroy();
    header('location:home.php');
    exit;
}
?>

<!-- HTML logout confirmation -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logout Confirmation</title>

    <style>
        /* Modal Background */
        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
        }

        /* Modal Content */
        .modal-content {
            background-color: #fff;
            margin: 15% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 30%;
            border-radius: 10px;
            text-align: center;
            position: relative;
        }

        /* Modal Title */
        .modal h1 {
            font-size: 24px;
            margin-bottom: 15px;
        }

        /* Close Button */
        .close {
            position: absolute;
            top: 10px;
            right: 15px;
            font-size: 20px;
            cursor: pointer;
        }

        /* Modal Buttons */
        .modal-buttons {
            display: flex;
            justify-content: space-around;
            margin-top: 20px;
        }

        .btn {
            padding: 10px 20px;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
            border: none;
        }

        .btn-confirm {
            background-color: #007BFF;
            color: white;
        }

        .btn-cancel {
            background-color: #6c757d;
            color: white;
        }

        /* Show the modal */
        .modal.show {
            display: block;
        }
    </style>
</head>
<body>
    <!-- The Modal -->
    <div id="logoutModal" class="modal">
        <div class="modal-content">
            <span class="close" id="closeModal">&times;</span>
            <h1>Are you sure you want to logout?</h1>
            <div class="modal-buttons">
                <form method="POST" action="">
                    <button type="submit" name="logout" class="btn btn-confirm">Yes, Logout</button>
                </form>
                <button class="btn btn-cancel" id="cancelBtn">Cancel</button>
            </div>
        </div>
    </div>

    <script>
        // Show the modal when page loads
        document.addEventListener('DOMContentLoaded', function() {
            var modal = document.getElementById('logoutModal');
            var closeModal = document.getElementById('closeModal');
            var cancelBtn = document.getElementById('cancelBtn');

            // Get the referring page (where the user came from)
            var referrer = document.referrer || 'home.php'; // Fallback to admin_portal.php if no referrer is available

            // Display the modal
            modal.classList.add('show');

            // Close modal when clicking the "x" button
            closeModal.onclick = function() {
                modal.classList.remove('show');
                window.location.href = referrer; // Redirect back to the referrer page
            }

            // Close modal when clicking the "Cancel" button
            cancelBtn.onclick = function() {
                modal.classList.remove('show');
                window.location.href = referrer; // Redirect back to the referrer page
            }

            // Close modal if clicking outside of the modal content
            window.onclick = function(event) {
                if (event.target == modal) {
                    modal.classList.remove('show');
                    window.location.href = referrer; // Redirect back to the referrer page
                }
            }
        });
    </script>
</body>
</html>
