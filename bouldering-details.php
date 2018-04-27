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
// ***** End bouldering data ***************************************************

// ***** Read bouldering Data ***************************************************
if($file){
if($debug) {print '<p>Begin reading data into </p>';
}

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
        print_r ($boulderdetails);
        print '</pre></p>';
     }
} // ends if file was opened    
// ***** End read weather Data ***************************************************
?>

        <article id="content">
            <h2>Climbs to Check Out</h2>
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
       
     $totalClimbs = 0;
     
        foreach($boulderdetails as $boulderDetail) {  
            print '<tr>';
            print '<td>' . $boulderDetail [0] . '</td>';
            print '<td>' . $boulderDetail [1] . '</td>';
            print '<td>' . $boulderDetail [2] . '</td>';
            print '<td>' . $boulderDetail [3] . '</td>';
            print '<td>' . $boulderDetail [4] . '</td>';
            print '<td>' . $boulderDetail [5] . '</td>';
            print '<td>' . $boulderDetail [6] . '</td>';
            print '<td>' . $boulderDetail [7] . '</td>';
            print '<td>' . $boulderDetail [8] . '</td>';
            print '<td>' . $boulderDetail [9] . '</td>';
            print '</tr>'. PHP_EOL;
            $totalClimbs = $totalClimbs + 1;
        }
         
        print '<tr><td colspan="10">' . $totalClimbs . ' Total Climbs Logged </td></tr>';
          ?>
                
            </table>  
        </article><!-- end content -->
<?php
include ('footer');
?>       
    </body>
</html>
