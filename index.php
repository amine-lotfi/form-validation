<?php include 'validation.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="css/styles.css" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" />

    <title>Registration Form</title>
</head>

<body>
    <section class="vh-100 gradient-custom">
        <div class="container py-5 h-100">
            <div class="row justify-content-center align-items-center h-100">
                <div class="col-12 col-lg-9 col-xl-7">
                    <div class="card shadow-2-strong card-registration bg-dark">
                        <div class="card-body p-4 p-md-5">
                            <h1 class="mb-4 pb-2 pb-md-0 mb-md-5 text-light"><i class="fa-brands fa-wpforms"></i> Registration Form</h1>
                            <h4 class="mb-4 pb-2 pb-md-0 mb-md-5 text-warning"><?php echo !empty($submit_message) ? '<i class="fa-regular fa-circle-check"></i> ' . htmlspecialchars($submit_message) : ''; ?></h4>
                            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">

                                <div class="row">
                                    <div class="col-md-6 mb-4">

                                        <div class="form-outline">
                                            <label class="form-label" for="firstName">First Name</label>
                                            <input type="text" name="first-name" id="firstName" class="form-control <?php echo !empty($errors['first-name-error']) ? 'is-invalid' : ''; ?>"
                                                placeholder="John" value="<?php echo isset($_POST['first-name']) ? htmlspecialchars($_POST['first-name']) : ''; ?>" />
                                            <div id="validationServerFeedback" class="invalid-feedback"><?php echo $errors['first-name-error']; ?></div>
                                        </div>

                                    </div>
                                    <div class="col-md-6 mb-4">

                                        <div class="form-outline">
                                            <label class="form-label" for="lastName">Last Name</label>
                                            <input type="text" name="last-name" id="lastName" class="form-control <?php echo !empty($errors['last-name-error']) ? 'is-invalid' : ''; ?>"
                                                placeholder="Doe" value="<?php echo isset($_POST['last-name']) ? htmlspecialchars($_POST['last-name']) : ''; ?>" />
                                            <div id="validationServerFeedback" class="invalid-feedback"><?php echo $errors['last-name-error']; ?></div>
                                        </div>

                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 mb-4 d-flex align-items-center">

                                        <div class="form-outline datepicker w-100">
                                            <label for="birthdayDate" class="form-label">Birthday</label>
                                            <input type="date" name="birth-date" class="form-control <?php echo !empty($errors['birth-date-error']) ? 'is-invalid' : ''; ?>" id="birthdayDate"
                                                value="<?php echo isset($_POST['birth-date']) ? htmlspecialchars($_POST['birth-date']) : ''; ?>" />
                                            <div id="validationServerFeedback" class="invalid-feedback"><?php echo $errors['birth-date-error']; ?></div>
                                        </div>

                                    </div>
                                    <div class="col-md-6 mb-4">

                                        <h6 class="mb-2 pb-1 gender <?php echo !empty($errors['opt-radio-error']) ? 'text-danger' : ''; ?>"><?php echo !empty($errors['opt-radio-error']) ? 'Select your gender:' : 'Gender'; ?></h6>

                                        <div class="form-check form-check-inline">
                                            <label class="form-check-label" for="femaleGender">Female</label>
                                            <input class="form-check-input" type="radio" name="opt-radio"
                                                id="femaleGender" value="female" <?php echo isset($_POST['opt-radio']) && $_POST['opt-radio'] == 'female' ? 'checked' : ''; ?> />
                                        </div>

                                        <div class="form-check form-check-inline">
                                            <label class="form-check-label" for="maleGender">Male</label>
                                            <input class="form-check-input" type="radio" name="opt-radio"
                                                id="maleGender" value="male" <?php echo isset($_POST['opt-radio']) && $_POST['opt-radio'] == 'male' ? 'checked' : ''; ?> />

                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 mb-4 pb-2">

                                        <div class="form-outline">
                                            <label class="form-label" for="emailAddress">Email</label>
                                            <input type="text" name="email" id="emailAddress" class="form-control <?php echo !empty($errors['email-error']) ? 'is-invalid' : ''; ?>"
                                                placeholder="john@gmail.com" value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email']) : ''; ?>" />
                                            <div id="validationServerFeedback" class="invalid-feedback"><?php echo $errors['email-error']; ?></div>
                                        </div>

                                    </div>
                                    <div class="col-md-6 mb-4 pb-2">

                                        <div class="form-outline">
                                            <label class="form-label" for="phoneNumber">Phone Number</label>
                                            <input type="text" name="phone-number" id="phoneNumber" class="form-control <?php echo !empty($errors['phone-number-error']) ? 'is-invalid' : ''; ?>"
                                                placeholder="+123456789" value="<?php echo isset($_POST['phone-number']) ? htmlspecialchars($_POST['phone-number']) : ''; ?>" />
                                            <div id="validationServerFeedback" class="invalid-feedback"><?php echo $errors['phone-number-error']; ?></div>
                                        </div>

                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-outline">
                                            <label class="form-label" for="password">Password</label>
                                            <input type="password" name="password" id="password" class="form-control <?php echo !empty($errors['password-error']) ? 'is-invalid' : ''; ?>"
                                                placeholder="Min: +5 characters" />
                                            <div id="validationServerFeedback" class="invalid-feedback"><?php echo $errors['password-error']; ?></div>
                                        </div>

                                    </div>

                                    <div class="col-6">
                                        <label class="form-label select-label d-block"
                                            for="profession">Profession</label>
                                        <select id="profession" name="profession" class="select form-select <?php echo !empty($errors['profession-error']) ? 'is-invalid' : ''; ?>">
                                            <option value="1" disabled selected>Profession</option>
                                            <option value="Student">Student</option>
                                            <option value="Teacher">Teacher</option>
                                            <option value="Other">Other</option>
                                        </select>
                                        <div id="validationServerFeedback" class="invalid-feedback"><?php echo $errors['profession-error']; ?></div>
                                    </div>
                                </div>

                                <div class="mt-4 pt-2">
                                    <input class="btn btn-primary" type="submit" value="Submit" />
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

</html>