<!DOCTYPE html>
<html>
<head>
    <title>New Student Registration</title>
</head>
<body>
    <h2>New Student Registration Notification</h2>
    <p>A new student has registered in the system:</p>
    
    <ul>
        <li><strong>Name:</strong> {{ $student->first_name }} {{ $student->last_name }}</li>
        <li><strong>Date of Birth:</strong> {{ $student->date_of_birth }}</li>
        <li><strong>NIC Number:</strong> {{ $student->nic_number }}</li>
        <li><strong>Username:</strong> {{ $student->username }}</li>
        <li><strong>Registration Date:</strong> {{ $student->created_at }}</li>
    </ul>
    
    <p>Please check the admin panel for more details.</p>
</body>
</html>