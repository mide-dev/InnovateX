<?php

if (isset($_POST['edit-profile'])) {
    header("Location: ../../profile.php?"."edit-profile");
    die();
}