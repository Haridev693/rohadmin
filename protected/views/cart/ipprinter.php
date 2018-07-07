<style type="text/css">
    #header{
        display: none;
    }
</style>
<div class="form">
<form name="" method="post">
<div class="row">
    <label>Enter Ip Address</label>
    <input type="text" name="ipaddress" placeholder="Ip Address">
</div>
<div class="row">
    <label>Enter Printer Name</label>
    <input type="text" name="printername" placeholder="Printer Name">
</div>
<div class="row">
    <input type="submit" name="submit" value="submit">
</div>

</form>
</div>
<?php


if(isset($_REQUEST['ipaddress']) && isset($_REQUEST['printername']))
{


// $printer_name = "Your Printer Name exactly as it is"; 
// $printer_name = '\\\\\/'.$_GET["ipaddress"].'\\\/'.$_GET["printername"]; 
// $handle = printer_open($printer_name);
// printer_start_doc($handle, "My Document");
// printer_start_page($handle);
// $font = printer_create_font("Arial", 100, 100, 400, false, false, false, 0);
// printer_select_font($handle, $font);
// printer_draw_text($handle, 'This sentence should be printed.', 100, 400);
// printer_delete_font($font);
// printer_end_page($handle);
// printer_end_doc($handle);
// printer_close($handle);

//$printer_name = '\\\\'.$_REQUEST["ipaddress"].'\\'.$_REQUEST["printername"]; 
	$printer_name='\\\\192.168.0.4';
$handle = printer_open($printer_name); 
printer_set_option($handle, PRINTER_MODE, "RAW");
printer_write($handle, "TEXT To print");
printer_close($handle);

die;
 // $printer = "\\\\servername\\printername";
 // $handle = printer_open($printer);
 //        printer_set_option($handle, PRINTER_MODE, "raw");
 // printer_set_option($handle, PRINTER_PAPER_FORMAT, PRINTER_FORMAT_A5);
 // $output = "Print Contents";
 // printer_write($handle,$output);
 //    printer_close($handle);

}



// $ftp = [
//     'server'   => gethostbyaddr('192.168.0.10'),
//     'username' => 'username',
//     'password' => 'password',
// ];
// $conn = ftp_connect($ftp['server']);
// $login = ftp_login($conn, $ftp['username'], $ftp['password']);
// $file=Yii::app()->request->baseUrl."/pdf/printdemo.pdf";
// if (is_readable($file)) {
//     if (ftp_put($conn, $file, $file, FTP_ASCII)) {
//         echo 'Successfully executed command';
//     }
//     else {
//         echo 'Failed execution of command';
//     }
// }
// else {
//     echo 'File is not readable';
// }
?>
