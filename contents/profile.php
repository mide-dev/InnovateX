<?php 
require_once "./includes/profile/handle_profile_display.php";
require_once "./includes/users/utils/user_auth.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>InnovateX</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../assests/stylesheet/styles.css">
    <link rel="stylesheet" href="../assests/stylesheet/auth.css">
    <link rel="stylesheet" href="../assests/stylesheet/profile.css">
</head>
<body>
    <?php include("./components/header.php");?>

    <main class="container section">

        <!-- EDIT PROFILE -->
        <?php if (isset($_GET["edit-profile"])) {?>
            <div class="overlay-filter"></div>
            <div class="edit-profile-wrapper">
                <form class="close-edit-wrapper" method="post" action="./includes/profile/close_edit_profile_popup.php">
                    <button class="close-edit" name="close-edit-profile" type="submit">X</button>
                </form>
                <div class="edit-profile-content">
                <form method="post" action="./includes/profile/handle_edit_profile.php" class="edit-profile-form">
                    <h3>Edit Profile</h3>
                    <p class="padding-top-sm">Change Avatar:</p>
                    <?php is_update_error_or_success()?>
                    <div class="padding-top-sm">
                        <label class="profile-avatar-wrapper">
                            <input type="radio" name="profile-avatar" value="1">
                            <img src="../assests/images/avatar1.png" alt="profile-avatar">
                        </label>
                        <label class="profile-avatar-wrapper">
                            <input type="radio" name="profile-avatar" value="2">
                            <img src="../assests/images/avatar2.png" alt="profile-avatar">
                        </label>
                        <label class="profile-avatar-wrapper">
                            <input type="radio" name="profile-avatar" value="3">
                            <img src="../assests/images/avatar3.png" alt="profile-avatar">
                        </label>
                        <label class="profile-avatar-wrapper">
                            <input type="radio" name="profile-avatar" value="4">
                            <img src="../assests/images/avatar4.png" alt="profile-avatar">
                        </label>
                        <label class="profile-avatar-wrapper">
                            <input type="radio" name="profile-avatar" value="5">
                            <img src="../assests/images/avatar5.png" alt="profile-avatar">
                        </label>
                    </div>
                    <!--  -->
                    <div class="inline-form-input padding-top-md">
                        <div class="name-wrapper">
                            <label>Edit FirstName</label>
                            <input type="text" name="firstname" placeholder="John" value="<?php echo $data['customer_forename'] ?>">
                        </div>
                        <div class="name-wrapper">
                            <label>Edit LastName</label>
                            <input type="text" name="lastname" placeholder="Doe" value="<?php echo $data['customer_surname'] ?>">
                        </div>
                    </div>
                    <div class="edit-email-wrapper">
                        <label>Edit Email</label>
                        <input type="email" name="email" placeholder="johndoe@gmail.com" value="<?php echo $data['customer_email'] ?>">
                    </div>
                    <div class="edit-email-wrapper margin-bottom-lg">
                        <label>Edit Bio</label>
                        <textarea id="message" name="bio" rows="4" cols="50"><?php echo $data['customer_bio'] ?></textarea>
                    </div>
                    <h3>Change Password</h3>
                    <small>Leave fields empty if not changing password</small>
                    <div class="inline-form-input">
                        <div>
                            <label>Old Password</label>
                            <input type="password" name="old-password">
                        </div>
                        <div>
                            <label>New Password</label>
                            <input type="password" name="new-password">
                        </div>
                    </div>
                    <button class="btn btn-register update-profile" type="submit" name="update-profile">Update Profile</button>
                </form>
                </div>
            </div>
        <?Php }?>

            <!--VIEW PROFILE SECTION -->
        <section class=" margin-bottom-lg">
            <?php is_update_error_or_success()?>
            <div class="profile-cover-image">
                <img class="profile-image" src="../assests/images/avatar<?php echo $data['display_avatar']?>.png" alt="">
            </div>
            <div class="profile-background profile-details-wrapper">
                <div class="padding-top-md profile-details">
                    <p class="profile-name padding-bottom-sm"><?php echo $data['customer_forename'] . ' ' . $data['customer_surname']; ?></p>
                    <div class="profile-email-bdate flex-items padding-bottom-md">
                        <p class="profile-email"><?php echo $data['customer_email'] ?></p>
                        <span class="profile-dot">&middot;</span class="profile-dot">
                        <p class="profile-dob">🎂<?php echo $formatted_dob ?></p>
                    </div>
                    <p class="profile-date-joined">Date Joined: <?php echo $formatted_date_joined ?></p>
                </div>
                <form method="post" action="./includes/profile/click_edit_profile.php">
                    <button name="edit-profile" type="submit" class="btn edit-profile">edit profile</button>
                </form>
            </div>
        </section>
        <section class="profile-background" data-bio="true">
            <h3 class="padding-bottom-sm">Bio</h3>
            <p><?php echo $data['customer_bio'] ?></p>
        </section>
    </main>

    <?php include("./components/footer.php");?>
</body>
</html>