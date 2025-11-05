<?php
include '/xampp/htdocs/movies/db.php';

include 'side_bar.php';
?>


<section class="body">
    <section class="main">
        <div class="first">
            <h1>Dashboard</h1>
            <a href="add.php"><button class="add_button" style="background-color: #cbfc01; color:black;">ADD MOVIES</button></a>
        </div>

        <div class="secound">
            <div class="count">Total Number of Movies
                <?php
                $sql = 'SELECT COUNT(*) as total FROM movie';
                $a = $conn->query($sql);
                echo $a ? $a->fetch_assoc()['total'] : '0';
                ?>
            </div>
            <div class="comments">Total Number of Users:
                <?php
                $sql = 'SELECT COUNT(*) as total FROM users';
                $all = $conn->query($sql);
                echo $all ? $all->fetch_assoc()['total'] : '0';
                ?>
            </div>
        </div>

        <div class="third">
            <?php
            $genres = ['Action', 'Drama', 'Thriller', 'Comedy', 'Sci-Fi'];
            foreach ($genres as $genre):
            ?>
                <div>
                    <h2><?php echo $genre; ?></h2>
                    <table>
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Genre</th>
                            <th>Actions</th>
                        </tr>
                        <?php
                        $sql = "SELECT * FROM movie WHERE genre1='$genre' OR genre2='$genre' OR genre3='$genre' OR genre4='$genre'";
                        $all = $conn->query($sql);
                        if ($all) {
                            $count = 1;
                            while ($row = $all->fetch_assoc()) {
                                echo '<tr>
                                        <td>' . $count . '</td>
                                        <td>' . $row['title'] . '</td>
                                        <td>' . $row['genre1'] . ',' . $row['genre2'] . ',' . $row['genre3'] . ',' . $row['genre4'] . '</td>
                                        <td>
                                            <a href="update.php?id=' . $row['id'] . '" style="color:#cbfc01"><i class="bi bi-pen"></i></a> | 
                                            <a href="delete.php?id=' . $row['id'] . '" style="color:red;" onclick="return confirm(\'Are you sure you want to delete this movie?\')"><i class="bi bi-trash3"></i></a>
                                        </td>
                                    </tr>';
                                $count++;
                            }
                        }
                        ?>
                    </table>
                </div>
            <?php endforeach; ?>
        </div>
    </section>

    <?php include '/xampp/htdocs/movies/footer.php'; ?>
</section>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
<?php
?>