<?php
include "class.database.php";
global $conn;
$result=mysqli_query($conn,"SELECT * FROM thiduatuan");
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Bảng thi đua</title>

</head>

<body id="page-top">
     <div class="card-body">
		<div class="table-responsive">
			<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
				<thead>
					<tr>
						<th>Lớp</th>
						<th>100% số giờ đạt loại tốt</th>
						<th>Số giờ trung bình</th>                                           
						<th>Số giờ yếu</th>
						<th>Số giờ kém</th>  
						<th>Số điểm giỏi</th>
                        <th>Số điểm kém</th>
						<th>Số lỗi trừ 2 điểm</th>
						<th>Số lỗi trừ 5 điểm</th>
						<th>Số lỗi trừ 10 điểm</th>
						<th>Số lỗi trừ 20 điểm</th>   						
					</tr>
				</thead>
			   
				<tbody>
				<?php while($row=mysqli_fetch_assoc($result)):?>
					<tr>
						<td><?=$row['ten_lop']?></td>
						<td><?=$row['gio_tot']?></td>
						<td><?=$row['gio_tb']?></td>
						<td><?=$row['gio_yeu']?></td>   
						<td><?=$row['gio_kem']?></td>  						
						<td><?=$row['so_diem_gioi']?></td>
						<td><?=$row['so_diem_yeu_kem']?></td>
                        <td><?=$row['loi_2diem']?></td>
						<td><?=$row['loi_5diem']?></td>
						<td><?=$row['loi_10diem']?></td>
						<td><?=$row['loi_20diem']?></td>
					</tr>
					<?php endwhile; ?>
				  
				</tbody>
			</table>
		</div>
	</div>

</body>

</html>