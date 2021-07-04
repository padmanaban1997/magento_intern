<?php
    include 'connection.php';
    $output='';
    if(isset($_POST['search_term'])){
        $search =$_POST['search_term'];
        $stmt=$conn->prepare("select * from crud where name like concat('%',?,'%') or  email like concat('%',?,'%')or  age like concat('%',?,'%')or  state like concat('%',?,'%')");
        $stmt->bind_param("ssis",$search,$search,$search,$search);
    }
    else{
        $stmt=$conn->prepare("select * from crud");
    }
    $stmt->execute();
    $result=$stmt->get_result();

    if($result->num_rows>0){
        $output = " <thead>
        <tr>
                 <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Detail</th>
                <th>Password</th>
                <th>Age</th>
                <th>Dob</th>
                <th>gender</th>
                <th>state</th> 
                <th>Action</th>
        </tr>
    </thead>
    <tbody>";
    
     while($row = $result->fetch_assoc()){
         $output .= "<tr>
                                        <td>{$row['id']}</td>
                                        <td>{$row['name']}</td>
                                         <td>{$row['email']}</td>
                                         <td>{$row['detail']}</td>
                                        <td>{$row['password']}</td>
                                        <td>{$row['age']}</td>
                                        <td>{$row['dob']}</td>
                                        <td>{$row['gender']}</td>
                                         
                                        
                                        <td>{$row['state']}</td>
                                        <td><a href='delete.php?id=$row[id]'><img src='delete1.jpg' height=''/></a> &nbsp; &nbsp;
                                            <a href='update.php?id=$row[id]'><img src='update.jpg' height=''/></a>
                                         </td>
                    </tr>";
                                    
     }
     $output .="</tbody>";
     echo $output;

    }
      else
     {

        echo "data not found";
     }
?>