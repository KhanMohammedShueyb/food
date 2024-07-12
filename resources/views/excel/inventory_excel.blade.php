<table >
    <tr>
      <th>Date</th>
      <th>Customer Name</th>
      <th>Location</th>
      <th>Total Product Amt.</th>
      <th>Tax Amount</th>
      <th>Shipping Amount</th>
      <th>Grand Total</th>
      <th>Delivery Status</th>
      <th>Last Edited</th>
      <th>Comments</th>
    </tr>
    <?php 
      foreach($data as $order){ 
    ?>
    <tr>
      <td ><?php echo $order->created_at ?></td>
      <td ><?php echo $order->customer->first_name ?> <?php echo $order->customer->last_name ?></td>
      <td ><?php echo $order->location['street'] . " " . $order->location['city'] . " " . $order->location['zip'] . " " . $order->location['state'] . " " . $order->location['country'] ?></td>
      <td >$<?php echo number_format($order->total, 2) ?></td>
      <td >$<?php echo number_format($order->tax_amount, 2) ?></td>
      <td >$<?php echo number_format($order->shipping_cost, 2) ?></td>
      <td >$<?php echo number_format($order->total + $order->tax_amount + $order->shipping_cost, 2) ?></td>
      <td ><?php echo $order->order_status ?></td>
      <td ><?php echo $order->updated_at ?></td>
      <td ><?php echo $order->comments ?></td>
    </tr>
    <tr>
      <!-- <table width="70%">
        <tr>
          <th>Product Name</th>
          <th>Product Price</th>
          <th>Product Quantity</th>
          <th>Comments</th>
        </tr>
        <?php //foreach($order['inventory_products'] as $inventory){ ?>
          <tr>
            <td><?php //$inventory['products']['name'] ?></td>
            <td><?php //$inventory['products']['price'] ?></td>
            <td><?php //$inventory['product_quantity'] ?></td>
            <td><?php //$inventory['comments'] ?></td>
          </tr>
        <?php //} ?> -->
      </table>
    </tr>
    <?php 
      } 
    ?>
  </table>
