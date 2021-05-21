<?php

require('Connection.php');
require('..\Librarys\phpqrcode\qrlib.php');

class show_controller
{
    public static function show()
    {
        $Connection = new Connection();
		$ConnectionDb = $Connection->connect();
        $query = "SELECT * FROM users";
        $query = $ConnectionDb->prepare($query);
        $query->execute();
        $Array = $query->fetchAll(PDO::FETCH_ASSOC);

        echo '<table  class="table">
                <tr class="thead-dark">
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">Identification Card</th>                
                    <th scope="col">Code QR</th>
                </tr>';
        foreach ($Array as $Answer) {

            $Location = '..\Data\Qr/';

            if (!file_exists($Location)) {
                mkdir($Location);
            }

            $Name = $Location . 'qr' . $Answer['id'] . '.png';

            $Size = 3;
            $Level = 'M';
            $FrameSize = 3;
            $Content = $Answer['Card'];

            QRcode::png($Content, $Name, $Level, $Size, $FrameSize);

            echo "<tr>
                <td scope='col'>" . $Answer['id'] . "</td>
                <td scope='col'>" . $Answer['Name'] . "</td>
                <td scope='col'>" . $Answer['Last_Name'] . "</td>
                <td scope='col'>" . $Answer['Card'] . "</td>
                <td scope='col'><img src='Data/Qr/qr".$Answer['id'].".png'/></td> 
                ";
       }
        echo '</table>';
    }
}
show_controller::show();

#creator: Mateo Fonseca