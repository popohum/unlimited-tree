<?php namespace Popohum\UnlimitedTree;
/**
 * Created by PhpStorm.
 * User: bob
 * Date: 2015/12/11
 * Time: 13:34
 */
class Tree
{
    protected $tree=array();
    public function __construct($array)
    {
        $res = new Builder($array);
        $this->tree=$this->printer($res->leaf());
    }

    public function printer($tree)
    {
        $res = "<ul>";
        foreach ($tree as $v) {
            if ($this->checkChild($v)) {
                $res .= "<li>";
                $res .= '<span> <i class="fa fa-folder-open"> </i> 节点 </span><a id="' . $v["id"] . '"> ' . $v["title"] . '</a>';
                $res .= $this->printer($v['child']);
                $res .= "</li>";
            } else {
                $res .= "<li>";
                $res .= '<span> <i class="fa fa-folder-close"> </i> 节点 </span><a id="' . $v["id"] . '"> ' . $v["title"] . '</a>';
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

    public function getTree()
    {
        return $this->tree;
    }

}