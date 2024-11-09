<?php
require 'config/connect_db.php';
require 'functions.php';

$first_name = $last_name = $birth_date = $gender = $email = $phone_number = $password = $profession = '';

$submit_message = '';

// to define the fields errors
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

                $profession = $_POST['profession'];

                $gender = $_POST['opt-radio'];

                if (regex_check('/^[A-Za-z]+$/', $_POST['first-name'])) {
                    $first_name = clean_data($_POST['first-name']);
                } else {
                    $errors['first-name-error'] = 'First name is invalid!';
                }

                if (regex_check('/^[A-Za-z]+$/', $_POST['last-name'])) {
                    $last_name = clean_data($_POST['last-name']);
                } else {
                    $errors['last-name-error'] = 'Last name is invalid!';
                }

                if (regex_check('/^(19|20)\d{2}-(0[1-9]|1[0-2])-(0[1-9]|[12][0-9]|3[01])$/', $_POST['birth-date'])) {
                    $birth_date = $_POST['birth-date'];
                } else {
                    $errors['birth-date-error'] = 'From 01-01-1900 to 31-12-2099 only!';
                }

                if (regex_check('/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/', $_POST['email'])) {
                    $email = $_POST['email'];
                } else {
                    $errors['email-error'] = 'Email is invalid!';
                }

                if (regex_check('/^\+([0-9]+)$/', $_POST['phone-number'])) {
                    $phone_number = $_POST['phone-number'];
                } else {
                    $errors['phone-number-error'] = 'Phone number is invalid!';
                }

                if (check_length($_POST['password'])) {
                    $password = $_POST['password'];
                } else {
                    $errors['password-error'] = 'Password is too short!';
                }

                if (empty($errors)) {

                    // hashing the password instead of storing it directly to the db
                    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

                    $stmt = $conn->prepare("INSERT INTO `users` (`first_name`, `last_name`, `birth_date`, `gender`, `email`, `phone_number`, `password`, `profession`) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
                    $stmt->bind_param('ssssssss', $first_name, $last_name, $birth_date, $gender, $email, $phone_number, $hashed_password, $profession);

                    if ($stmt->execute()) {
                        $submit_message = 'Form has been successfully submitted!';
                        //echo '<script>alert("Form has been successfully submitted!");</script>';

                        // clear the POST data: unset($_POST); / $_POST = [];
                        $_POST = [];
                    } else {
                        $submit_message = 'Oops something went wrong: ' . $stmt->error;
                        //echo "<script>alert('Oops something went wrong: " . $stmt->error . ");</script>";
                    }

                    // closing the statement and the connection
                    $stmt->close();
                    $conn->close();
                } else {
                    echo 'Data is NOT valid! <br>';
                    var_dump($errors);
                }

                // trigger an exception manually (for testing)
                // throw new Exception('Oops, something went wrong!');
            } catch (Exception $e) {
                die('STOP BRO! THERE IS AN ERROR: ' . $e->getMessage());
            }
        }
    }
    // to list the array content (for testing only)
    // var_dump($errors);
}
