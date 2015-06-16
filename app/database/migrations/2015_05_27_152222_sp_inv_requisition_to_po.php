<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SpInvRequisitionToPo extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        /*DB::unprepared('CREATE PROCEDURE sp_inv_requisition_to_po(
            param_requisition_id INT(11),
            param_user_id INT(11)
            )
            BEGIN
            DECLARE var_inv_purchase_order_head_id INT;

            INSERT INTO inv_purchase_order_head(inv_requisition_head_id, inv_supplier_id, amount, `status`, created_by, created_at)
                SELECT irh.id, irh.inv_supplier_id, SUM(ird.rate * ird.quantity), "open", param_user_id, CURRENT_TIMESTAMP
                FROM inv_requisition_head irh
                JOIN inv_requisition_detail ird ON ird.inv_requisition_head_id = irh.id
                WHERE irh.id = param_requisition_id GROUP BY irh.id;


            SET var_inv_purchase_order_head_id = LAST_INSERT_ID();

            INSERT INTO inv_purchase_order_detail(inv_po_head_id, inv_product_id, purchase_rate, unit, quantity, created_by, created_at)
                SELECT var_inv_purchase_order_head_id, ird.inv_product_id, ird.rate, ird.unit, ird.quantity,
                param_user_id, CURRENT_TIMESTAMP
            FROM inv_requisition_detail ird WHERE ird.inv_requisition_head_id = param_requisition_id;

            UPDATE inv_requisition_head SET `status` = "PO Created" WHERE id = param_requisition_id;


        END

             ');*/
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		//
	}

}
