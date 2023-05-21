<?php

session_start();
if($_SESSION['csrf_token'] === $_POST['csrf_token']){
    include("limit.php");

    // sending
    function send () {
        require_once('../../config.php');
        
        $data = htmlspecialchars($_POST['msg']);
        if (strlen($data) <= 5) {
            echo '<span class="error">خطا، متن بسیار کوتاه است!</span>';
            die();
        } elseif (strlen($data) > 1024) {
            echo '<span class="error">خطا، متن بسیار طولانی است!</span>';
            die();
        }
        $conn = new mysqli($host, $user, $password, $msg_db);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        $conn->query("SET CHARACTER SET 'utf8'");
        
        # Create a new table
        $sql = "CREATE TABLE IF NOT EXISTS msgs (
            id int NOT NULL AUTO_INCREMENT,
            msg VARCHAR(1024) NOT NULL,
            PRIMARY KEY(id)
        )";
        $conn->query($sql);

        # add new msg with prepared statement
        $stmt = $conn->prepare("INSERT INTO msgs (id, msg) VALUES (?, ?)");
        $stmt->bind_param("is", $id, $data);
        $stmt->execute();
        echo 'پیام با موفقیت ارسال شد.';
        $conn->close();
    }

    // limit
    date_default_timezone_set("Asia/Tehran");
    session_start();

    // in this sample, we are using the originating IP, but you can modify to use API keys, or tokens or what-have-you.
    $rateLimiter = new RateLimiter($_SERVER["REMOTE_ADDR"]);

    $limit = 2;				//	number of connections to limit user to per $minutes
    $minutes = 60;				//	number of $minutes to check for.
    $seconds = floor($minutes * 60);	//	retry after $minutes in seconds.

    try {
        $rateLimiter->limitRequestsInMinutes($limit, $minutes);
    } catch (RateExceededException $e) {
        header("HTTP/1.1 429 Too Many Requests");
        header(sprintf("Retry-After: %d", $seconds));
        $data = "شما محدود شده اید، اندکی صبر کنید.";
        die ($data);
    }

    // ok, they were within their limit, so let's continue with our app....
    send();
}else{
    echo "مشکلی پیش اومده!";
}
