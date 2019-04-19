    <?php

        $hostname = 'jnc6n3xpbgc3kek2.chr7pe7iynqr.eu-west-1.rds.amazonaws.com:3306';
        $username = 'pxi4yt1ihye8ddzi';
        $password = 'zmg4z48v6aa2ihpn';
        $database = 'il0oltkkmzgthhrq';


        // Create connection
        $conn = mysqli_connect($hostname, $username, $password, $database);

        // Check connection
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
            echo "<p style='color:#f00'>Not Connected</p>";
        }
        //echo "<p class='status-section' style='color:#00fc4a'>Connected</p>";
    ?>