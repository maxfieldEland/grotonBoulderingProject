<?php

// ***** Open bouldering csv file ************************************************
$debug = false;
if(isset($_GET["debug"])){
     $debug = true; 
}

$myFolder = '';

$myFileName = 'boulders';

$fileExt = '.csv';

$filename = $myFolder . $myFileName . $fileExt;

if ($debug) {print '<p>filename is ' . $filename;
}
$file=fopen($filename, "r");

if($debug){
    if($file){
       print '<p>File Opened Succesful.</p>';
    }else{
       print '<p>File Open Failed.</p>';
     }
}
// ***** End weather Data ***************************************************

// ***** Read weather Data ***************************************************
if($file){
if($debug) {print '<p>Begin reading data into </p>';
}
      // read the header row, copy the line for each header
      // you have.
      $headers[] = fgetcsv($file);

    if($debug) {
        print '<p>Finished reading headers.</p>';
        print '<p>My header array</p><pre>';
        print_r ($headers);
        print '</pre>';
    }
    
    //read all the data
    while(!feof($file)){
        $boulderdetails[] = fgetcsv($file);
    }
    
     if($debug) {
        print '<p>Finished reading data. File closes.</p>';
        print '<p>My data array</p><pre>';
        print_r ($boulderdetailsDetails);
        print '</pre></p>';
     }
} // ends if file was opened    
// ***** End read weather Data ***************************************************
?>

        <article id="content">
            <h2>Detailed Weather</h2>
            <table>
<?php
        foreach($headers as $header){
            print '<tr>';
            print '<th>' . $header [0] . '</th>';
            print '<th>' . $header [1] . '</th>';
            print '<th>' . $header [2] . '</th>';
            print '<th>' . $header [3] . '</th>';
            print '<th>' . $header [4] . '</th>';
            print '<th>' . $header [5] . '</th>';
            print '<th>' . $header [6] . '</th>';
            print '<th>' . $header [7] . '</th>';
            print '<th>' . $header [8] . '</th>';
            print '<th>' . $header [9] . '</th>';
            
            print '</tr>'. PHP_EOL;
        }
       
     $totalWeatherDetail = 0;
     
        foreach($weatherDetails as $weatherDetail) {
            if($weatherStation == $weatherDetail[1]){
            $totalWeatherDetail++;    
            print '<tr>';
            print '<td>' . $weatherDetail [0] . '</td>';
            print '<td>' . $weatherDetail [1] . '</td>';
            print '<td>' . $weatherDetail [2] . '</td>';
            print '<td>' . $weatherDetail [3] . '</td>';
            print '<td>' . $weatherDetail [4] . '</td>';
            print '<td>' . $weatherDetail [5] . '</td>';
            print '<td>' . $weatherDetail [6] . '</td>';
            print '<td>' . $weatherDetail [7] . '</td>';
            print '<td>' . $weatherDetail [8] . '</td>';
            print '<td>' . $weatherDetail [9] . '</td>';
            
            print '</tr>'. PHP_EOL;
            }
        }
         
        print '<tr><td colspan="10">' . $totalWeatherDetail . ' Total Daily Observations</td></tr>';
          ?>
                
            </table>  
        </article><!-- end content -->
<?php
include ('footer');
?>       
    </body>
</html>