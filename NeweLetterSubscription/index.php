<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
* {
    box-sizing: border-box;
}

input[type=text], select, textarea {
    width: 100%;
    padding: 12px;
    border: 1px solid #ccc;
    border-radius: 4px;
    resize: vertical;
}
input#fname {
    width: 100%;
    padding: 12px;
}
label {
    padding: 12px 12px 12px 0;
    display: inline-block;
}

input[type=submit] {
    background-color: #4CAF50;
    color: white;
    padding: 12px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    float: right;
    margin-top: 20px;
}

input[type=submit]:hover {
    background-color: #45a049;
}

.container {
    border-radius: 5px;
    background-color: #f2f2f2;
    padding: 20px;
    max-width: 600px;
    margin: 0 auto;
}
.col-25 {
    float: left;
    width: 25%;
    margin-top: 6px;
}

.col-75 {
    float: left;
    width: 75%;
    margin-top: 6px;
}

/* Clear floats after the columns */
.row:after {
    content: "";
    display: table;
    clear: both;
}

/* Responsive layout - when the screen is less than 600px wide, make the two columns stack on top of each other instead of next to each other */
@media screen and (max-width: 600px) {
    .col-25, .col-75, input[type=submit] {
        width: 100%;
        margin-top: 0;
    }
	input[type=submit] {
    background-color: #4CAF50;
    color: white;
    padding: 12px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    float: right;
    margin-top: 20px;
}
}
</style>
</head>
<?php

if(isset($_REQUEST['submit_btn']))
    {


          $token = md5(uniqid(rand(), true));
          $host_name=$_SERVER['HTTP_HOST'];
           
           
          $data = array(
            'name' => $_POST['name'],
            'email' => $_POST['email'],
            'address' => $_POST['address'],
            'state' => $_POST['state'],
            'host_name' => $host_name,
            'token' => $token
           
          );



          $curl = curl_init();


          curl_setopt_array($curl, array(
          
            CURLOPT_URL => "http://localhost/subscriber/public/api/subscriber",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
               CURLOPT_POSTFIELDS =>json_encode($data),
                 CURLOPT_HTTPHEADER => array(
                          "Content-Type: application/json",
                          "cache-control: no-cache",
                      ),
          ));

          $response = curl_exec($curl);
          $success=json_decode($response);



          
  

          $err = curl_error($curl);

          curl_close($curl);

          if ($err) {
            echo "cURL Error #:" . $err;
          } else {

            print_r($success->message);
          }



        }
?>
<body>
<div class="container">
  <form  method="POST">

      <div class="row">
      <div class="col-25">
        <label for="lname">Name</label>
      </div>
      <div class="col-75">
        <input type="text" id="name" name="name" placeholder="Your name">
      </div>
    </div>

    <div class="row">
      <div class="col-25">
        <label for="fname">Email</label>
      </div>
      <div class="col-75">
        <input type="email" id="fname" name="email" placeholder="Email">
      </div>
    </div>

    <div class="row">
      <div class="col-25">
        <label for="lname">Address</label>
      </div>
      <div class="col-75">
        <input type="text" id="address" name="address" placeholder="Your Address">
      </div>
    </div>
		  
    <div class="row">
      <div class="col-25">
        <label for="country">State </label>
      </div>
      <div class="col-75">
        <select id="state" name="state">
          <option value="active">Active</option>
          <option value="unsubscribed">Unsubscribed</option>
          <option value="junk">Junk</option>
          <option value="bounced">Bounced</option>
          <option value="unconfirmed">unconfirmed</option>
        </select>
      </div>
    </div>

    <div class="row">
      <input type="submit" value="Submit" name="submit_btn">
    </div>
  </form>
</div>

</body>

<script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>
</html>


