<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInventory extends Migration {

	public function up()
	{
        Schema::create('inv_supplier', function(Blueprint $table) {
            $table->increments('id');
            $table->string('code', 8)->unique();
            $table->string('company_name',32);
            $table->text('address')->nullable();
            $table->unsignedInteger('country_id')->nullable();
            $table->decimal('zip_code', 5,0);
            $table->string('contact_person',32);
            $table->string('phone',16);
            $table->string('cell_phone',16);
            $table->string('fax',16);
            $table->string('email',64);
            $table->string('web',64);
            $table->string('status',64);
            $table->integer('created_by', false, 11);
            $table->integer('updated_by', false, 11);
            $table->timestamps();
            $table->engine = 'InnoDB';
        });




        Schema::create('inv_product_category', function(Blueprint $table) {
            $table->increments('id');
            $table->string('code', 8)->unique();
            $table->string('title',32);
            $table->text('description')->nullable();
            $table->integer('created_by', false, 11);
            $table->integer('updated_by', false, 11);
            $table->timestamps();
            $table->engine = 'InnoDB';
        });



        Schema::create('inv_product', function(Blueprint $table) {
            $table->increments('id');
            $table->string('code', 8)->unique();
            $table->string('title',32);
            $table->text('description')->nullable();
            $table->string('image', 32);
            $table->enum('product_class', array(
                'service', 'product',
            ));
            $table->unsignedInteger('inv_product_category_id')->nullable();
            $table->float('cost_price');
            $table->decimal('purchase_unit');
            $table->decimal('purchase_unit_quantity');
            $table->decimal('stock_unit');
            $table->decimal('stock_unit_quantity');
            $table->enum('stock_type', array(
                'stock', 'non-stock'
            ));

            $table->integer('created_by', false, 11);
            $table->integer('updated_by', false, 11);
            $table->timestamps();
            $table->engine = 'InnoDB';
        });
        Schema::table('inv_product', function($table) {
            $table->foreign('inv_product_category_id')->references('id')->on('inv_product_category');
        });



        Schema::create('inv_transfer_head', function(Blueprint $table) {
            $table->increments('id');
            $table->string('transfer_number', 16)->unique();
            $table->string('transfer_to', 16);
            $table->dateTime('date');
            $table->dateTime('confirm_date');
            $table->text('note');
            $table->enum('status', array(
                'open', 'close', 'pending-approval', 'approved', 'transferred'
            ));

            $table->integer('created_by', false, 11);
            $table->integer('updated_by', false, 11);
            $table->timestamps();
            $table->engine = 'InnoDB';
        });


        Schema::create('inv_transfer_detail', function(Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('inv_transfer_head_id')->nullable();
            $table->unsignedInteger('inv_product_id')->nullable();
            $table->unique(['inv_transfer_head_id', 'inv_product_id']);
            $table->decimal('unit');
            $table->decimal('quantity');
            $table->float('rate');
            $table->integer('created_by', false, 11);
            $table->integer('updated_by', false, 11);
            $table->timestamps();
            $table->engine = 'InnoDB';
        });
        Schema::table('inv_transfer_detail', function($table) {
            $table->foreign('inv_transfer_head_id')->references('id')->on('inv_transfer_head');
            $table->foreign('inv_product_id')->references('id')->on('inv_product');
        });


        Schema::create('inv_requisition_head', function(Blueprint $table) {
            $table->increments('id');
            $table->string('requisition_no',16)->unique();
            $table->unsignedInteger('inv_supplier_id')->nullable();
            $table->dateTime('date');
            $table->text('note');
            $table->enum('requisition_type', array(
                'distribution', 'purchase'
            ));
            $table->enum('status', array(
                'open', 'approved', 'close', 'cancel'
            ));
            $table->integer('created_by', false, 11);
            $table->integer('updated_by', false, 11);
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
            $table->unique(['inv_requisition_head_id', 'inv_product_id']);
            $table->float('rate');
            $table->decimal('unit');
            $table->decimal('quantity');
            $table->integer('created_by', false, 11);
            $table->integer('updated_by', false, 11);
            $table->timestamps();
            $table->engine = 'InnoDB';
        });
        Schema::table('inv_requisition_detail', function($table) {
            $table->foreign('inv_requisition_head_id')->references('id')->on('inv_requisition_head');
            $table->foreign('inv_product_id')->references('id')->on('inv_product');
        });




        Schema::create('inv_purchase_order_head', function(Blueprint $table) {
            $table->increments('id');
            $table->string('purchase_no', 16)->unique();
            $table->unsignedInteger('inv_requisition_head_id')->nullable();
            $table->unsignedInteger('inv_supplier_id')->nullable();
            $table->enum('pay_terms', array(
                'cash', 'cheque'
            ));
            $table->dateTime('delivery_date');
            $table->decimal('tax');
            $table->float('tax_amount');
            $table->decimal('discount_rate');
            $table->float('discount_amount');
            $table->float('amount');
            $table->enum('status', array(
                'open', 'approved', 'close', 'cancel'
            ));
            $table->integer('created_by', false, 11);
            $table->integer('updated_by', false, 11);
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
            $table->decimal('quantity');
            $table->decimal('grn_quantity');
            $table->decimal('tax_rate');
            $table->float('tax_amount');
            $table->decimal('unit');
            $table->decimal('unit_quantity');
            $table->float('purchase_rate');
            $table->float('amount');

            $table->integer('created_by', false, 11);
            $table->integer('updated_by', false, 11);
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
            $table->string('voucher_no', 16);
            $table->dateTime('date');
            $table->unsignedInteger('inv_supplier_id')->nullable();
            $table->unsignedInteger('inv_requisition_head_id')->nullable();
            $table->enum('pay_terms', array(
                'cash', 'cheque'
            ));
            $table->decimal('tax_rate');
            $table->float('tax_amount');
            $table->decimal('discount_rate');
            $table->float('discount_amount');
            $table->float('amount');
            $table->float('net_amount');
            $table->enum('status', array(
                'open', 'approved', 'close', 'cancel'
            ));
            $table->integer('created_by', false, 11);
            $table->integer('updated_by', false, 11);
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
            $table->string('batch_number');
            $table->dateTime('expire_date');
            $table->decimal('receive_quantity');
            $table->float('cost_price');
            $table->decimal('unit');
            $table->decimal('unit_quantity');
            $table->decimal('tax_rate');
            $table->float('tax_amount');
            $table->float('row_amount');
            $table->integer('created_by', false, 11);
            $table->integer('updated_by', false, 11);
            $table->timestamps();
            $table->engine = 'InnoDB';
        });
        Schema::table('inv_grn_detail', function($table) {
            $table->foreign('inv_grn_head_id')->references('id')->on('inv_grn_head');
            $table->foreign('inv_product_id')->references('id')->on('inv_product');
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



	}

}
