<?php
namespace App\Observers;
use App\Notifications\NewItem;
use App\Device;
class ItemObserver
{
    public function created(Device $item)
    {
        notify(new NewItem($item));

    }
}
