<?php
require_once("class.php");

// class.phpからの取得要素
$post = $_POST;
$expense = new expense($post);
$expense->month = "March";

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My expenses</title>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <header>
        <h1><?php echo "The Expenses of $expense->month" ?></h1>
    </header>

    <main>
        <form action="myExpensesResult.php" method="POST">
            <div class="input_area">

                <div class="date">
                    Date: <input type="date" name="date" value="">
                </div>

                <div class="category">
                    Category: <select name="category" id="">
                        <?php echo $expense->OutputCategory() ?>
                    </select>
                </div>

                <div class="expense">
                    Expense: <input type="number" name="expense" value=""><br>
                </div>

            </div>
            <div class="button">
                <button type="submit" name="button" value="click">Caluculate</button>
            </div>
        </form>
    </main>

    <footer></footer>
</body>

</html>