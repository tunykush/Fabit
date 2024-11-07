<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- link -->
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link rel="stylesheet" href="../../assets/css/feedback.css">
    <link rel="shortcut icon" href="../../ffavicon.svg" type="image/svg+xml" />
    <title>Document</title>
</head>
<body>

<form class="container" id="feedbackForm">
  <h1 class="heading">Give feedback</h1>
  <p class="para">What do you think of the issue search experience within the project?</p>

  <!-- Name input -->
  <div class="input-group">
    <label for="name">Name:</label>
    <input type="text" id="name" name="name" placeholder="Enter your name" required>
    <span id="nameError" class="error-message"></span>
  </div>

  <!-- Email input -->
  <div class="input-group">
    <label for="email">Email:</label>
    <input type="email" id="email" name="email" placeholder="Enter your email" required>
    <span id="emailError" class="error-message"></span>
  </div>

  <div class="feedback-level">
    <div class="level">
      <i class="lar la-sad-tear"></i>
    </div>
    <div class="level">
      <i class="las la-frown"></i>
    </div>
    <div class="level">
      <i class="lar la-meh"></i>
    </div>
    <div class="level">
      <i class="lar la-smile"></i>
    </div>
    <div class="level">
      <i class="lar la-grin"></i>
    </div>
  </div>

  <div class="feedback-msg">
    <p class="para">
      What are the main reasons for your rating?
    </p>
    <textarea name="" id="" placeholder="Your feedback"></textarea>
  </div>

  <div class="agreement">
    <div class="checkbox">
      <input type="checkbox" name="" id="">
      <label for="">I may be contacted about this feedback <a href="#">Privacy Policy</a>.</label>
    </div>
    <div class="checkbox">
      <input type="checkbox" name="" id="">
      <label for="">I'd like to help improve by joining the <a href="#">Research Group</a>.</label>
    </div>
  </div>

  <div class="buttons">
    <a href="javascript:void(0)" onclick="validateForm()">Submit</a>
    <a href="../../landingpage.php" id="cancelButton">Cancel</a>

  </div>
</form>

<script>
  function validateForm() {
    const name = document.getElementById('name').value;
    const email = document.getElementById('email').value;

    
    let isValid = true;

    document.getElementById('nameError').innerText = '';
    document.getElementById('emailError').innerText = '';


    if (name === '') {
      document.getElementById('nameError').innerText = 'Please enter your name';
      isValid = false;
    } else if (name.length < 3) {
      document.getElementById('nameError').innerText = 'Name must be at least 3 characters long';
      isValid = false;
    }


    const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (email === '') {
      document.getElementById('emailError').innerText = 'Please enter your email';
      isValid = false;
    } else if (!emailPattern.test(email)) {
      document.getElementById('emailError').innerText = 'Please enter a valid email';
      isValid = false;
    }

    if (isValid) {
      alert('Thanks for submitting your feedback');
    }
  }
</script>

</body>
</html>
