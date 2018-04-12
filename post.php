<?php
    require "dbCon.php";
    function Nhantin() {
        $thoigian = $_POST['thoigian'];
        $ten = $_POST['ten'];
        $binhluan = $_POST['binhluan'];
        $conn = MyConnect();
        $qr = "
            insert into talk(thoigian, ten, binhluan)
            values('$thoigian', $ten', '$binhluan')
        ";
        echo $qr;
        return mysqli_query($conn, $qr);
    };

    Nhantin();
    
    function DocTin() {
        $conn = MyConnect();
        $qr = "
            select * from talk
        ";
        return mysqli_query($conn, $qr);
    };
    
    $tinnhan = DocTin();
    while($row_tinnhan = mysqli_fetch_assoc($tinnhan)) {
        
        echo $row_tinnhan['thoigian'] . ":" . $row_tinnhan['ten'] . " : " . $row_tinnhan['binhluan'];
        echo "<br>";
    };
?>