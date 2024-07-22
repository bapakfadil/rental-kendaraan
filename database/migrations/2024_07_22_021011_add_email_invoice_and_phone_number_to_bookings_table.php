<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddEmailInvoiceAndPhoneNumberToBookingsTable extends Migration
{
    public function up()
    {
        Schema::table('bookings', function (Blueprint $table) {
            $table->string('email_invoice')->after('total_price');
            $table->string('phone_number')->after('email_invoice');
        });
    }

    public function down()
    {
        Schema::table('bookings', function (Blueprint $table) {
            $table->dropColumn('email_invoice');
            $table->dropColumn('phone_number');
        });
    }
}
