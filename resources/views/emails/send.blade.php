<html>
<head></head>
<body>
<h1>SUBJECT: Registration on Procurment Portal</h1>
<p>Dear {{$company}},</p>
<p>Please be informed that you have been registered on the procurement portal. Find below the details of same.</p>
<br/>
<p><strong>Contact Name: </strong> {{$company}}</p>
<p><strong>Contact Person: </strong> {{$name}}</p>
<p><strong>Email: </strong> {{$email}}</p>
<p><strong>Phone Number: </strong> {{$phone}}</p>
<br/>
<p>Your default password is {{$password}}</p>
<p>Please ensure you change your password upon login</p>
<br/>
<p>Thank you,</p>
<p>Regards,</p>
<p>Procurment Department</p>



<h4>You can <a href="{{ getenv('APP_URL').'/vendor'}}">Click here to login</a></h4>

</body>
</html>
