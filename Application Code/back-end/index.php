<?php 
    require('config.php');

    if($_SERVER['REQUEST_METHOD'] == 'POST') {

	    $json = json_decode(file_get_contents('php://input'));

        $order = $json->queryResult->parameters->order;
        $number = $json->queryResult->parameters->number;

        if($order == "status") {
            $query = "select Status from orderstatus where Orderno = '$number'";
            $result = mysqli_query($conn, $query);
            if(mysqli_num_rows($result) > 0) {
                while ($row = $result->fetch_assoc()) {
                    $code .= $row['Status'];
                }
                    
                switch($code) {
                    case 'T': $status = "Your order is in Transit"; break;
                    case 'D': $status = "Your order is Delivered"; break;
        
                    default: $status = "Please check your order number!";
                }
            }
            
            else {
                $status .= ", Please check your order number!";
            }

        }

        else if($order == "location") {
            $query = "select Location from deliverystatus where Orderno = '$number'";
            $result = mysqli_query($conn, $query);
            if(mysqli_num_rows($result) > 0) {
                $status = "Your package #";
                $status .= $number;
                $status .=  " has arrived ";
                while ($row = $result->fetch_assoc()) {
                    $status .= $row['Location'];
                }
                $status .= " warehouse. ";
            }
        
            else {
                $status = "Please check your order number!";
            }
        }

        else if($order == "eta") {
            $query = "select Date from deliverystatus where Orderno = '$number'";
            $result = mysqli_query($conn, $query);
            if(mysqli_num_rows($result) > 0) {
                $status = "Your package #";
                $status .= $number;
                $status .=  " will  arrive on ";
                while ($row = $result->fetch_assoc()) {
                    $status .= $row['Date'];
                }
            }
        
            else {
                $status = "Please check your order number!";
            }
        }

        else if($order == "support") {
            $mobile = $json->queryResult->parameters->mobile;
            $issue = $json->queryResult->parameters->issue;

            $query = "SELECT * FROM customer WHERE Mobile LIKE '$mobile'";
            $result = mysqli_query($conn, $query);
            if(mysqli_num_rows($result) > 0) {
                while ($row = $result->fetch_assoc()) {
                    $cid .= $row['Cid'];
                    $status .=$row['Name'];
                }

                $query = "INSERT INTO support (`Issue`, `Cid`, `Pid`) VALUES ('$issue', '$cid', '$number')";
                mysqli_query($conn, $query);
                $query = "SELECT MAX(Refno) FROM support";
                $result = mysqli_query($conn, $query);
                $row = $result->fetch_assoc();

                $status .= ", Your issue has been logged. Keep the referal code No.";
                $status .= $row['MAX(Refno)'];
                $status .= " ready. Our service representative will contact you soon.";
            }

            else {
                $status = "Please enter your registered contact number!";
            }
        }
        

        $response->fulfillmentText = $status;
        echo json_encode($response);
    }
    
    else {
	    echo "ERROR: Invalid Method";
    }
?>