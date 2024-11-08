<?php
$first_name = $last_name = $birth_date = $gender = $email = $phone_number = $password = $profession = '';

// define the fields errors
$fields = [
    'first-name' => 'First name field is empty!',
    'last-name' => 'Last name field is empty!',
    'birth-date' => 'Birthdate field is empty!',
    'opt-radio' => 'Select your gender!',
    'email' => 'Email field is empty!',
    'phone-number' => 'Phone number field is empty!',
    'password' => 'Password field is empty!',
    'profession' => 'Select your profession!',
];

$errors = [];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST)) {

        // a loop to check each field if it's empty
        foreach ($fields as $field => $message) {

            if (empty($_POST[$field])) {
                // assign the error message based on the field name
                $errors["{$field}-error"] = $message;
            }
        }

        if (empty($errors)) {
            try {
                $first_name = $_POST['first-name'];
                $last_name = $_POST['last-name'];
                $birth_date = $_POST['birth-date'];
                $gender = $_POST['opt-radio'];
                $email = $_POST['email'];
                $phone_number = $_POST['phone-number'];
                $password = $_POST['password'];
                $profession = $_POST['profession'];

                // trigger an exception manually (for testing)
                // throw new Exception('Oops, something went wrong!');

                echo 'First name: ' . $first_name . '<br>';
                echo 'Last name: ' . $last_name . '<br>';
                echo 'Birthdate: ' . $birth_date . '<br>';
                echo 'Gender: ' . $gender . '<br>';
                echo 'Email: ' . $email . '<br>';
                echo 'Phone: ' . $phone_number . '<br>';
                echo 'Password: ' . $password . '<br>';
                echo 'Profession: ' . $profession;
            } catch (Exception $e) {
                die('STOP BRO! THERE IS AN ERROR: ' . $e->getMessage());
            }
        }
    }
    // to list the array content (for testing only)
    // var_dump($errors);
}

function clean_data($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
}

function regex_check($expression, $data)
{
    if (!preg_match($expression, $data)) {
        return false;
    } else {
        return true;
    }
}
