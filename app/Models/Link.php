<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
    /** @use HasFactory<\Database\Factories\LinkFactory> */
    use HasFactory;



    public function user()
    {
        return $this->belongsTo(User::class);
    }


    public function moveDown(){
        $this->move(+1);

    }

    public function moveUp(){
        $this->move(-1);
    }


private function move($to)
{
    $order = $this->sort;
    $newOrder = $order + $to;



 $user = $this->user;

    $swapWith = $user->links()
                ->where('sort', '=', $newOrder)
                ->first();


    $this->fill(['sort' => $newOrder])->save();
    $swapWith->fill(['sort' => $order])->save();
}


}
