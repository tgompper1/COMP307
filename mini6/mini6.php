<!-- Tess Gompper #260947251 -->
<!DOCTYPE html>
<html>
    <head>
        <style>
            .pretty-table {
                border-collapse: collapse;
                margin: 25px 0;
                font-size: 0.9em;
                font-family: sans-serif;
                min-width: 400px;
                box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
            }
            .pretty-table thead tr {
                background-color: #9791bf;
                color: #ffffff;
                text-align: left;
            }
            .pretty-table th, .pretty-table td {
                padding: 12px 15px 12px;
            }
            .pretty-table tbody tr {
                border-bottom: 1px solid #dddddd;
            }
            .pretty-table tbody tr:nth-of-type(even) {
                background-color: #f3f3f3;
            }
            .pretty-table tbody tr:last-of-type {
                border-bottom: 2px solid #9791bf;
            }
            .centered {
                margin-left: auto;
                margin-right: auto;
            }
        </style>
    </head>
    <body>
        <?php
            // get user inputs
            $first_name = $_POST["first"];
            $last_name = $_POST["last"];
            $email = $_POST["email"];
            $phone = $_POST["phone"];
            $book = $_POST["books"];
            if(isset($_POST["OS"])){
                $os = $_POST["OS"];
            }
            else{
                $os='';
            }

            $filename = 'mini6.csv';

            // open csv file for writing
            $f = fopen($filename, 'a');
            if ($f === false){
                die('Error opening the file' . $filename);
            }

            // format data for CSV
            $data = $first_name. ',' .$last_name. ',' .$email. ',' .$phone. ',' .$book. ',' .$os;
           
            // write to the file
            fputs($f, $data);
            fputs($f, "\n");

            // close the file
            fclose($f); 

            // open csv file for reading
            $f = fopen($filename, 'r');
            if ($f === false) {
                die('Cannot open the file ' . $filename);
            }

            // create table
            echo "<table class='pretty-table centered'>";
            echo "<thead><TR><TH>First Name &nbsp</TH><TH>Last Name &nbsp</TH><TH>Email</TH><TH>Phone</TH><TH>Book</TH><TH>OS</TH></TR></thead>";
           
            // read each line in CSV file at a time and print row
            while (($row = fgets($f)) !== false) {
                $str_arr = explode(",", $row);
                foreach ($str_arr as $el){
                    echo "<TD>".$el."</TD>";
                }
                echo "</TR>";
            }
            echo "</table>";

            // close the file
            fclose($f);
        ?>
    </body>
</html>
