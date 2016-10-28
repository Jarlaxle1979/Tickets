<html>
<head>
    <title>Tickets</title>

    <link rel="icon" href="images/flag.ico" type="image/ico" />
    <link rel="stylesheet" type="text/css" href="css/backend.css">
</head>

<body>

    <!-- Connect to database -->
    <?php
        class MyDB extends SQLite3
        {
            function __construct()
            {
                $this->open('data/tickets.db'); // If this database doesn't exist, it is created
            }
        }
        $db = new MyDB();
        if(!$db)
        {
            echo '<div class="dbStatus">Database Connection Error: ' . $db->lastErrorMsg() . '</div>';
        } else 
        {
            echo '<div class="dbStatus">Database Connection OK</div>';
        }
    ?>

    <!-- Read data from database -->
    <?php
        $results = $db->query('SELECT TICKET_ID, ARRIVAL, SENDER, CC, SUBJECT, BODY, FILES FROM emails');
        while ($row = $results->fetchArray()) 
        {
            // This section is repeated for every element in $results 
            // i.e. for every record in the database returned by the query above
            echo '<div class="email">';

            echo 'TICKET_ID: '      . $row[0] . '<br />';
            echo 'ARRIVAL: '        . $row[1] . '<br />';
            echo 'SENDER: '         . $row[2] . '<br />';
            echo 'CC: '             . $row[3] . '<br />';
            echo 'SUBJECT: '        . $row[4] . '<br />';
            echo 'BODY: '           . $row[5] . '<br />';
            echo 'FILES: '          . $row[6] . '<br />';

            echo '</div>';
        }
    ?>


</body>
</html>
