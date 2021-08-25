<?php 

    if(isset($_POST['Hand']) || isset($_POST['Wrist']) || isset($_POST['Elbow']) || isset($_POST['Shoulder']) || isset($_POST['Waist']) || isset($_POST['Base'])) { 
        $Hand = $_POST["Hand"]; 
        $Wrist = $_POST["Wrist"]; 
        $Elbow = $_POST["Elbow"]; 
        $Shoulder = $_POST["Shoulder"]; 
        $Waist = $_POST["Waist"]; 
        $Base = $_POST["Base"]; 
    } 
 
    $conn = new mysqli('localhost', 'root', '', 'robot_arm'); 
 
    if($conn->connect_error){ 
        die('Connection Failed : '.$conn->connect_error); 
    }else{ 
        $stmt = $conn->prepare("insert into control(Hand,Wrist,Elbow,Shoulder,Waist,Base) values(?,?,?,?,?,?)"); 
        $stmt->bind_param("iiiiii", $Hand, $Wrist, $Elbow, $Shoulder, $Waist, $Base); 
        $stmt->execute(); 
        echo "Done"; 
        $stmt->Close(); 
    } 
 
    $sql = "SELECT * FROM control"; 
    $result = $conn->query($sql); 
	
	   while ($fetch = mysqli_fetch_assoc($result)) { 
 
        echo "<br> Hand:".$fetch['Hand']; 
        echo "  Wrist:".$fetch['Wrist']; 
        echo "  Elbow:".$fetch['Elbow']; 
        echo "  Shoulder:".$fetch['Shoulder']; 
        echo "  Waist:".$fetch['Waist']; 
        echo "  Base:".$fetch['Base']; 
    } 
 
 
 
?>
