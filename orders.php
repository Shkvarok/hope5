<?php

if (isset($_SESSION['customer_email'])) {

    $c_id = $_SESSION['customer_email'];

    $query = "SELECT * FROM customer WHERE customer_email = '$c_id'";

    $run_query = mysqli_query($con, $query);

    $get_query = mysqli_fetch_array($run_query);

    $custom_id = $get_query['customer_id'];

    $get_items = "SELECT * FROM orders WHERE c_id = '$custom_id' ORDER BY date DESC";
    $run_items = mysqli_query($db, $get_items);

    echo "
    <div class='cart-table' style='min-height: 150px;'>
    <table>
        <thead style='font-size: larger;'>
            <tr>
                <th>Order ID</th>
                <th>Price</th>
                <th> Quantity</th>
                <th>Date</th>
                <th>Delivery</th>
            </tr>
        </thead>
        <tbody>
    ";

    while ($row_items = mysqli_fetch_array($run_items)) {
        $o_id = $row_items['order_id'];
        $o_qty = $row_items['order_qty'];
        $o_price = $row_items['order_price'];
        $o_date = $row_items['date'];
        $o_delivery = $row_items['delivery'];

        // Перевірка значення поля delivery
        if ($o_delivery == '-') {
            $delivery_status = "в очікуванні відправлення";
        } elseif ($o_delivery == '+') {
            $delivery_status = "відправлено";
        } else {
            $delivery_status = "невідомий статус";
        }

        echo "
            <tr style='border-bottom: 0.5px solid #ebebeb'>
                <td class='first-row'>$o_id</td>
                <td class='first-row'>$o_price</td>
                <td class='first-row'>$o_qty</td>
                <td class='first-row'>$o_date</td>
                <td class='first-row'>$delivery_status</td>
            </tr>
        ";
    }

    echo "
        </tbody>
    </table>
    </div>";
}
