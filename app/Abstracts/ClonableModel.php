<?php


namespace App\Abstracts;


use Bkwld\Cloner\Cloneable;

abstract class ClonableModel extends Model
{
    use Cloneable;
}
