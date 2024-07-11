<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'vehicle_id', 'start_date', 'end_date', 'status', 'payment_proof',
        'full_name', 'nik', 'address', 'ktp_image', 'total_price', 'invoice_number'
    ];

    public static function boot()
    {
        parent::boot();

        static::created(function ($model) {
            $model->invoice_number = self::generateInvoiceNumber($model);
            $model->save();
        });
    }

    public static function generateInvoiceNumber($model)
    {
        $year = date('y'); // Last two digits of the year
        $month = strtoupper(date('m')); // Month in uppercase Roman numerals
        $id = $model->id;
        return 'INV/' . $year . '/' . $month . '/' . $id;
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class);
    }
}
