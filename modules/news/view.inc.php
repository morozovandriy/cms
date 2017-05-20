<?php
class News_View
{
    public function Add()
    {
        $tpl = new Template('template/news/add.tpl');
        return $tpl->GetHTML();
    }
}