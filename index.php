<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Send SMS</title>
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css"/>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>
</head>
<body>
    <div class="container">
        <div class="alert alert-info" style="display: none"></div>
        <div class="alert alert-error" style="display: none"></div>
        <form id="login" onsubmit="check(event)">
            <p>Enter your phone number:</p>
            <input id="phone" type="tel" onchange="process(event)" name="phone" required />
            <textarea name="message" id="message" class="msg" cols="37" rows="10" maxlength="480" required></textarea>
            <input type="submit" class="btn" id="send" disabled value="Send" />
        </form>
    </div>
</body>
<script src="assets/js/phone.js"></script>
</html>