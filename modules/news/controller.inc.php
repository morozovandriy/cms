<?php
class News_Controller
{
    public function EditAction($params)
    {
        return array(
            "PageTitle" => "Сторінка редагування новини",
            "PageHeaderTitle" => "Сторінка редагування новини",
            "Content" => "Контент"
        );
    }
    public function AddAction()
    {
        $view = new News_View();
        $model = new News_Model();
        if ($_SERVER['REQUEST_METHOD'] == "POST")
        {
            $row = $_POST;
            $model->Insert($row);
        }
        return array(
            "PageTitle" => "Сторінка додавання новини",
            "PageHeaderTitle" => "Сторінка додавання новини",
            "Content" => $view->Add()
        );
    }
}