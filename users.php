<?php
   include('header.php');
   checkUser();
   adminArea();

   if (isset($_GET['type']) && $_GET['type'] == 'delete' && isset($_GET['id']) && $_GET['id'] > 0) {
      $id = get_safe_value($_GET['id']);
      mysqli_query($con, "DELETE FROM users WHERE id=$id");
      mysqli_query($con, "DELETE FROM expense WHERE added_by=$id");
      echo "<br/>Data deleted<br/>";
   }

   $res = mysqli_query($con, "SELECT * FROM users WHERE role='User' ORDER BY id DESC");
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <title>TrackWise - Users</title>
   <style>
      * {
         margin: 0;
         padding: 0;
         box-sizing: border-box;
         font-family: 'Segoe UI', sans-serif;
      }

      body {
         background: linear-gradient(to right, #141e30, #243b55);
         color: #fff;
         padding: 40px 20px;
      }

      .main-content {
         max-width: 960px;
         margin: auto;
         background: rgba(255, 255, 255, 0.05);
         border-radius: 12px;
         padding: 30px;
         box-shadow: 0 5px 20px rgba(0, 0, 0, 0.2);
         animation: fadeIn 1s ease-in-out;
      }

      h2 {
         font-size: 2rem;
         text-align: center;
         margin-bottom: 20px;
         color: #ffcc00;
      }

      a {
         text-decoration: none;
         color: #00ffff;
         font-weight: bold;
         transition: color 0.3s ease;
      }

      a:hover {
         color: #ff6600;
      }

      .add-user {
         display: inline-block;
         margin-bottom: 20px;
         padding: 10px 20px;
         background-color: #00c6ff;
         color: #fff;
         border-radius: 8px;
         font-weight: bold;
         transition: background-color 0.3s ease-in-out;
      }

      .add-user:hover {
         background-color: #0072ff;
      }

      table {
         width: 100%;
         border-collapse: collapse;
         margin-top: 20px;
         background: rgba(0, 0, 0, 0.2);
         border-radius: 8px;
         overflow: hidden;
      }

      th, td {
         padding: 15px;
         text-align: left;
         border-bottom: 1px solid #555;
         color: #f0f0f0;
      }

      th {
         background: #333;
         color: #ffcc00;
         font-weight: 600;
      }

      tr:hover {
         background-color: rgba(255, 255, 255, 0.05);
      }

      .action-buttons a {
         margin-right: 15px;
         padding: 6px 12px;
         border-radius: 6px;
         background: #444;
         color: #fff;
         transition: all 0.3s ease;
         font-size: 0.9rem;
      }

      .action-buttons a:hover {
         background: #ff6347;
         color: #fff;
      }

      @keyframes fadeIn {
         from {
            opacity: 0;
            transform: translateY(-20px);
         }
         to {
            opacity: 1;
            transform: translateY(0);
         }
      }

      .no-data {
         text-align: center;
         margin-top: 20px;
         font-size: 1.2rem;
         color: #ff9999;
      }
   </style>
</head>
<body>
   <div class="main-content">
      <h2>Users</h2>
      <a class="add-user" href="manage_user.php">+ Add User</a>

      <?php if (mysqli_num_rows($res) > 0) { ?>
         <div class="table-responsive">
            <table>
               <thead>
                  <tr>
                     <th>ID</th>
                     <th>Username</th>
                     <th>Actions</th>
                  </tr>
               </thead>
               <tbody>
                  <?php while ($row = mysqli_fetch_assoc($res)) { ?>
                     <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo htmlspecialchars($row['username']); ?></td>
                        <td class="action-buttons">
                           <a href="manage_user.php?id=<?php echo $row['id']; ?>">Edit</a>
                           <a href="javascript:void(0)" onclick="delete_confir('<?php echo $row['id']; ?>', 'users.php')">Delete</a>
                        </td>
                     </tr>
                  <?php } ?>
               </tbody>
            </table>
         </div>
      <?php } else { ?>
         <div class="no-data">No users found.</div>
      <?php } ?>
   </div>

   <script>
      setTitle("Users");
      selectLink("users_link");

      function delete_confir(id, page) {
         if (confirm("Are you sure you want to delete this user?")) {
            window.location.href = page + "?type=delete&id=" + id;
         }
      }
   </script>
</body>
</html>

<?php include('footer.php'); ?>
