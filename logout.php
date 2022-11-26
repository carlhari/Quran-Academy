<?php
# Start the Session
session_start();

# Destroy the Session
if (session_destroy()) {
    header("location: login.php");
}
