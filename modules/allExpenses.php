<?php
require '../config/config.php';
require '../includes/header.php';
echo bc("Barcha harajatlar");
  // Set session
  session_start();
  if(isset($_POST['records-limit'])){
      $_SESSION['records-limit'] = $_POST['records-limit'];
  }
  
  $limit = isset($_SESSION['records-limit']) ? $_SESSION['records-limit'] : 5;
  $page = (isset($_GET['page']) && is_numeric($_GET['page']) ) ? $_GET['page'] : 1;
  $paginationStart = ($page - 1) * $limit;
  $expenses = $conn->query("SELECT * FROM expenses WHERE user_id = $user_id LIMIT $paginationStart, $limit")->fetchAll();
  // Get total records
  $sql = $conn->query("SELECT count(expense_id) AS expense_id FROM expenses WHERE user_id = $user_id")->fetchAll();
  $allRecrods = $sql[0]['expense_id'];
  
  // Calculate total pages
  $totoalPages = ceil($allRecrods / $limit);
  // Prev + Next
  $prev = $page - 1;
  $next = $page + 1;
?>
<div class="card card-body">
        <!-- Select dropdown -->
        <div class="card-title d-flex flex-row-reverse bd-highlight mb-0">
            <form action="" method="post">
                <select name="records-limit" id="records-limit" class="form-select">
                    <option disabled selected>Satrlar soni</option>
                    <?php foreach([5,7,10,12] as $limit) : ?>
                    <option
                        <?php if(isset($_SESSION['records-limit']) && $_SESSION['records-limit'] == $limit) echo 'selected'; ?>
                        value="<?= $limit; ?>">
                        <?= $limit; ?>
                    </option>
                    <?php endforeach; ?>
                </select>
            </form>
        </div>
        <!-- Datatable -->
        <table class="table table-bordered mb-5">
            <thead>
                <tr class="table-success">
                    <th scope="col">Turi</th>
                    <th scope="col">Summa</th>
                    <th scope="col">Vaqti</th>
                    <th scope="col"><i class="bi bi-shield-exclamation"></i></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($expenses as $expense): ?>
                <tr
                <?php if ($expense['expense'] >= $user['maxExpense'])
            echo ' class="table-danger"';
        elseif ($expense['expense'] >= ($user['maxExpense']/2))
            echo ' class="table-warning"';
        ?>
                    ><td><?php echo $expense['expensecategory']; ?></td>
                    <td><?php echo number_format($expense['expense']); ?></td>
                    <td><?php echo $expense['expensedate']; ?></td>
                    <td><a href="/modules/view.php?id='.$expense['expense_id'].'"><i class="bi bi-eye-fill"></i></a> / <a href="/modules/delete.php?id='.$expense['expense_id'].'"><i class="bi bi-trash-fill"></i></a></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <!-- Pagination -->
        <nav aria-label="Paginatsiya qismi">
            <ul class="pagination justify-content-center">
                <li class="page-item <?php if($page <= 1){ echo 'disabled'; } ?>">
                    <a class="page-link"
                        href="<?php if($page <= 1){ echo '#'; } else { echo "?page=" . $prev; } ?>">Avvalgi</a>
                </li>
                <?php for($i = 1; $i <= $totoalPages; $i++ ): ?>
                <li class="page-item <?php if($page == $i) {echo 'active'; } ?>">
                    <a class="page-link" href="?page=<?= $i; ?>"> <?= $i; ?> </a>
                </li>
                <?php endfor; ?>
                <li class="page-item <?php if($page >= $totoalPages) { echo 'disabled'; } ?>">
                    <a class="page-link"
                        href="<?php if($page >= $totoalPages){ echo '#'; } else {echo "?page=". $next; } ?>">Keyingi</a>
                </li>
            </ul>
        </nav>
    </div>
    <!-- jQuery + Bootstrap JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#records-limit').change(function () {
                $('form').submit();
            })
        });
    </script>
<?php
require_once '../includes/footer.php'; ?>