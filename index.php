<!DOCTYPE html>
<html>
<head>
  <title>Input Form</title>
  <link rel="stylesheet" href="design.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>
<body style="background-color: #686868;">
  <div class="goat">
      <h2><u>Basic input form</u></h2>
      <form action="server.php" method="post">

        <div class="texts">
          <label for="name"></label>
          <input type="text" id="name" name="name"  placeholder="Your name" required>
        </div>

        <div class="texts">
          <label for="email"></label>
          <input type="text" id="email" name="email"  placeholder="Your email id" required>
        </div>

        <div class="texts">
          <label for="subject"></label>
          <input type="text" id="subject" name="subject" placeholder="Subject of your message" required>
        </div>

        <div class="texts">
          <div class="message">
          <label for="message"></label>
          <textarea name="message" id="message" name="message" cols="35" rows="10" placeholder="Enter your message here..." required></textarea>
          </div>
        </div>

        <div class="texts">
          <label for="gender"><u>Gender:</u></label>
          <div class="gender-container">
            <div class="form-check">
              <input class="form-check-input" type="radio" value="M" name="gender" id="male" required>
              <label class="form-check-label" for="male">Male</label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="radio" value="F" name="gender" id="female" required>
              <label class="form-check-label" for="female">Female</label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="radio" value="O" name="gender" id="others" required>
              <label class="form-check-label" for="others">Others</label>
            </div>

          </div>
        </div>

        <div class="texts">
          <label for="house"><u>House:</u></label>

          <div class="house-container">
            <div class="form-check">
              <input class="form-check-input" value="2" type="checkbox" name="house[]" id="male1">
              <label class="form-check-label" for="male1">2 no.</label>
            </div>

            <div class="form-check">
              <input class="form-check-input" value="6" type="checkbox" name="house[]" id="female1">
              <label class="form-check-label" for="female1">6 no.</label>
            </div>

            <div class="form-check">
              <input class="form-check-input" value="9" type="checkbox" name="house[]" id="others1">
              <label class="form-check-label" for="others1">9 no.</label>
            </div>
          </div>

        </div>

        <button type="submit" name="submit" class="click-button">Submit</button>
      
      </form>
  </div><br><br><br>

  <div class="table">
    <table class="table table-hover" style="margin: auto;">
        <thead>
          <tr>
            <th scope="col">id</th>
            <th scope="col">Name</th>
            <th scope="col">Email Address</th>
            <th scope="col">Subject</th>
            <th scope="col">Message</th>
            <th scope="col">Gender</th>
            <th scope="col">House</th>
          </tr>
        </thead>
        <tbody class="table-group-divider">
          <?php 
          $server = 'localhost';
          $user = 'root';
          $pass = 'root';
          $dbname = 'form';
          
          $conn = mysqli_connect($server,$user,$pass,$dbname);

          $query = "SELECT * FROM data";
          $result = mysqli_query($conn, $query); 

          while($row = mysqli_fetch_assoc($result)){
            $id_ = $row['id'];
            $name_ = $row['Name'];
            $email_ = $row['Email address'];
            $subject_ = $row['Subject'];
            $message_ = $row['Message'];
            $gender_ = $row['Gender'];
            $house_ = implode(", ", unserialize($row['House']));
            ?>
            <tr>
                <td><?= $id_ ?></td>
                <td><?= $name_ ?></td>
                <td><?= $email_ ?></td>
                <td><?= $subject_ ?></td>
                <td><?= $message_ ?></td>
                <td><?= $gender_ ?></td>
                <td><?= $house_ ?></td>
            </tr>
            <?php
          }
          ?>
        </tbody>
      </table>
  </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>
