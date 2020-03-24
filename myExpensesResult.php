<?php
    require_once("class.php");
    require_once("dbconnect.php");

    if ($_SERVER["REQUEST_METHOD"] !== "POST" || $post["button"] !== "click") {
        header("location: myExpenses.php");
        exit;
    }

    $post = $_POST;
    $expense = new expense($post);
    $expense->month = "March";

    // 収支の計算を変数化
    $income = 215000;
    $rent = 43000;
    $balance = $income - $rent;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Result</title>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <header>
        <h1><?php echo "The Expenses of $expense->month"?></h1>
    </header>

    <main>
        <div class="details">
            <section>
                <p>- The basic expenses -</p>
                <ol>
                    <li><?php echo "Income : " . "¥" . number_format($income) ?></li>
                    <li><?php echo "Rent : " . "¥". number_format($rent) ?></li>
                </ol>
            </section>

            <?php if(!empty($post["expense"]) && !empty($expense->post["date"])) : ?>
            <article>
                <p><?php echo "-The expenses of {$expense->month}-"?></p>
                <?php foreach ($total_food as $sum_food) :?>
                <p><?php echo "The expense of Food : ¥". number_format($sum_food["total_food"]) ?></p>
                <?php endforeach; ?>
                <?php foreach ($total_snack_sweets as $sum_snack_sweets) :?>
                <p><?php echo "The expense of Snack/Sweets : ¥" . number_format($sum_snack_sweets["total_snack_sweets"]) ?></p>
                <?php endforeach; ?>
                <?php foreach ($total_dine_out as $sum_dine_out) :?>
                <p><?php echo "The expense of Dine Out : ¥". number_format($sum_dine_out["total_dine_out"]) ?></p>
                <?php endforeach; ?>
                <?php foreach ($total_living_expenses as $sum_living_expenses) :?>
                <p><?php echo "The expense of Living expenses : ¥" . number_format($sum_living_expenses["total_living_expenses"]) ?></p>
                <?php endforeach; ?>
                <?php foreach ($total_entertainment_expenses as $sum_entertainment_expenses) :?>
                <p><?php echo "The expense of Entertainment expenses : ¥". number_format($sum_entertainment_expenses["total_entertainment_expenses"]) ?></p>
                <?php endforeach; ?>
                <?php foreach($total_expenses as $sum) :?>
                <p><?php echo "The total of expense : ¥" . number_format($sum["total"]) ?></p>
                <?php endforeach; ?>
                <p><?php echo "Balance : ¥" . number_format($balance - $sum["total"]) ?></p>
            </article>

            <aside>
                <ol>
                    <p>-The Summary-</p>
                    <li><?php foreach ($stmt as $row) :?></li>
                    <li><?= $row["date"]?></li>
                    <p><?= $row["category"]. " : ". "¥".number_format($row["expense"])?></p><br>
                    <?php endforeach; ?>
                </ol>
            </aside>
            <?php endif; ?>
        </div>

        <form action="myExpenses.php" method= "POST">
            <div class="button">
                <button name="back" >Back</button>
            </div>
        </form>

    </main>
    <footer></footer>
    
</body>
</html>

