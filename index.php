<form method="POST">
    <p>Введите запрос:</p>
    <input type="text" name="text1"/>
    <input type="submit" name="butt1" value= "Выполнить"/>
</form>


<?php
    // $link = mysqli_connect("localhost", "root", "");

    // if ($link == false){
    //     print("Ошибка: Невозможно подключиться к MySQL " . mysqli_connect_error());
    // }
    // else {
    //     print("Соединение установлено успешно");
    // }
    if(array_key_exists('butt1', $_POST)) {
        button1();
    }
    function button1() {
      
            $x = $_POST['text1'];
            $conn = new mysqli("localhost", "root", "", "laba30");
    
            // if ($result = $mysqli -> query("SELECT * FROM students")) {
            //     echo "Returned rows are: " . $result -> num_rows;
            //     // Free result set
            //     $result -> free_result();
            // }
    
            // $sql = "SELECT * FROM students";
            $sql = $x;
            if($result = $conn->query($sql)){
                $rowsCount = $result->num_rows; // количество полученных строк
                echo "<p>Получено объектов: $rowsCount</p>";
                echo "<table><tr><th></th><th></th><th></th></tr>";
                foreach($result as $row){
                    echo "<tr>";
                        echo "<td>".$row["name"] . "</td>";
                        echo "<td>" . $row["age"] . "</td>";
                        echo "<td>" . $row["class"] . "</td>";
                    echo "</tr>";
                }
                echo "</table>";
                $result->free();
            } else{
                echo "Ошибка: " . $conn->error;
            }
            $conn->close();
        
        }
?>