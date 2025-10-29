<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beautiful Contact Form</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        body {
            background: linear-gradient(135deg, #6a11cb 0%, #2575fc 100%);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }
        
        .container {
            max-width: 800px;
            width: 100%;
            background-color: white;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
            overflow: hidden;
        }
        
        .form-header {
            background: linear-gradient(to right, #6a11cb, #2575fc);
            color: white;
            padding: 30px;
            text-align: center;
        }
        
        .form-header h1 {
            font-size: 2.2rem;
            margin-bottom: 10px;
        }
        
        .form-header p {
            opacity: 0.9;
        }
        
        .form-body {
            padding: 30px;
        }
        
        .form-row {
            display: flex;
            flex-wrap: wrap;
            margin: 0 -15px;
        }
        
        .form-group {
            flex: 1 0 300px;
            padding: 0 15px;
            margin-bottom: 20px;
        }
        
        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            color: #333;
        }
        
        .form-control {
            width: 100%;
            padding: 12px 15px;
            border: 1px solid #ddd;
            border-radius: 8px;
            font-size: 16px;
            transition: all 0.3s;
        }
        
        .form-control:focus {
            border-color: #6a11cb;
            box-shadow: 0 0 0 3px rgba(106, 17, 203, 0.1);
            outline: none;
        }
        
        textarea.form-control {
            min-height: 120px;
            resize: vertical;
        }
        
        .radio-group {
            display: flex;
            gap: 20px;
            margin-top: 5px;
        }
        
        .radio-option {
            display: flex;
            align-items: center;
            gap: 8px;
        }
        
        .radio-option input {
            width: 18px;
            height: 18px;
        }
        
        .submit-btn {
            background: linear-gradient(to right, #6a11cb, #2575fc);
            color: white;
            border: none;
            padding: 14px 30px;
            font-size: 16px;
            border-radius: 8px;
            cursor: pointer;
            transition: all 0.3s;
            font-weight: 600;
            display: block;
            margin: 20px auto 0;
            width: 200px;
        }
        
        .submit-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(106, 17, 203, 0.4);
        }
        
        .error {
            color: #e74c3c;
            font-size: 14px;
            margin-top: 5px;
            display: block;
        }
        
        .success-message {
            background-color: #2ecc71;
            color: white;
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 20px;
            text-align: center;
        }
        
        @media (max-width: 600px) {
            .form-group {
                flex: 1 0 100%;
            }
            
            .form-header h1 {
                font-size: 1.8rem;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="form-header">
            <h1>Contact Us</h1>
            <p>Please fill out this form and we'll get back to you</p>
        </div>
        
        <div class="form-body">
            <?php
            // Define variables and set to empty values
            $name = $email = $gender = $comment = $website = "";
            $nameErr = $emailErr = $genderErr = "";
            $successMessage = "";
            
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                // Validate name
                if (empty($_POST["name"])) {
                    $nameErr = "Name is required";
                } else {
                    $name = test_input($_POST["name"]);
                    // Check if name only contains letters and whitespace
                    if (!preg_match("/^[a-zA-Z ]*$/", $name)) {
                        $nameErr = "Only letters and white space allowed";
                    }
                }
                
                // Validate email
                if (empty($_POST["email"])) {
                    $emailErr = "Email is required";
                } else {
                    $email = test_input($_POST["email"]);
                    // Check if email address is well-formed
                    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                        $emailErr = "Invalid email format";
                    }
                }
                
                // Validate website
                $website = test_input($_POST["website"]);
                // Check if URL address syntax is valid
                if (!empty($website) && !preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i", $website)) {
                    $website = "";
                }
                
                // Validate comment
                $comment = test_input($_POST["comment"]);
                
                // Validate gender
                if (empty($_POST["gender"])) {
                    $genderErr = "Gender is required";
                } else {
                    $gender = test_input($_POST["gender"]);
                }
                
                // If no errors, show success message
                if (empty($nameErr) && empty($emailErr) && empty($genderErr)) {
                    $successMessage = "Thank you for your submission! We'll get back to you soon.";
                    // Reset form values
                    $name = $email = $gender = $comment = $website = "";
                }
            }
            
            function test_input($data) {
                $data = trim($data);
                $data = stripslashes($data);
                $data = htmlspecialchars($data);
                return $data;
            }
            ?>
            
            <?php if (!empty($successMessage)): ?>
                <div class="success-message">
                    <?php echo $successMessage; ?>
                </div>
            <?php endif; ?>
            
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <div class="form-row">
                    <div class="form-group">
                        <label for="name">Full Name *</label>
                        <input type="text" id="name" name="name" class="form-control" value="<?php echo $name; ?>" placeholder="Enter your full name">
                        <?php if (!empty($nameErr)): ?>
                            <span class="error"><?php echo $nameErr; ?></span>
                        <?php endif; ?>
                    </div>
                    
                    <div class="form-group">
                        <label for="email">Email Address *</label>
                        <input type="email" id="email" name="email" class="form-control" value="<?php echo $email; ?>" placeholder="Enter your email">
                        <?php if (!empty($emailErr)): ?>
                            <span class="error"><?php echo $emailErr; ?></span>
                        <?php endif; ?>
                    </div>
                </div>
                
                <div class="form-row">
                    <div class="form-group">
                        <label for="website">Website</label>
                        <input type="text" id="website" name="website" class="form-control" value="<?php echo $website; ?>" placeholder="Enter your website (optional)">
                    </div>
                    
                    <div class="form-group">
                        <label>Gender *</label>
                        <div class="radio-group">
                            <div class="radio-option">
                                <input type="radio" id="male" name="gender" value="male" <?php if (isset($gender) && $gender=="male") echo "checked"; ?>>
                                <label for="male">Male</label>
                            </div>
                            <div class="radio-option">
                                <input type="radio" id="female" name="gender" value="female" <?php if (isset($gender) && $gender=="female") echo "checked"; ?>>
                                <label for="female">Female</label>
                            </div>
                            <div class="radio-option">
                                <input type="radio" id="other" name="gender" value="other" <?php if (isset($gender) && $gender=="other") echo "checked"; ?>>
                                <label for="other">Other</label>
                            </div>
                        </div>
                        <?php if (!empty($genderErr)): ?>
                            <span class="error"><?php echo $genderErr; ?></span>
                        <?php endif; ?>
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="comment">Comment</label>
                    <textarea id="comment" name="comment" class="form-control" placeholder="Enter your comment here..."><?php echo $comment; ?></textarea>
                </div>
                
                <button type="submit" class="submit-btn">Submit Form</button>
            </form>
        </div>
    </div>
</body>

</html>
