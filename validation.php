<?php

// check valid time for relese
function checkTimeRelease($releaseID, &$msg = '') {

    include 'connectionDB.php';

    $query = "SELECT ActualComplete, PlannedComplete FROM projectRelease WHERE ID = $releaseID;";

    $result = mysqli_query($con, $query) OR exit("Error not added " . mysqli_error($con));

    $row = mysqli_fetch_assoc($result);


    $actualComplete = $row['ActualComplete'];
    $plannedComplete = $row['PlannedComplete'];
    $currentTime = date("Y-m-d");


    $timeDifference = $plannedComplete - $currentTime;


    $currentTime = new \DateTime("2017-6-29"); # test
    $currentTime = new \DateTime("2017-8-29"); # test


    $currentTime = new \DateTime();


    $plannedComplete = new \DateTime($plannedComplete);

    $timeDifference = date_diff($plannedComplete, $currentTime)->format("%a");


    if (($plannedComplete > $currentTime) && ($timeDifference > 2 )) {

        $msg = "Time is valid. <br>";

        return true;
    } elseif (($timeDifference <= 2 ) && ($timeDifference >= 1 )) {
        $msg = "Current release is about to end in $timeDifference days.<br>";
        return false;
    } else {

        $msg = "Current time exceeded the planned complete time of the release.<br>";

        return false;
    }
}

// check authority
function checkAuthority($releaseID, $userID) {
    //no need to implement for edit and delete:
    // made while login, restricted through UI items
    //check only for add new item

    include 'connectionDB.php';

    $query = "SELECT * FROM releaseCustomer WHERE releaseID = $releaseID AND customerID = $userID ";

    $result = mysqli_query($con, $query) OR exit("Error: " . mysqli_error($con));

    //$row = mysqli_fetch_assoc($result);

    if (mysqli_num_rows($result))
        return true;
    else
        return false;
}

//check AT count
function checkCountAT($storyID, &$msg) {
    $countAT = 0;

    //get count from DB
    ////
    ////
    ////


    if ($countAT > 1) {
        $msg = "There is more than one AT for this user story. <br>"
                . "AT deleted Successfully";
        return true;
    } else {
        $msg = "This is the only one AT for this user story.<br>"
                . "User story must have at least one AT.<br>"
                . " You must add an AT before deleting this one.";

        return false;
    }
}

function notifyPM($releaseID, $title, $msg) {

// use wordwrap() if lines are longer than 70 characters
    $msg = wordwrap($msg, 70);


// Always set content-type when sending HTML email
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
    $headers .= 'From: <r.binhezam@gmail.com>' . "\r\n";
    $headers .= 'Cc: r.binhezam@gmail.com' . "\r\n";

// send email
    mail("r.binhezam@gmail.com", $title, $msg, $headers);
}

?>