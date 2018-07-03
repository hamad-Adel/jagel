<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HumanController extends Controller
{
    protected $height;
    protected $weight;
    protected $name;

    public function name($name)
    {
        $this->name = $name;
        return $this;
    }

    public function weight($weight)
    {
        $this->weight = $weight;
        return $this;
    }

    public function height($height)
    {
        $this->height = $height;
        return $this;
    }

    public function sayHello()
    {
        return 'hello im ' . $this->name . ' iam '. $this->height . ' cm '. ' and ' . $this->weight . 'kg';
    }


}
