<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- css -->
    <link rel="stylesheet" href="style.css">
    
    <title>Emergency calls</title>
</head>
<body>
    <!-- <?php
        include "functions.php";
    ?> -->
    <div class="person-data">
        <table>
            <h1>Patient data</h1>
            <tr>
                <th>Date</th>
                <th>Pulse</th>
                <th>Oxygen</th>
            </tr>
            <?php 
                // $records = mysqli_query($connect,"SELECT * FROM patient_data" );
                while($row = mysqli_fetch_array($records)): ?>
                    <tr>
                        <td><?php echo $row['datetime']; ?></td>
                        <td><?php echo $row['pulse']; ?></td>
                        <td><?php echo $row['oxygen']; ?></td>
                    </tr>                        	
                <?php endwhile;?>
        </table>
    </div>
    <div class="chart-container">        
            <?php
            include 'newchart.php';
            ?>
    </div>
</body>
</html>