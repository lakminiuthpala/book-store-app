<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Book Borrowed</title>
</head>
<body>
    <h1>Hi {{ $reader }},</h1>
    <p>You have borrowed the book "{{ $book }}" successfully and Borrowed Details are followed.</p>
    <ul>
        <li><strong>Reader:</strong> {{ $reader }}</li>
        <li><strong>Book:</strong> {{ $book }}</li>
        <li><strong>Borrowed On:</strong> {{ $borrowedDate }}</li>
        <li><strong>Return By:</strong> {{ $returnDate }}</li>
    </ul>
    <p>Please make sure to return the book on or before return date.</p>
    <p>If you have any information, please feel free to contact us.</p>
    <p>Thank you,</p>
</body>
</html>
