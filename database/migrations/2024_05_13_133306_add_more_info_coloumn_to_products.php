<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddMoreInfoColoumnToProducts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->unsignedbiginteger('tag_id')->nullable()->after('product_flavour_id');
            $table->foreign('tag_id')->references('id')->on('tags');
            $table->unsignedbiginteger('faq_id')->nullable()->after('tag_id');
            $table->foreign('faq_id')->references('id')->on('faqs');
            $table->unsignedbiginteger('review_id')->nullable()->after('faq_id');
            $table->foreign('review_id')->references('id')->on('reviews');
            $table->boolean('stock')->default(0)->after('review_id');
            $table->text('more_info')->nullable()->after('stock');
            $table->text('one_line_description')->nullable()->after('more_info');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            //
        });
    }
}
