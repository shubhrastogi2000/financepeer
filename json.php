<html>
    <head>

     <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
     <style>

   .box
   {
    width:750px;
    padding:20px;
    background-color:#fff;
    border:1px solid #ccc;
    border-radius:5px;
    margin-top:100px;
   }
  </style>
      </head>
      <body>
        <div class="container box">
          <?php
          $connect = mysqli_connect("localhost", "root", "", "shubh");
          $query = '';
          $table_data = '';
          $filename = "data.json";
          $data = file_get_contents($filename);
          $array = json_decode($data, true);
          foreach($array as $row)
          {
           $query .= "INSERT INTO tbl_files(id, title, body) VALUES ('".$row["id"]."', '".$row["title"]."', '".$row["body"]."'); ";
           $table_data .= '
            <tr>
       <td>'.$row["id"].'</td>
       <td>'.$row["title"].'</td>
       <td>'.$row["body"].'</td>
      </tr>
           '; //Data for display on Web page
          }
          if(mysqli_multi_query($connect, $query)) //Run Mutliple Insert Query
    {
     // echo '<h3>Hello User Here is Your Imported Jason Data...</h3><br />';
     echo '
      <table class="table table-bordered">
        <tr>
         <th width="10%">ID</th>
         <th width="45%">TITLE</th>
         <th width="45%">BODY</th>

        </tr>


     ';
     echo $table_data;
     echo '</table>';
          }




          ?>
         </div>
      </body>
 </html>
