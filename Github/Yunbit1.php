<!DOCTYPE html>

<html>

<head>
    <meta charset="UTF-8">
    <title>PDO queries</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"> 
    
    <style>

        form {
            width: 300px;
            text-align: left;
        }

        span {
            display: block;
            margin-bottom: 10px;
        }

        input {
            width: 100%;
        }
        .highlight {
            font-weight: bold;
        }
    </style>
</head>

<body>
    <h3>Registers</h3><br>
    <form action="Yunbit2.php" method="post">
    <span>Name: <input type="text" name="name" value="" required><br>
    <span>Address: <input type="text" name="address" value="" required><br>
    <span>Telf: <input type="number" name="telf" value="" required><br>
    <span>Type: <input type="text" name="type" pattern="^[PN]$" title="Only one character: (N)ormal or (P)remium" maxlength="1" required><br>
    </form>
    
        
</br><table border=1>
        <tr>
            <th>Name</th>
            <th>Address</th>
            <th>Telf</th>
        </tr> <br>

        <?php
           
        try {
            $conn = new PDO('mysql:host=localhost;dbname=ventas;charset=utf8', 'root', '');
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $conn->prepare('SELECT * FROM TEST_CLIENTS order by NAME');
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            while ($prove = $stmt->fetch()) {
                $NAME = $prove['NAME']; 
                if ($prove['TYPE'] === P) {
                    echo "<tr class='highlight'>";
                    echo "<td>".$prove['NAME']."</td><td>".$prove['ADDRESS']."</td><td>".$prove['TELF'];
                    echo "</tr>";
                } else {
                echo "<tr>";
                echo "<td>".$prove['NAME']."</td><td>".$prove['ADDRESS']."</td><td>".$prove['TELF'];
                echo "</tr>";
                }
            }
        } catch (PDOException $ex) {
            print "¡Error!: " . $ex->getMessage() . "<br/>";
            exit;
        }
        ?>

    </table></br>
    <a href="Ejer5-formProveedor.html" class='btn btn-primary'>New supplier</a>
</body>

</html>