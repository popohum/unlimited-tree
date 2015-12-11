<?php namespace Popohum\UnlimitedTree;
/**
 * Created by PhpStorm.
 * User: bob
 * Date: 2015/12/11
 * Time: 13:34
 */
class Tree
{
    public function __construct($array)
    {
        $tree = new Builder($array);
        $this->printer($tree);
    }

    public function printer($tree)
    {
        $res = "<ul>";
        foreach ($tree as $v) {
            if ($this->checkChild($v)) {
                $res .= "<li>";
                $res .= '<span> <i class="fa fa-folder-open"> </i> 节点 </span><a id="' . $v["id"] . '"> ' . $v["cName"] . '</a>';
                $res .= $this->printer($v['child']);
                $res .= "</li>";
            } else {
                $res .= "<li>";
                $res .= '<span> <i class="fa fa-folder-open"> </i> 节点 </span><a id="' . $v["id"] . '"> ' . $v["cName"] . '</a>';
                $res .= "</li>";
            }
        }
        $res .= "</ul>";
        return $res;
    }

    public function checkChild($array)
    {
        if (array_key_exists("child", $array)) {
            return true;
        } else {
            return false;
        }
    }

}