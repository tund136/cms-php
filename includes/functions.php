<?php
// Controlling access to Admin
function redirect($location) {
    // Send a raw HTTP header
    header("Location: {$location}");
}
?>