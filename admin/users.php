<?php
include '/xampp/htdocs/movies/db.php';
include 'side_bar.php';
?>
<section class="body" style=" padding:20px;">
    <h2 style="text-align:center; margin-bottom:20px;">Users List</h2>

    <table style="width:100%; border-collapse:collapse; text-align:center; background-color:#393636; color:white;">
        <thead>
            <tr style="background-color:#222;">
                <th style="padding:10px; border:1px solid #555;">ID</th>
                <th style="padding:10px; border:1px solid #555;">Full Name</th>
                <th style="padding:10px; border:1px solid #555;">Email</th>
                <th style="padding:10px; border:1px solid #555;">Account Type</th>
                <th style="padding:10px; border:1px solid #555;">Action</th>
            </tr>
        </thead>
        <tbody>
        <?php
        $sql = 'SELECT * FROM users';
        $all = $conn->query($sql);
        if ($all) {
            while ($row = $all->fetch_assoc()) {
                echo '<tr>
                    <td style="padding:8px; border:1px solid #555;">' . $row['id'] . '</td>
                    <td style="padding:8px; border:1px solid #555;">' . htmlspecialchars($row['full_name']) . '</td>
                    <td style="padding:8px; border:1px solid #555;">' . htmlspecialchars($row['email']) . '</td>
                    <td style="padding:8px; border:1px solid #555;">' . htmlspecialchars($row['account_type']) . '</td>
                    <td style="padding:8px; border:1px solid #555;">
                        <form method="POST" action="delete_user.php" onsubmit="return confirm(\'Are you sure you want to delete this user?\');" style="margin:0;">
                            <input type="hidden" name="id" value="' . $row['id'] . '">
                            <button type="submit" style="background:red; color:white; border:none; padding:6px 12px; border-radius:5px; cursor:pointer;">
                                <i class="bi bi-trash3"></i>
                            </button>   
                        </form>
                    </td>
                </tr>';
            }
        }
        ?>
        </tbody>
    </table>
    <?php include '/xampp/htdocs/movies/footer.php';?>
</section>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
