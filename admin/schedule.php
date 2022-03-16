<?php include '../includes/config.php'; ?>
<?php include '../includes/header.php'; ?>


<section class="vh-100" style="background-color: #470ab1;">
  <div class="container">
    <div class="row w-100">
        <div class="col-lg-12 col-md-12 col-12">
        	<h1><center><i style="color: white; font-size: 1.5em;"></i><i style="color: white"> Schedule </h1></center>
			<table class="table table-dark table-striped">
			  <thead>
			    <tr>
			      <th scope="col">User ID</th>
			      <th scope="col">Permutation</th>
			      <th scope="col">IP Address</th>
			      <th scope="col">Timestamp</th>
			      <th scope="col">status</th>
			      <th style="width:16%"></th>
			    </tr>
			  </thead>
			  <tbody>
			    <tr>
			      <th scope="row">1</th>
			      <td>netbytesec.com</td>
			      <td>192.168.56.109</td>
			      <td>22:00</td>
			      <td>active</td>
			      <td class="actions" data-th="">

			    <?php
          		if ($_SESSION['is_admin'] == False){ ?>
                    <a href="/admin/notification.php?action=notification&id=<?php echo $user_id; ?>" class="fas fa-bell" style="color: white;"></a>
               	<?php }?>

                    <a style="padding-left:25px;" href="/admin/add.php?action=add&id=<?php echo $user_id; ?>"><i class="fas fa-plus" style="color: white;"></i></a>
                    <a style="padding-left:25px;" href="/admin/edit.php?action=add&id=<?php echo $user_id; ?>"><i class="fas fa-edit" style="color: white;"></i></a>
                    <a style="padding-left:25px;" href="/admin/delete.php?action=minus&id=<?php echo $user_id; ?>"><i class="fas fa-trash-alt" style="color: white;"></i></a>
                  </td>
			    </tr>
			    <tr>
			      <th scope="row">2</th>
			      <td>netbytesec.ga</td>
			      <td>103.16.182.3</td>
			      <td>12:00</td>
			      <td>active</td>
			      <td class="actions" data-th="">

			      	 <?php
          		if ($_SESSION['is_admin'] == False){ ?>
                    <a href="/admin/notification.php?action=notification&id=<?php echo $user_id; ?>" class="fas fa-bell" style="color: white;"></a>
               	<?php }?>
<!--                     <a href="/notification.php?action=delete&id=<?php echo $user_id; ?>" class="fas fa-bell" style="color: white;"></a>
 -->                    <a style="padding-left:25px;" href='#'><i class="fas fa-plus" style="color: white;"></i></a>
                    <a style="padding-left:25px;" href='#'><i class="fas fa-edit" style="color: white;"></i></a>
                    <a style="padding-left:25px;" href='#'><i class="fas fa-trash-alt" style="color: white;"></i></a>
                  </td>
			    </tr>
			    <tr>
			      <th scope="row">3</th>
			      <td>facebook.com</td>
			      <td>192.168.66.7</td>
			      <td>12:00</td>
			      <td>active</td>
			      <td class="actions" data-th="">

			      	 <?php
          		if ($_SESSION['is_admin'] == False){ ?>
                    <a href="/admin/notification.php?action=notification&id=<?php echo $user_id; ?>" class="fas fa-bell" style="color: white;"></a>
               	<?php }?>
<!--                     <a href="/notification.php?action=delete&id=<?php echo $user_id; ?>" class="fas fa-bell" style="color: white;"></a>
 -->                    <a style="padding-left:25px;" href='#'><i class="fas fa-plus" style="color: white;"></i></a>
                    <a style="padding-left:25px;" href='#'><i class="fas fa-edit" style="color: white;"></i></a>
                    <a style="padding-left:25px;" href='#'><i class="fas fa-trash-alt" style="color: white;"></i></a>
                  </td>
			    </tr>
			  </tbody>
			</table>
		</div>
	</div>
 </div>
</section>

<?php include '../includes/footer.php'; ?>

</body>
</html>