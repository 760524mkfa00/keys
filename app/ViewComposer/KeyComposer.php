<?php

namespace Keys\ViewComposer;

use Illuminate\View\View;
use Keys\Models\Key;

class KeyComposer
{
    /**
     * The service code repository implementation.
     *
     * @var KeyRepository
     */
    protected $keys;

    /**
     * Create a new profile composer.
     *
     * @param  Key  $keys
     * @return void
     */
    public function __construct(Key $keys)
    {
        // Dependencies automatically resolved by service container...
        $this->keys = $keys;
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('keys', $this->keys->listKeys());
    }
}