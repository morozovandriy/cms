<?php
class News_Model
{
    public function DeleteById($id)
    {
        Core::$Db->DeleteById('news', 'news_id', $id);
    }
    public function Insert($row)
    {
        Core::$Db->Insert('news', $row);
    }
}