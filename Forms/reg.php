
<!DOCTYPE html>
  <head>
    <meta charset="UTF-8">
    <title>Registration Form</title>
    <link rel="stylesheet" href="./regstyle.css">
  </head>
<body>
  <div class="registration-form">
    <h1>Registration Form</h1>
    <form method = "post"  action = "./regcon.php">
      <div class="form-group">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>
      </div>
      <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required pattern="/^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+\.com$/">
      </div>
      <div class="form-group">
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
      </div>
      <button type="submit">Register</button>
    </form>
  </div>
</body>


    
    <!-- <script>
      const form = document.querySelector('form');
      form.addEventListener('submit', (event) => {
        event.preventDefault();
        const name = document.querySelector('#name').value;
        const email = document.querySelector('#email').value;
        const password = document.querySelector('#password').value;
        // TODO: Handle form submission
      });
    </script> -->
    <script>
      // function makePost() {
      //   <?php
      //     include('./regcon.php')
      //   ?>
      // }
    </script>
    
  </body>
</html>

