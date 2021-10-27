<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/book.css">
    <title>Checkpoint PHP 1</title>
</head>

<body>

    <?php include 'header.php'; ?>
    <?php include 'bribe.php'; ?>

    <main class="container">

        <section class="desktop">
            <div class="parent_whisky">
                <img src="image/whisky.png" alt="a whisky glass" class="whisky" />
            </div>
            <div class="empty_parent">
                <img src="image/empty_whisky.png" alt="an empty whisky glass" class="empty-whisky" />
            </div>
            <div class="pages">
                <div class="page leftpage" id="leftpage">
                    <form method="post" action="book.php">
                        <div>
                            <label for="name">Nom :</label>
                            <input type="text" id="name" name="name" required="required">
                            <span class="error"> <?php echo $nameErr; ?></span>
                        </div>
                        <div>
                            <label for="payment">Montant :</label>
                            <input type="number" id="payment" name="payment" required="required">
                            <span class="error"> <?php echo $paymentErr; ?></span>
                        </div>
                        <div class="button">
                            <input type="submit" name="submit" value="Soumettre">
                        </div>
                    </form>
                </div>

                <div class="page rightpage" id="rightpage">
                    <table>
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Payment</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($bribes as $bribe => $value) : ?>
                                <tr>
                                    <td><?php echo $value["name"]; ?></td>
                                    <td><?php echo $value["payment"]; ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Total</th>
                                <th>
                                    <?php
                                    $sum = 0;
                                    foreach ($bribes as $bribe => $value) {

                                        $sum += $value["payment"];
                                    }
                                    echo $sum;

                                    ?>
                                </th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
            <div class="parent_pen">
                <img src="image/inkpen.png" alt="an ink pen" class="inkpen" />
            </div>
        </section>
    </main>
</body>

</html>