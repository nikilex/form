<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class ShortCode extends Model
{

    public $table = 'short_code';

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    protected $fillable = [
        'url',
        'shortCode',
        'message',
        'created_at',
        'updated_at',
    ];

    public static function getUrl($shortCode){
        return self::where('shortCode', $shortCode)
            ->first();
    }

    public static function generateUrl(){ 
        do {
            $code = substr(md5(microtime() . rand(0, 9999)), 0, 6);
            $exist = self::where('shortCode', $code )->exists();
        } while ($exist);
        
        return $code;
    }

    public static function generateShortUrl($url,$requestUrl){
        $unique = self::generateUrl();
        self::create([
            'url' => $url,
            'shortCode' => $unique,
        ]);
        $domain = $requestUrl . '/'. $unique;
        return $domain;
    }
}
