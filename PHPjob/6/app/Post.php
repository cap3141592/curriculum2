<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    //
    protected $guarded = array('id');

    public static $rules = array(
        'body' => ['required','string','max:255'],
    );
    // いまどうしてる？が「空欄の場合」と「255文字を超える場合」は、つぶやけない。

    // 論理削除
    use SoftDeletes;
}
