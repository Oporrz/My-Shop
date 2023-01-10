<?php
      include('h.php');
       error_reporting( error_reporting() & ~E_NOTICE );
                //1. เชื่อมต่อ database:
                include('connections.php');  //ไฟล์เชื่อมต่อกับ database ที่เราได้สร้างไว้ก่อนหน้าน้ี
                //2. query ข้อมูลจากตาราง tb_admin:
                $query = "SELECT * FROM tbl_member ORDER BY member_id ASC" or die("Error:" . mysqli_error());
                //3.เก็บข้อมูลที่ query ออกมาไว้ในตัวแปร result .
                $result = mysqli_query($con, $query);
                //4 . แสดงข้อมูลที่ query ออกมา โดยใช้ตารางในการจัดข้อมูล:
                $row_am = mysqli_fetch_assoc($result);
                ?>

<script>    
$(document).ready(function() {
    $('#example1').DataTable( {
      "aaSorting" :[[0,'ASC']],
    //"lengthMenu":[[20,50, 100, -1], [20,50, 100,"All"]]
  });
} );
 
  </script>

  <table border="2" class="display table table-bordered" id="example1" align="center"  >
  <thead>
    <tr class="info">    
    <th width="5%">id</th>
    <th>m_user</th>
    <th>m_pass</th>
    <th>m_name</th>
    <th width="10%">m_email</th>
    <th width="5%">m_tel</th>
    <th width="10%">m_address</th>
    <th width="5%">edit</th>
    <th width="5%">delete</th>
  </tr>
</thead>
  <?php do { ?>
  
    <tr>
      <td><?php echo $row_am['member_id']; ?></td>
      <td><?php echo $row_am['m_user']; ?></td>
      <td><?php echo $row_am['m_pass']; ?></td>
      <td ><?php echo $row_am['m_name']; ?></td>
      <td ><?php echo $row_am['m_email']; ?></td>
      <td ><?php echo $row_am['m_tel']; ?></td>
      <td ><?php echo $row_am['m_address']; ?></td>
      <td><a href="member.php?act=edit&ID=<?php echo $row_am['member_id']; ?>" class="btn btn-warning btn-sm"> แก้ไข </a> </td>
      <td><a href="member_del_db.php?ID=<?php echo $row_am['member_id']; ?>" class='btn btn-danger btn-sm'  onclick="return confirm('ยันยันการลบ')">ลบ</a> </td>
    </tr>

    <?php } while ($row_am =  mysqli_fetch_assoc($result)); ?>
  
    </table> 