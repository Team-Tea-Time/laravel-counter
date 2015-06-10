<?php namespace TeamTeaTime\Counter\Events;

use App;
use Illuminate\Queue\SerializesModels;
use Illuminate\Session\Store;
use TeamTeaTime\Counter\Count;

class CounterWasIncremented
{

    use SerializesModels;

    public $session;
    public $modelName;
    public $modelID;
    public $count;

    /**
     * Create a new event instance.
     *
     * @param  Thread  $thread
     * @return void
     */
    public function __construct($modelName, $modelID, Count $count)
    {
        $this->session = App::make('Illuminate\Session\Store');
        $this->modelName = $modelName;
        $this->modelID = $modelID;
        $this->count = $count;
    }

}
