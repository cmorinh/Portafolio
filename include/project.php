<?php 
    class Project
    {
        private $id;
        private $name;
        private $description;
        private $image;
        private $skills;
        private $git;
        private $web;

        function __construct($id, $name, $description, $image, $skills, $git, $web)
        {
            $this->id = $id;
            $this->name = $name;
            $this->description = $description;
            $this->image = $image;
            $this->skills = $skills;
            $this->git = $git;
            $this->web = $web;    
        }

        function GetId()
        {
            return $this->id;
        }

        function GetName()
        {
            return $this->name;
        }

        function GetDescription()
        {
            return $this->description;
        }

        function GetImage()
        {
            return $this->image;
        }

        function SetImage($image)
        {
            $this->image = $image;
        }

        function GetSkills()
        {
            return $this->skills;
        }

        function GetGit()
        {
            return $this->git;
        }

        function GetWeb()
        {
            return $this->web;
        }

        function Clear()
        {
            $this->id = "0";
            $this->name = "";
            $this->description = "";
            $this->skills = "";
            $this->git = "";
            $this->web = ""; 
        }
    }
?>