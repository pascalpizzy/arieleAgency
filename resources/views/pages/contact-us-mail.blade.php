<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Form</title>
</head>
<body>
    <h1>Contact Message</h1>
    <p>Name : {{$details['name']}}</p>
    <p>Email : {{$details['email']}}</p>
    <p>Subject : {{$details['subject']}}</p>
    <p>Message : {{$details['message']}}</p>
</body>
</html> -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ArieleAgency Mail</title>
    <style>
        /* Reset default styling */
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            line-height: 1.4;
            color: #333333;
        }

        /* Container */
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f8f8f8;
        }

        /* Header */
        .header {
            text-align: center;
            margin-bottom: 20px;
        }

        /* Content */
        .content {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        /* Footer */
        .footer {
            text-align: center;
            margin-top: 20px;
            color: #777777;
            font-size: 12px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <h1>{{$details['subject']}}</h1>
        </div>
        <div class="content">
            <h2>from : {{$details['name']}},</h2>
            <p>Email : {{$details['email']}}</p>
            <p>{{$details['message']}}.</p>
            <p>Sincerely,</p>
        </div>
        <div class="footer">
            <p>&copy; <?php echo date("Y"); ?> ArieleAgency. All rights reserved.</p>
        </div>
    </div>
</body>

</html>
