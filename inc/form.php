<?php

$firstname =   $_POST['firstname'];
$lastname =   $_POST['lastname'];
$email =   $_POST['email'];

$errors = [
    'firstNameError' => '',
    'lastNameError' => '',
    'emailError' => '',
];

if(isset ($_POST ['submit'])){

    


// تحقق الاسم الاول
if(empty($firstname) ){
    $errors['firstNameError'] = 'يرجى ادخال الاسم الاول';
}
//تحقق الاسم الاخير
if(empty($lastname) ){
    $errors['lastNameError'] = 'يرجى ادخال الاسم الاخير';
}
//تحقق الايميل
if(empty($email) ){
    $errors['emailError'] = 'يرجى ادخال ايميل ';
}elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
    $errors['emailError'] = 'يرجى ادخال ايميل صحيح';
}

//تحقق لا يوجد اخطاء
if(!array_filter($errors)){
    $firstname =   mysqli_real_escape_string($conn, $_POST['firstname']);
    $lastname =    mysqli_real_escape_string($conn, $_POST['lastname']);
    $email =       mysqli_real_escape_string($conn, $_POST['email']);
      
    $sql = "INSERT INTO users(firstname, lastname, email) 
         VALUES ('$firstname' , '$lastname' , '$email')";

if(mysqli_query($conn, $sql)){
    header('Location: ' . $_SERVER['PHP_SELF']);
}else{
    echo 'Error: ' . mysqli_error($conn);
}
}



}



