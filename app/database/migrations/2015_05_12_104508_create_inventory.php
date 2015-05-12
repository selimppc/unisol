<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInventory extends Migration {

	public function up()
	{
        Schema::create('inv_supplier', function(Blueprint $table) {
            $table->increments('id');
            $table->string('code', 8);
            $table->string('company_name',32);
            $table->text('address');
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
            $table->string('code', 8);
            $table->string('title',32);
            $table->text('description');
            $table->integer('created_by', false, 11);
            $table->integer('updated_by', false, 11);
            $table->timestamps();
            $table->engine = 'InnoDB';
        });



        Schema::create('inv_product', function(Blueprint $table) {
            $table->increments('id');
            $table->string('code', 8);
            $table->string('title',32);
            $table->text('description');
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
            $table->string('transfer_number', 16);
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
            $table->tinyInteger('answer',false, 1);
            $table->integer('created_by', false, 11);
            $table->integer('updated_by', false, 11);
            $table->timestamps();
            $table->engine = 'InnoDB';
        });
        Schema::table('inv_transfer_detail', function($table) {
            $table->foreign('inv_transfer_head_id')->references('id')->on('inv_transfer_head');
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
