<?php

class BatchCourseHelper {

    private $items;

    public function __construct($items) {
        $this->items = $items;
    }

    public function htmlList() {
        return $this->htmlFromArray($this->itemArray());
    }

    private function itemArray() {
        $result = array();
        foreach($this->items as $item) {
            if ($item->year_id == 0) {
                $result[$item->semester_id] = $this->itemWithChildren($item);
            }
        }
        return $result;
    }

    private function childrenOf($item) {
        $result = array();
        foreach($this->items as $i) {
            if ($i->year_id == $item->year_id) {
                $result[] = $i;
            }
        }
        return $result;
    }

    private function itemWithChildren($item) {
        $result = array();
        $children = $this->childrenOf($item);
        foreach ($children as $child) {
            $result[$child->semester_id] = $this->itemWithChildren($child);
        }
        return $result;
    }

    private function htmlFromArray($array) {
        $html = '';
        foreach($array as $k=>$v) {
            $html .= "<ul>";
            $html .= "<li>".$k."</li>";
            if(count($v) > 0) {
                $html .= $this->htmlFromArray($v);
            }
            $html .= "</ul>";
        }
        return $html;
    }
}