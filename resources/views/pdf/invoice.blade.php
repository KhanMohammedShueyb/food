<style type="text/css">
@page { size: 1050pt 1100pt; }
body {
    padding: 0;
    margin: 0;
}
</style>
<div align="center">
  <table border="0" cellpadding="0" cellspacing="0" width="80%">
    <tr>
      <td style="padding: 20px 0 30px 0;" align="center" bgcolor="#eff3f8">
        <table align="center" border="0" cellpadding="0" cellspacing="0" width="90%" style="border-collapse: collapse; border: 1px solid #cccccc;">
          <tr>
            <td bgcolor="#ffffff" style="padding: 10px 30px 40px 30px;">
              <table border="0" cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse;">
                <tr>
                  <td style="color: #000; font-family: Arial, sans-serif; border-bottom: 2px solid #0c7cba;"></td>
                </tr>
                <tr>
                  <td style="padding-top: 25px;">
                    <table border="0" cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse;">
                      <tr style="margin-top: 25px !important;">
                          <td width="300" valign="top">
                          <table border="0" cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse;">
                            <tr>
                              <td>
                                <table width="100%" style="color: #000; font-family: Arial, sans-serif; font-size: 13px !important;">
                                  <tr>
                                  <!-- <img src="logo.png" alt="Affinity" style="padding: 0px; width: 150px;"/> -->
                                    <td><img src="images/logo.png" alt="Affinity" width="250" style="padding: 0px;width: 150px;"/> </td>
                                  </tr>
                                  <tr>
                                    <td><?php echo $orderDetail->location->name ?></td>
                                  </tr>
                                  <tr>
                                    <td><?php echo $orderDetail->location->street ?></td>
                                  </tr>
                                  <tr>
                                    <td><?php echo $orderDetail->location->city ?>, <?php echo $orderDetail->location->state ?>, <?php echo $orderDetail->location->zip ?></td>
                                  </tr>
                                  <tr>
                                    <td>test.com</td>
                                  </tr>
                                  <tr>
                                    <td><?php echo $orderDetail->location->phone ?></td>
                                  </tr>
                                  <tr>
                                    <td>Printed on: <?php echo date('Y-M-d'); ?></td>
                                  </tr>
                                </table>
                              </td>
                            </tr>
                          </table>
                        </td>
                        <td width="300" valign="top">
                          <table border="0" cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse;">
                            <tr>
                              <td>
                                <table width="100%" style="color: #000; font-family: Arial, sans-serif; font-size: 12px !important;">
                                  <tr>
                                    <td style="text-align: center;">
                                      <span style="color: #0b97b9 !important; font-size: 24px;">
                                          <b>Purchase Receipt</b>
                                      </span>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td style="font-size: 13px; text-align: center;"><?php echo date('Y-M-d'); ?></td>
                                  </tr>
                                  <tr>
                                    <td style="font-size: 13px; text-align: center;">PO<?php echo $orderDetail->id ?></td>
                                  </tr>
                                </table>
                              </td>
                            </tr>
                          </table>
                        </td>
                        <td style="font-size: 0; line-height: 0;" width="20">&nbsp;</td>
                        <td width="300" valign="top">
                          <table border="0" cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse;">
                            <tr>
                              <td>
                                <table width="100%" style="color: #000; font-family: Arial, sans-serif; font-size: 13px !important;">
                                <tr>
                                  <td colspan="2" style="text-align: right; font-size: 17px !important;">
                                    <b>Client information</b>
                                    <br/><br/>
                                  </td>
                                </tr>
                                <tr>
                                  <td style="text-align: right;"><?php echo $orderDetail->customer->first_name ?> <?php echo $orderDetail->customer->last_name ?></td>
                                </tr>
                                <tr>
                                  <td style="text-align: right;"><?php echo $orderDetail->customer_payment_address->street ?>, <?php echo $orderDetail->customer_payment_address->city ?></td>
                                </tr>
                                <tr>
                                  <td style="text-align: right;">USA, <?php echo $orderDetail->customer_payment_address->state ?>, <?php echo $orderDetail->customer_payment_address->zip ?></td>
                                </tr>
                                <tr>
                                  <td style="text-align: right;"><?php echo $orderDetail->customer->phone ?></td>
                                </tr>
                              </table>
                              </td>
                            </tr>
                          </table>
                        </td>
                      </tr>
                    </table>
                  </td>
                </tr>
                  <tr>
                    <td style="color: #000; font-family: Arial, sans-serif; padding: 0px 0 30px 0;">
                      <br>
                      <span style="font-size: 15px;"><b>ITEMS PURCHASED</b></span>
                      <br/><br/>
                      <span style="color: #0b97b9 !important;"><b>Bullion</b></span>
                      <br/><br/>
                      <table style="font-size: 13px; border-collapse: collapse; width: 100%;">
                        <tr>
                          <th style="color: #808080; border-bottom: 1px solid #dddddd; border-right: 1px solid #dddddd; text-align: left; padding: 8px;">Type</th>
                          <th style="color: #808080; border-bottom: 1px solid #dddddd; border-right: 1px solid #dddddd; text-align: left; padding: 8px;">Description</th>
                          <th style="color: #808080; border-bottom: 1px solid #dddddd; border-right: 1px solid #dddddd; text-align: left; padding: 8px;">Qty Ordered</th>
                          <th style="color: #808080; border-bottom: 1px solid #dddddd; border-right: 1px solid #dddddd; text-align: left; padding: 8px;">Qty Received</th>
                          <th style="color: #808080; border-bottom: 1px solid #dddddd; border-right: 1px solid #dddddd; text-align: left; padding: 8px;">Unit Price</th>
                          <th style="color: #808080; border-bottom: 1px solid #dddddd; text-align: left; padding: 8px;">Amount</th>
                        </tr>
                        <?php 
                          $subTotal = 0;
                          foreach($orderDetail->inventory_products as $order){ 
                            $amount = 0;
                        ?>
                        <tr>
                          <td style="border-bottom: 1px solid #dddddd; border-right: 1px solid #dddddd; text-align: left; padding: 8px;"><?php echo $order->products->type ?></td>
                          <td style="border-bottom: 1px solid #dddddd; border-right: 1px solid #dddddd; text-align: left; padding: 8px;"><?php echo $order->products->description ?></td>
                          <td style="border-bottom: 1px solid #dddddd; border-right: 1px solid #dddddd; text-align: right; padding: 8px;"><?php echo $order->product_quantity ?></td>
                          <td style="border-bottom: 1px solid #dddddd; border-right: 1px solid #dddddd; text-align: right; padding: 8px;"><?php echo $order->product_quantity ?></td>
                          <td style="border-bottom: 1px solid #dddddd; border-right: 1px solid #dddddd; text-align: right; padding: 8px;">$<?php echo number_format($order->product_price, 2) ?></td>
                          <td style="border-bottom: 1px solid #dddddd; text-align: right; padding: 8px;">$<?php echo number_format($order->product_price * $order->product_quantity, 2)  ?></td>
                        </tr>
                        <?php 
                          $amount = $order->product_price * $order->product_quantity;
                          $subTotal += $amount;
                          } 
                        ?>
                        <tr>
                          <td colspan="6" style="border-bottom: 1px solid #dddddd; text-align: right; padding: 8px;"><b>Subtotal $<?php echo number_format($subTotal, 2) ?></b></td>
                        </tr>
                        <tr>
                          <td colspan="6" style="border-bottom: 1px solid #dddddd; text-align: right; padding: 8px;"><b>Total Tax $<?php echo number_format($orderDetail->tax_amount, 2) ?></b></td>
                        </tr>
                        <tr>
                          <td colspan="6" style="border-bottom: 1px solid #dddddd; text-align: right; padding: 8px;"><b>Total Shipping $<?php echo number_format($orderDetail->shipping_cost, 2) ?></b></td>
                        </tr>
                      </table>
                    </td>
                  </tr>
                  <tr>
                    <td style="color: #000; font-family: Arial, sans-serif; font-size: 14px; padding: 0px 0 30px 0;">
                      <span style="font-size: 15px;"><b>Reception History</b></span>
                      <table style="font-size: 13px; border-collapse: collapse; width: 100%;">
                        <tr>
                          <th style="color: #808080; border-bottom: 1px solid #dddddd; border-right: 1px solid #dddddd; text-align: left; padding: 8px;">Date</th>
                          <th style="color: #808080; border-bottom: 1px solid #dddddd; border-right: 1px solid #dddddd; text-align: left; padding: 8px;">Description</th>
                          <th style="color: #808080; border-bottom: 1px solid #dddddd; text-align: left; padding: 8px;">Delivered</th>
                        </tr>
                        <?php foreach($orderDetail->inventory_products as $order){ ?>
                        <tr>
                          <td style="border-right: 1px solid #dddddd; text-align: left; padding: 8px;"><?php echo $order->created_at; ?></td>
                          <td style="border-right: 1px solid #dddddd; text-align: left; padding: 8px;"><?php echo $order->products->description; ?></td>
                          <td style="text-align: right; padding: 8px;"><?php echo $order->product_quantity ?></td>
                        </tr>
                        <?php } ?>
                      </table>
                    </td>
                  </tr>
                  <tr>
                    <td style="height: 300px;"></td>
                  </tr>
                  <tr>
                  <td style="padding-bottom: 25px;">
                    <table border="0" cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse;">
                      <tr style="margin-top: 25px !important;">
                        <!-- <td width="260" valign="top"> -->
                          <td width="70%" valign="top">
                          <table border="0" cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse;">
                            <tr>
                              <td>
                                <table width="100%" style="color: #000; font-family: Arial, sans-serif; font-size: 13px !important;">
                                  <tr>
                                    <td style="width: 75px; color: #808080;">Spot Prices</td>
                                    <td style="color: #808080;">
                                      <div>
                                        <span style="margin-right: 5px;">Gold: $1750.80</span>
                                        <span style="margin-right: 5px;">Silver: $22.40</span>
                                        <span style="margin-right: 5px;">Platinum: $939.50</span>
                                        <span style="margin-right: 5px;">Palladium: $1999.50</span>
                                      </div>
                                    </td>
                                  </tr>
                                </table>
                              </td>
                            </tr>
                          </table>
                        </td>
                        <td style="font-size: 0; line-height: 0;" width="20">&nbsp;</td>
                        <td width="30%" valign="top">
                          <table border="0" cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse;">
                            <tr>
                              <td>
                                <table width="100%" style="color: #000; font-family: Arial, sans-serif; font-size: 17px !important;">
                                <tr>
                                  <td style="width: 130px;">
                                    <b>Grand Total</b>
                                  </td>
                                  <td>
                                    <b>$<?php echo number_format($subTotal + $orderDetail->tax_amount + $orderDetail->shipping_cost, 2) ?></b>
                                  </td>
                                </tr>
                              </table>
                              </td>
                            </tr>
                          </table>
                        </td>
                      </tr>
                    </table>
                  </td>
                </tr>
                <tr>
                  <td>
                    <hr/>
                  </td>
                </tr>
                <tr>
                  <td>
                    <table border="0" cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse;">
                      <tr style="margin-top: 25px !important;">
                        <td width="70%" valign="top">
                          <table border="0" cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse;">
                            <tr>
                              <td>
                                <table width="100%">
                                  <tr>
                                    <td style="color: #000; font-family: Arial, sans-serif; font-size: 12px !important;"><b>Post transaction client balances</b></td>
                                  </tr>
                                </table>
                              </td>
                            </tr>
                          </table>
                        </td>
                        <td style="font-size: 0; line-height: 0;" width="20">&nbsp;</td>
                        <td width="30%" valign="top">
                          <table border="0" cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse;">
                            <tr>
                              <td>
                                <table width="100%" style="color: #000; font-family: Arial, sans-serif; font-size: 14px !important;">
                                <tr>
                                  <td style="color: #000; font-family: Arial, sans-serif; font-size: 12px !important; text-align: right;"><b>Items received in good order</b></td>
                                </tr>
                              </table>
                              </td>
                            </tr>
                          </table>
                        </td>
                      </tr>
                    </table>
                  </td>
                </tr>
                <tr>
                  <td>
                    <table border="0" cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse;">
                      <tr>
                          <td width="1%" valign="top">
                          <table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse; margin-right: 5px;">
                            <tr>
                              <td>
                                <table width="200px" style="font-family: Arial, sans-serif; font-size: 12px !important; ">
                                  <tr>
                                    <td style="color: #808080;">Cleared funds</td>
                                    <td style="text-align: right; color: #40b066;">$11,928.44</td>
                                  </tr>
                                  <tr>
                                    <td style="color: #808080;">On Hold Funds</td>
                                    <td style="text-align: right; color: #40b066;">$0.00</td>
                                  </tr>
                                  <tr>
                                    <td style="color: #808080;">Total funds</td>
                                    <td style="text-align: right; color: #40b066;">$11,928.44</td>
                                  </tr>
                                </table>
                              </td>
                            </tr>
                          </table>
                        </td>
                        <td width="20%" valign="top">
                          <table border="0" cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse;">
                            <tr>
                              <td>
                                <table width="200px" style="color: #000; font-family: Arial, sans-serif; font-size: 12px !important; ">
                                  <tr>
                                    <td style="color: #808080;">Cleared funds</td>
                                    <td style="text-align: right; color: #40b066;">$11,928.44</td>
                                  </tr>
                                  <tr>
                                    <td style="color: #808080;">On Hold Funds</td>
                                    <td style="text-align: right; color: #40b066;">$0.00</td>
                                  </tr>
                                  <tr>
                                    <td style="color: #808080;">Total funds</td>
                                    <td style="text-align: right; color: #40b066;">$11,928.44</td>
                                  </tr>
                                </table>
                              </td>
                            </tr>
                          </table>
                        </td>
                      </tr>
                    </table>
                  </td>
                </tr>
                <tr>
                  <td>
                    <table border="0" cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse;">
                      <tr style="margin-top: 25px !important;">
                        <td width="70%" valign="top">
                          <table border="0" cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse;">
                            <tr>
                              <td>
                                <table width="100%">
                                  <tr>
                                    <td style="color: #000; font-family: Arial, sans-serif; font-size: 12px !important;"><b>Transaction Status: Received</b></td>
                                  </tr>
                                </table>
                              </td>
                            </tr>
                          </table>
                        </td>
                      </tr>
                    </table>
                  </td>
                </tr>
                <tr>
                  <td>
                    <table border="0" cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse;">
                      <tr style="margin-top: 25px !important;">
                        <td width="70%" valign="top">
                          <table border="0" cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse;">
                            <tr>
                              <td>
                                <table width="100%">
                                  <tr>
                                    <td style="color: #000; font-family: Arial, sans-serif; font-size: 12px !important;"><b>Payments received on this transaction: None </b></td>
                                  </tr>
                                </table>
                              </td>
                            </tr>
                          </table>
                        </td>
                      </tr>
                    </table>
                  </td>
                </tr>
                <tr>
                  <td>
                    <table border="0" cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse;">
                      <tr style="margin-top: 25px !important;">
                        <td width="70%" valign="top"></td>
                        <td width="30%" valign="top">
                          <table border="0" cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse;">
                            <tr>
                              <td>
                                <table width="100%">
                                  <tr>
                                    <td style="color: #000; font-family: Arial, sans-serif; font-size: 12px !important;">
                                      <div style="border-top: 1px solid #000;">
                                        <b>Client's signature</b>
                                      </div>
                                    </td>
                                  </tr>
                                </table>
                              </td>
                            </tr>
                          </table>
                        </td>
                      </tr>
                    </table>
                  </td>
                </tr>
                <tr>
                  <td style="color: #000; font-family: Arial, sans-serif; border-bottom: 2px solid #0c7cba; padding-top: 20px;"></td>
                </tr>
                </table>
      </td>
    </tr>
  </table>
</div>
