<?
    if ($_SESSION['error']) 
        {
            echo $_SESSION['error'];
            unset($_SESSION['error']);
        }
    
        if ($_SESSION['mess']) 
        {
            echo $_SESSION['mess'];
            unset($_SESSION['mess']);
        }
?>
            <div class="main_wrapper">

                <a href="/list/exit"><input class="but" type="submit" value="Exit"></a>

                <div class="task">
                <div class="list">
               
        

               <? 
                    $user_id=$_SESSION['users']['id'];
                    $del_id = $_GET['del_id'];

		            
		            if ($del_id) {
			            $run_del_tasks = mysqli_query($connect, $str_del_tasks);
			            if ($run_del_tasks) {
				            echo " <font color=green>Задание удалено!</font>";
			            } else {
				            echo " <font color=red>Задание удалить не удалось!</font>";
			            }
		            }

                    $READY_ALL=$_GET['READY_ALL'];

                    $str_ud_list= "UPDATE `tasks` SET `status` = 2 WHERE user_id = $user_id";
                    if($READY_ALL)
                    {
                        $up_list=mysqli_query($connect, $str_ud_list);
                    }



                ?>

                <form method="POST"action="/list/add_list">
                    <p>Tesk list</p>
                    <hr>

                    <input class="form_4" type="text" name="description" placeholder="Enter text...">
                    <input class="form_5" type="submit" name="sub_list" value=" ADD TASC "><br>
                </form>


                    <a href="/list/real_all"><input class='form_6' type='submit' name='sub_user' value=' REMOVE ALL '></a>

                    <a href="/list/status_all"><input class="form_6" type="submit" name="sub_list" value=" READY ALL "></a>

                    <hr>
                
                    


                    <?


                    $delete_id = $_GET['delete_id'];
		            $str_delete_tasks = "DELETE FROM `tasks` WHERE `id` = $delete_id";

		            if ($delete_id) {
			            $run_delete_tasks = mysqli_query($connect, $str_delete_tasks);
			            if ($run_delete_tasks) {
				            echo " <font color=green>Задание удалено!</font>";
			            } else {
				            echo " <font color=red>Задание удалить не удалось!</font>";
			            }
                    }
       
try {
    $conn = new PDO("mysql:host=localhost;dbname=Task_list", "root", "");
    $user_id=$_SESSION['users']['id'];
    $sql = "SELECT * FROM tasks WHERE user_id = $user_id ";
    $result = $conn->query($sql);
    while($row = $result->fetch()){


        if($row['status'] == 1)
        {
            $status_btn="<a href='/list/status/?status_id=$row[id]'><input class='form_6' type='submit' name='sub_user' value=' UNREADY  '></a>";
            $status_img="<div class= 'd1'></div>";
        }
        elseif($row['status'] == 2)
        {
            $status_btn="<a href='/list/status/?status_id=$row[id]'><input class='form_6' type='submit' name='sub_user' value=' READY  '></a>";
            $status_img="<div class= 'd2'></div>";
        }
        echo"

            <p class = 'text'>$row[description]<br></p>
                <div class= 'dis'>
                    <div class = 'di'>

                        <a href='/list/delete/?delete_id=$row[id]'><input class='form_6' type='submit' name='sub_user' value=' DELETE '></a>


                        $status_btn
                                        
                    </div>
                    $status_img
                </div>
                <hr>";


    }
    echo "</table>";
}
catch (PDOException $e) {
    echo "Database error: " . $e->getMessage();
}


                        
                    
                    ?>
                    

                </div>
            </div> 
            </div>
