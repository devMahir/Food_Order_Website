<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Manage Order</h1>
        
        <br><br>
        <?php
            if (isset($_SESSION['update'])) {
                echo $_SESSION['update'];
                unset($_SESSION['update']);
            }
        ?>

            <table class="tbl-full">
                <tr>
                    <th>S.N.</th>
                    <th>Food Name</th>
                    <th>Price</th>
                    <th>Qut.</th>
                    <th>Total</th>
                    <th>Order Date</th>
                    <th>Status</th>
                    <th>Customer Name</th>
                    <th>Contact</th>
                    <th>Email</th>
                    <th>Address</th>
                    <th>Action</th>
                </tr>
                
                <?php
                    $sn = 1;
                    $sql = "SELECT * FROM tbl_order ORDER BY id DESC";
                    $res = mysqli_query($conn,$sql);
                    if ($res) {
                        $count = mysqli_num_rows($res);
                        if ($count>0) {
                            while ($row = mysqli_fetch_assoc($res)) {
                                $id = $row['id'];
                                $title = $row['food'];
                                $price = $row['price'];
                                $qty   = $row['quantity'];
                                $total = $row['total'];
                                $date  = $row['order_date'];
                                $status = $row['status'];
                                $customer_name = $row['customer_name'];
                                $customer_contact = $row['customer_contact'];
                                $customer_email = $row['customer_email'];
                                $customer_address = $row['customer_address'];
                                ?>
                                <tr>
                                    <td><?php echo $sn++;?></td>
                                    <td><?php echo $title;?></td>
                                    <td><?php echo $price;?></td>
                                    <td><?php echo $qty;?></td>
                                    <td><?php echo $total;?></td>
                                    <td><?php echo $date;?></td>

                                    <td>
                                        <?php
                                            //ordered, on delivery, deliverrd & Cancelled
                                            if($status=="Ordered"){
                                                echo "<label>$status</label>";
                                            }
                                            elseif($status=="On Delivery"){
                                                echo "<label style='color: orange'>$status</label>";
                                            }
                                            elseif($status=="Deliverd"){
                                                echo "<label style='color: green'>$status</label>";
                                            } 
                                            elseif($status=="Cancelled"){
                                                echo "<label style='color: red'>$status</label>";
                                            } 
                                        ?>
                                    </td>
                                    
                                    <td><?php echo $customer_name;?></td>
                                    <td><?php echo $customer_contact;?></td>
                                    <td><?php echo $customer_email;?></td>
                                    <td><?php echo $customer_address;?></td>
                                    <td>
                                        <a href="<?php echo SITEURL;?>admin/update-order.php?id=<?php echo $id;?>" class="btn-secondary">Update Order</a>
                                    </td>
                                </tr>

                                <?php
        
                            }        
                        }else {
                            ?>
                            <tr>
                                <td class="text-center error" colspan="6"> No Food Added Yet </td>
                            </tr>
                            <?php
                        }
                    }
                ?>

            </table>
    </div>
</div>

<?php include('partials/footer.php'); ?>