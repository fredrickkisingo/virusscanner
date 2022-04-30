<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VirusTotalReport extends Model
{
    protected $table ='virus_total_reports';

    protected $guarded=['id'];

    protected $casts = [
        'scans_clean_mx' => 'array',
        'scans_malwarepatrol'=>'array'
    ];
}
