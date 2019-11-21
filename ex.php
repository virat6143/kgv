<?php
include('connect.php');

if(isset($_POST['submit'])){
    $date1=$_POST['date1'];
    $date2=$_POST['date2'];

//$dt1= substr($date1, 0,7);


    $SQL="select receipt.r_date,receipt.memo_no,book.bsr,receipt_details.book_qut,receipt_details.postal_charge,receipt_details.sub_to FROM `receipt_details`INNER JOIN book on receipt_details.b_id=book.b_id INNER JOIN receipt on receipt_details.r_id=receipt.r_id where receipt.r_date  BETWEEN '$date1' AND '$date2'";

    $header = '';
    $result ='';
    $C ='';
    $exportData = mysqli_query ($con,$SQL);
    $fields = mysqli_num_rows ($exportData);

    
    for ( $i = 0; $i < $fields; $i++ )
    {

     $header =  "Date" . "\t" .  "Cash Memo No" . "\t" . "Publication serialNo " . "\t" . "Book Quentity" . "\t". "Postal Charge" . "\t" . "Sub Total" . "\t";  
 }
 $data=0;
 while( $row = mysqli_fetch_row( $exportData ) )
 {
    $line = '';
    foreach( $row as $value )
    {                                            
        if ( ( !isset( $value ) ) || ( $value == "" ) )
        {
            $value = "\t";
        }
        else
        {
            $value = str_replace( '"' , '""' , $value );
            $value = '"' . $value . '"' . "\t";
        }
        $line .= $value;
        
        
    }
    $result .= trim( $line ) . "\n";  
    $value = str_replace( '"' , ' ' , $value );  
    $data = $data + $value; 
    

}
$C =  "---------" . "\t" .  "---------" . "\t" . "--------" . "\t" . "--------- " . "\t". "---------" . "\t" . '"Total Amount:'.$data.'"' . "\t"; 

$result .= trim( $C ) . "\n";
$result = str_replace( "\r" , "" , $result );

if ( $result == "" )
{
    $result = "\nNo Record(s) Found!\n";                        
}
header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=DEE.xls");
header("Pragma: no-cache");
header("Expires: 0");
print "$header\n$result";

}
?>