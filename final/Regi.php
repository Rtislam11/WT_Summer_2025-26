<?php
$name = "";
$age = "";
$email = "";
$membership = "";
$department = "";
$phone = "";

$nameError = "";
$ageError = "";
$emailError = "";
$membershipError = "";
$departmentError = "";
$phoneError = "";

$success = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    
    $name = trim($_POST["name"] ?? "");

    if (empty($name)) {
        $nameError = "Name is required";
    } elseif (!preg_match("/^[a-zA-Z ]+$/", $name)) {
        $nameError = "Only letters and spaces are allowed.";
    }

    
    $age = trim($_POST["age"] ?? "");

    if (empty($age)) {
        $ageError = "Age is required";
    } elseif (!is_numeric($age)) {
        $ageError = "Age must be numeric.";
    } elseif ($age < 18 || $age > 30) {
        $ageError = "Age must be between 18 and 30.";
    }

    
    $email = trim($_POST["email"] ?? "");

    if (empty($email)) {
        $emailError = "Email is required";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailError = "Invalid email format.";
    }

    
    $membership = $_POST["membership"] ?? "";

    if (empty($membership)) {
        $membershipError = "Please select a membership type.";
    }

    
    $department = $_POST["department"] ?? "";

    if (empty($department)) {
        $departmentError = "Please select your department.";
    }

    
    $phone = trim($_POST["phone"] ?? "");

    if (empty($phone)) {
        $phoneError = "Phone number is required";
    } elseif (!preg_match("/^[0-9]{11}$/", $phone)) {
        $phoneError = "Phone number must contain exactly 11 digits.";
    }

    
    if (
        empty($nameError) &&
        empty($ageError) &&
        empty($emailError) &&
        empty($membershipError) &&
        empty($departmentError) &&
        empty($phoneError)
    ) {
        $success = "Registration successful!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Student Technology Club Registration</title>
</head>

<body>

<h2>Student Technology Club Registration Form</h2>

<?php
if (!empty($success)) {
    echo "<p>$success</p>";
}
?>

<form method="POST" action="">

    
    <label>Student Name:</label>
    <input type="text" name="name"
           value="<?php echo htmlspecialchars($name); ?>">

    <?php
    if (!empty($nameError)) {
        echo "<p>$nameError</p>";
    }
    ?>

    <br><br>

    
    <label>Student Age:</label>
    <input type="number" name="age"
           value="<?php echo htmlspecialchars($age); ?>">

    <?php
    if (!empty($ageError)) {
        echo "<p>$ageError</p>";
    }
    ?>

    <br><br>

    
    <label>University Email:</label>
    <input type="email" name="email"
           value="<?php echo htmlspecialchars($email); ?>">

    <?php
    if (!empty($emailError)) {
        echo "<p>$emailError</p>";
    }
    ?>

    <br><br>

    
    <label>Membership Type:</label>
    <br>

    <input type="radio" name="membership" value="Regular Member"
        <?php if ($membership == "Regular Member") echo "checked"; ?>>
    Regular Member

    <br>

    <input type="radio" name="membership" value="Executive Member"
        <?php if ($membership == "Executive Member") echo "checked"; ?>>
    Executive Member

    <br>

    <input type="radio" name="membership" value="Volunteer"
        <?php if ($membership == "Volunteer") echo "checked"; ?>>
    Volunteer

    <?php
    if (!empty($membershipError)) {
        echo "<p>$membershipError</p>";
    }
    ?>

    <br>

    
    <label>Department:</label>

    <select name="department">
        <option value="">-- Select Department --</option>

        <option value="CSE"
            <?php if ($department == "CSE") echo "selected"; ?>>
            CSE
        </option>

        <option value="EEE"
            <?php if ($department == "EEE") echo "selected"; ?>>
            EEE
        </option>

        <option value="BBA"
            <?php if ($department == "BBA") echo "selected"; ?>>
            BBA
        </option>

        <option value="English"
            <?php if ($department == "English") echo "selected"; ?>>
            English
        </option>

        <option value="Architecture"
            <?php if ($department == "Architecture") echo "selected"; ?>>
            Architecture
        </option>
    </select>

    <?php
    if (!empty($departmentError)) {
        echo "<p>$departmentError</p>";
    }
    ?>

    <br><br>

    
    <label>Contact Number:</label>
    <input type="text" name="phone"
           value="<?php echo htmlspecialchars($phone); ?>">

    <?php
    if (!empty($phoneError)) {
        echo "<p>$phoneError</p>";
    }
    ?>

    <br><br>

    <input type="submit" value="Register">

</form>

</body>
</html>
