<?php
                  include "db.php";

                  $sql="select * from customer_bill";
                  $result=mysqli_query($conn,$sql);
                  $output="";
                  if(mysqli_num_rows($result)>0)
                  {
                      $output='<table border="1" width="100%" class="table table-dark sticky" >
                      <tr>
                      <th>ID</th>
                      <th>Product name</th>
                      <th>Product Qty</th>
                      <th>Price</th>
                      <th>Delete</th>
                      </tr>';
                  
                  while($row=mysqli_fetch_assoc($result))
                  {
                      $output.="<tr><td>{$row["id"]}</td><td>{$row["product_name"]}</td>
                      <td>{$row["product_qty"]}</td>
                      <td>{$row["price"]}</td>
                      <td><button class='delete-btn' id='table-delete' data-id='{$row["id"]}'>Delete</button></td>
                      </tr>";


                  }
                  $output.="</table>";

                 
                  mysqli_close($conn);
                  echo $output;
                }
                else
                {
                    
                }


                ?>