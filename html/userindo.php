<?php

include '../database.php';
if (isset($_POST['submit'])) {
    // Retrieve form data
    $username = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    // $age = $_POST["age"];
    $gender = $_POST["gender"];
    $job_title = $_POST["job_title"];

    $image_name = $_FILES["image"]["name"];
    $image_tmp_name = $_FILES["image"]["tmp_name"];
    $image_path = "../img/" . $image_name;
    move_uploaded_file($image_tmp_name, $image_path);

    $pdf_name = $_FILES["pdf"]["name"];
    $pdf_tmp_name = $_FILES["pdf"]["tmp_name"];
    $pdf_path = "../pdf/" . $pdf_name;
    move_uploaded_file($pdf_tmp_name, $pdf_path);

    // Process uploaded image
  
        
        // SQL to insert data
     $sql ="INSERT INTO user_info (user_name,user_email,user_phone,gender,job_title,profile_img,resume_pdf)
         VALUES ('$username','$email','$phone','$gender','$job_title','$image_path','$pdf_path')";
            // use exec() because no results are returned
            $conn->exec($sql);
            header("Location: #");
}else{

}
?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .card {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
            width: 500px;
        }
        .card h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        .form-group {
            margin-bottom: 20px;
            
        }
        label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }
        input[type="text"],
        input[type="email"],
        input[type="tel"],
        select,
        input[type="file"] {
            width: 90%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        input[type="radio"] {
            margin-right: 5px;
        }
        button {
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            background-color: #007bff;
            color: #fff;
            cursor: pointer;
            font-size: 16px;
        }
        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="card">
        <h2>Registration Form</h2>
        <form method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="phone">Phone Number:</label>
                <input type="tel" id="phone" name="phone" required>
            </div>
            <div class="form-group">
                <label for="image">Upload Image:</label>
                <input type="file" id="image" name="image" accept="image/*">
            </div>
            <div class="form-group">
                <label for="pdf">Upload PDF:</label>
                <input type="file" id="pdf" name="pdf" accept=".pdf">
            </div>
            <div class="form-group">
                <label for="gender">Gender: Male  <input type="radio" id="male" name="gender" value="male" required> Female <input type="radio" id="female" name="gender" value="female" required></label>
            </div>
            <div class="form-group">
                <label for="job_title">Job Title:</label>
                <select id="job_title" name="job_title" required>
                    <option value="">Select Job Title</option>
                    <option value="manager">Manager</option>
                    <option value="developer">Developer</option>
                    <option value="designer">Designer</option>
                    <option value="analyst">Analyst</option>
                </select>
            </div>
            <button type="submit" name="submit">Submit</button>
        </form>
    </div>
</body>
</html>
