<?php
    $name = $_POST['username'];
    $password = $_POST['password'];

    // Database connection
    $conn = new mysqli('localhost', 'root', '', 'test1');
    
    // Check connection
    if ($conn->connect_error) {
        die("Login Failed: " . $conn->connect_error);
    } else {
        // Prepared statement to insert username and password
        $stmt = $conn->prepare("INSERT INTO login (username, password) VALUES (?, ?)");
        
        // Fix blind_param to bind_param
        $stmt->bind_param("ss", $name, $password);
        
        // Execute the query
        if ($stmt->execute()) {
            echo "Sign Up Successful";
        } else {
            echo "Error: " . $stmt->error;
        }

        // Close the statement and connection
        $stmt->close();
        $conn->close();
    }
?>
