<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->text("description")->nullable();
            /* $table->timestamps(); */
        });

        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->foreignId("category_id")->constrained("categories")->onDelete("cascade");
            $table->decimal("unit_price", 10, 2);
            $table->boolean("is_active")->default(true);
            /* $table->timestamps(); */
        });

        Schema::create('inventories', function (Blueprint $table) {
            $table->id();
            $table->foreignId("product_id")->constrained("products")->onDelete("cascade");
            $table->integer("stock_quantity")->default(0);
            /* $table->timestamps(); */
        });

        Schema::create("orders", function (Blueprint $table) {
            $table->id();
            // TODO: Add employee_id and customer_id foreign keys when those tables are created
            /* $table->foreignId("employee_id")->constrained("employees")->onDelete("cascade");
            $table->foreignId("customer_id")->constrained("customers")->onDelete("cascade"); */
            $table->dateTime("order_date");
            $table->decimal("total_amount", 10, 2);
            $table->string("payment_method");
            /* $table->timestamps(); */
        });

        Schema::create("order_details", function (Blueprint $table) {
            $table->id();
            $table->foreignId("order_id")->constrained("orders")->onDelete("cascade");
            $table->foreignId("product_id")->constrained("products")->onDelete("cascade");
            $table->integer("quantity");
            $table->decimal("unit_price", 10, 2);
            $table->decimal("total_price", 10, 2);
            /* $table->timestamps(); */
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
        Schema::dropIfExists('orders');
        Schema::dropIfExists('order_details');
        Schema::dropIfExists('inventories');
        Schema::dropIfExists('categories');
    }
};
