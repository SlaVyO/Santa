<?php

$santa = new Santa;

#### разные случайные подарки из списка
echo $santa->gift()->name . '<br>';
echo $santa->gift()->name . '<br>';
echo $santa->gift()->name . '<br>';
echo $santa->gift()->name . '<br>';


/*
for ($i = 1; $i <= 10; $i++) {
    echo $santa->gift()->name . '<br>';
}
*/

#### Санта Класс

class Santa
{
    public function __call($method, $args)
    {
        //var_dump($method);
        if ($method === 'gift') {
            return new Gift;
        }else {
            throw new Exception('Undefined method "' . $method . '"');
        }
    }
}


#### класс подарков
 
class Gift
{
    protected $name = '';

    protected static $list = [
        'ball', 'iPhone', 'chocolate', 'XBox',
        'camera', 'pie',
    ];

    public function __construct()
    {
        $this->generateRandom();
    }

    public function __get($property)
    {
        if ($property === 'name') {
            return $this->name;
        }
    }

    protected function generateRandom()
    {
        $this->name = self::$list[rand(0, count(self::$list) - 1)];
    }
}
