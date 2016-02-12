<?php
    class Contact {
        private $name;
        private $phone;
        private $address;

      //setters;
      public function setName($new_name) {
        $this->name = $new_name;
      }
      public function setPhone($new_phone) {
        $this->phone = $new_phone;
      }
      public function setAddress($new_address) {
        $this->address = $new_address;
      }

      //getters;
      public function getName() {
        return $this->name;
      }
      public function getPhone() {
        return $this->phone;
      }
      public function getAddress() {
        return $this->address;
      }

      public function __construct($new_name, $new_phone, $new_address) {
        $this->name = $new_name;
        $this->phone = $new_phone;
        $this->address = $new_address;
      }

      static function deleteAll() {
        $_SESSION['all_contacts'];
      }

      function save() {
        array_push($_SESSION['all_contacts'], $this);
      }

      static function getAll() {
        return $_SESSION['all_contacts'];
      }
  }

 ?>
