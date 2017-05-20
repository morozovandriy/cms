<?php
  class Template
  {
      protected $TemplateFileName;
      protected $Params;
      public function __construct($templateFileName)
      {
          $this->Params = [];
          $this->TemplateFileName = $templateFileName;
      }
      public function SetParam($name, $value)
      {
          $this->Params[$name] = $value;
      }
      public function SetParams($array)
      {
          $this->Params = array_merge($this->Params, $array);
      }
      public function GetParam($name)
      {
          return $this->Params[$name];
      }
      public function GetHTML()
      {
          ob_start();
          extract($this->Params);
          include($this->TemplateFileName);
          $str = ob_get_contents();
          ob_end_clean();
          return $str;
      }
      public function Display()
      {
          echo $this->GetHTML();
      }
  }