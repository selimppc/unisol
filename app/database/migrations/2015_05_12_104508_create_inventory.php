<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInventory extends Migration {

	public function up()
	{
        Schema::create('inv_supplier', function(Blueprint $table) {
            $table->increments('id');
            $table->string('code', 8)->unique()->nullable();
            $table->string('company_name',32)->nullable();
            $table->text('address')->nullable()->nullable();
            $table->unsignedInteger('country_id')->nullable();
            $table->decimal('zip_code', 5,0)->nullable();
            $table->string('contact_person',32)->nullable();
            $table->string('phone',16)->nullable();
            $table->string('cell_phone',16)->nullable();
            $table->string('fax',16)->nullable();
            $table->string('email',64)->nullable();
            $table->string('web',64)->nullable();
            $table->string('status',64)->nullable();
            $table->integer('created_by', false, 11)->nullable();
            $table->integer('updated_by', false, 11)->nullable();
            $table->timestamps();
            $table->engine = 'InnoDB';
        });




        Schema::create('inv_product_category', function(Blueprint $table) {
            $table->increments('id');
            $table->string('code', 8)->unique()->nullable();
            $table->string('title',32)->nullable();
            $table->text('description')->nullable();
            $table->integer('created_by', false, 11)->nullable();
            $table->integer('updated_by', false, 11)->nullable();
            $table->timestamps();
            $table->engine = 'InnoDB';
        });



        Schema::create('inv_product', function(Blueprint $table) {
            $table->increments('id');
            $table->string('code', 8)->unique()->nullable();
            $table->string('title',32)->nullable();
            $table->text('description')->nullable();
            $table->string('image', 32)->nullable();
            $table->enum('product_class', array(
                'service', 'product',
            ));
            $table->unsignedInteger('inv_product_category_id')->nullable();
            $table->float('cost_price');
            $table->decimal('purchase_unit')->nullable();
            $table->decimal('purchase_unit_quantity')->nullable();
            $table->decimal('stock_unit')->nullable();
            $table->decimal('stock_unit_quantity')->nullable();
            $table->enum('stock_type', array(
                'stock', 'non-stock'
            ));

            $table->integer('created_by', false, 11)->nullable();
            $table->integer('updated_by', false, 11)->nullable();
            $table->timestamps();
            $table->engine = 'InnoDB';
        });
        Schema::table('inv_product', function($table) {
            $table->foreign('inv_product_category_id')->references('id')->on('inv_product_category');
        });



        Schema::create('inv_transfer_head', function(Blueprint $table) {
            $table->increments('id');
            $table->string('transfer_number', 16)->unique()->nullable();
            $table->string('transfer_to', 16)->nullable();
            $table->dateTime('date')->nullable();
            $table->dateTime('confirm_date')->nullable();
            $table->text('note')->nullable();
            $table->enum('status', array(
                'open', 'close', 'pending-approval', 'approved', 'transferred',
            ));

            $table->integer('created_by', false, 11)->nullable();
            $table->integer('updated_by', false, 11)->nullable();
            $table->timestamps();
            $table->engine = 'InnoDB';
        });


        Schema::create('inv_transfer_detail', function(Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('inv_transfer_head_id')->nullable();
            $table->unsignedInteger('inv_product_id')->nullable();
            $table->unique(['inv_transfer_head_id', 'inv_product_id']);
            $table->decimal('unit')->nullable();
            $table->decimal('quantity')->nullable();
            $table->float('rate')->nullable();
            $table->integer('created_by', false, 11)->nullable();
            $table->integer('updated_by', false, 11)->nullable();
            $table->timestamps();
            $table->engine = 'InnoDB';
        });
        Schema::table('inv_transfer_detail', function($table) {
            $table->foreign('inv_transfer_head_id')->references('id')->on('inv_transfer_head');
            $table->foreign('inv_product_id')->references('id')->on('inv_product');
        });


        Schema::create('inv_requisition_head', function(Blueprint $table) {
            $table->increments('id');
            $table->string('requisition_no',16)->unique()->nullable();
            $table->unsignedInteger('inv_supplier_id')->nullable();
            $table->dateTime('date')->nullable();
            $table->text('note')->nullable();
            $table->enum('requisition_type', array(
                'distribution', 'purchase'
            ));
            $table->enum('status', array(
                'open', 'approved', 'close', 'cancel',  'PO Created'
            ));
            $table->integer('created_by', false, 11)->nullable();
            $table->integer('updated_by', false, 11)->nullable();
            $table->timestamps();
            $table->engine = 'InnoDB';
        });
        Schema::table('inv_requisition_head', function($table) {
            $table->foreign('inv_supplier_id')->references('id')->on('inv_supplier');
        });





        Schema::create('inv_requisition_detail', function(Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('inv_requisition_head_id')->nullable();
            $table->unsignedInteger('inv_product_id')->nullable();
            $table->unique(['inv_requisition_head_id', 'inv_product_id'], 'req_dt_unique');
            $table->float('rate')->nullable();
            $table->decimal('unit')->nullable();
            $table->decimal('quantity')->nullable();
            $table->integer('created_by', false, 11)->nullable();
            $table->integer('updated_by', false, 11)->nullable();
            $table->timestamps();
            $table->engine = 'InnoDB';
        });
        Schema::table('inv_requisition_detail', function($table) {
            $table->foreign('inv_requisition_head_id')->references('id')->on('inv_requisition_head');
            $table->foreign('inv_product_id')->references('id')->on('inv_product');
        });




        Schema::create('inv_purchase_order_head', function(Blueprint $table) {
            $table->increments('id');
            $table->string('purchase_no', 16)->unique()->nullable();
            $table->unsignedInteger('inv_requisition_head_id')->nullable();
            $table->unsignedInteger('inv_supplier_id')->nullable();
            $table->enum('pay_terms', array(
                'cash', 'cheque'
            ));
            $table->dateTime('delivery_date')->nullable();
            $table->decimal('tax')->nullable();
            $table->float('tax_amount')->nullable();
            $table->decimal('discount_rate')->nullable();
            $table->float('discount_amount')->nullable();
            $table->float('amount')->nullable();
            $table->enum('status', array(
                'open', 'approved', 'close', 'cancel', 'GRN Created'
            ));
            $table->integer('created_by', false, 11)->nullable();
            $table->integer('updated_by', false, 11)->nullable();
            $table->timestamps();
            $table->engine = 'InnoDB';
        });
        Schema::table('inv_purchase_order_head', function($table) {
            $table->foreign('inv_requisition_head_id')->references('id')->on('inv_requisition_head');
            $table->foreign('inv_supplier_id')->references('id')->on('inv_supplier');
        });


        Schema::create('inv_purchase_order_detail', function(Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('inv_po_head_id')->nullable();
            $table->unsignedInteger('inv_product_id')->nullable();
            $table->unique(['inv_po_head_id', 'inv_product_id']);
            $table->decimal('quantity')->nullable();
            $table->decimal('grn_quantity')->nullable();
            $table->decimal('tax_rate')->nullable();
            $table->float('tax_amount')->nullable();
            $table->decimal('unit')->nullable();
            $table->decimal('unit_quantity')->nullable();
            $table->float('purchase_rate')->nullable();
            $table->float('amount')->nullable();

            $table->integer('created_by', false, 11)->nullable();
            $table->integer('updated_by', false, 11)->nullable();
            $table->timestamps();
            $table->engine = 'InnoDB';
        });
        Schema::table('inv_purchase_order_detail', function($table) {
            $table->foreign('inv_po_head_id')->references('id')->on('inv_purchase_order_head');
            $table->foreign('inv_product_id')->references('id')->on('inv_product');
        });





        Schema::create('inv_grn_head', function(Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('inv_po_head_id')->nullable();
            $table->string('voucher_no', 16)->nullable();
            $table->dateTime('date')->nullable();
            $table->unsignedInteger('inv_supplier_id')->nullable();
            $table->unsignedInteger('inv_requisition_head_id')->nullable();
            $table->enum('pay_terms', array(
                'cash', 'cheque'
            ));
            $table->decimal('tax_rate')->nullable();
            $table->float('tax_amount')->nullable();
            $table->decimal('discount_rate')->nullable();
            $table->float('discount_amount')->nullable();
            $table->float('amount')->nullable();
            $table->float('net_amount')->nullable();
            $table->enum('status', array(
                'open', 'approved', 'close', 'cancel', 'GRN Confirmed'
            ));
            $table->integer('created_by', false, 11)->nullable();
            $table->integer('updated_by', false, 11)->nullable();
            $table->timestamps();
            $table->engine = 'InnoDB';
        });
        Schema::table('inv_grn_head', function($table) {
            $table->foreign('inv_po_head_id')->references('id')->on('inv_purchase_order_head');
            $table->foreign('inv_supplier_id')->references('id')->on('inv_supplier');
            $table->foreign('inv_requisition_head_id')->references('id')->on('inv_requisition_head');
        });




        Schema::create('inv_grn_detail', function(Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('inv_grn_head_id')->nullable();
            $table->unsignedInteger('inv_product_id')->nullable();
            $table->unique(['inv_grn_head_id', 'inv_product_id']);
            $table->string('batch_number')->nullable();
            $table->dateTime('expire_date')->nullable();
            $table->decimal('receive_quantity')->nullable();
            $table->float('cost_price')->nullable();
            $table->decimal('unit')->nullable();
            $table->decimal('unit_quantity')->nullable();
            $table->decimal('tax_rate')->nullable();
            $table->float('tax_amount')->nullable();
            $table->float('row_amount')->nullable();
            $table->integer('created_by', false, 11)->nullable();
            $table->integer('updated_by', false, 11)->nullable();
            $table->timestamps();
            $table->engine = 'InnoDB';
        });
        Schema::table('inv_grn_detail', function($table) {
            $table->foreign('inv_grn_head_id')->references('id')->on('inv_grn_head');
            $table->foreign('inv_product_id')->references('id')->on('inv_product');
        });




        Schema::create('inv_transaction', function(Blueprint $table) {
            $table->increments('id');
            $table->string('trn_number', 16)->nullable();
            $table->string('grn_number', 16)->nullable();
            $table->unique(['trn_number', 'grn_number']);
            $table->unsignedInteger('inv_product_id')->nullable();
            $table->string('store', 16)->nullable();
            $table->string('batch_number', 16)->nullable();
            $table->dateTime('date')->nullable();
            $table->dateTime('expire_date')->nullable();
            $table->string('unit', 16)->nullable();
            $table->integer('quantity', false, 11)->nullable();
            $table->float('rate')->nullable();
            $table->enum('sign', array(
                '1', '-1'
            ));
            $table->float('total_price')->nullable();
            $table->text('note')->nullable();
            $table->unsignedInteger('inv_supplier_id')->nullable();
            $table->unsignedInteger('currency_id')->nullable();
            $table->string('voucher_number', 16)->nullable();
            $table->decimal('receive_quantity')->nullable();
            $table->enum('status', array(
                'open', 'approved', 'close'
            ));

            $table->integer('created_by', false, 11)->nullable();
            $table->integer('updated_by', false, 11)->nullable();
            $table->timestamps();
            $table->engine = 'InnoDB';
        });
        Schema::table('inv_transaction', function($table) {
            $table->foreign('inv_product_id')->references('id')->on('inv_product');
            $table->foreign('inv_supplier_id')->references('id')->on('inv_supplier');
            $table->foreign('currency_id')->references('id')->on('currency');
        });



        Schema::create('inv_adjust_head', function(Blueprint $table) {
            $table->increments('id');
            $table->string('adjust_no', 16)->nullable();
            $table->dateTime('date')->nullable();
            $table->string('store', 16)->nullable();
            $table->enum('type', array(
                'positive', 'negative'
            ));
            $table->dateTime('confirm_date')->nullable();
            $table->unsignedInteger('currency_id')->nullable();
            $table->text('note')->nullable();
            $table->string('voucher_no', 16)->nullable();
            $table->enum('status', array(
                'open', 'approved', 'close',
            ));

            $table->integer('created_by', false, 11)->nullable();
            $table->integer('updated_by', false, 11)->nullable();
            $table->timestamps();
            $table->engine = 'InnoDB';
        });
        Schema::table('inv_adjust_head', function($table) {
            $table->foreign('currency_id')->references('id')->on('currency');
        });



        Schema::create('inv_trn_no_setup', function(Blueprint $table) {
            $table->increments('id');
            $table->string('code', 4)->nullable();
            $table->string('title', 32)->nullable();
            $table->integer('last_number', false, 10)->nullable();
            $table->integer('increment', false, 1)->nullable();
            $table->integer('created_by', false, 11)->nullable();
            $table->integer('updated_by', false, 11)->nullable();
            $table->timestamps();
            $table->engine = 'InnoDB';
        });

	}


	public function down()
	{
        Schema::drop('inv_supplier');

        Schema::drop('inv_product_category');
        Schema::drop('inv_product');
        Schema::drop('inv_transfer_head');
        Schema::drop('inv_transfer_detail');

        Schema::drop('inv_requisition_head');
        Schema::drop('inv_requisition_detail');

        Schema::drop('inv_purchase_order_head');
        Schema::drop('inv_purchase_order_detail');

        Schema::drop('inv_grn_head');
        Schema::drop('inv_grn_detail');
        Schema::drop('inv_transaction');

        Schema::drop('inv_adjust_head');
        Schema::drop('inv_adjust_detail');
	}

}
