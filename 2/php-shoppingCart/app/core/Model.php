<?php

class Model {

    private $database;

    // --------------------------------------------------------

    public function __construct() {

        $this->database = new MySqlDatabase();
    }

    // --------------------------------------------------------

    protected function insertInto($query) {

        $result = $this->database->insertInto($query);

        return $result;
    }

    // --------------------------------------------------------

    protected function deleteFrom($query) {

        $result = $this->database->deleteFrom($query);

        return $result;
    }

    // --------------------------------------------------------

    protected function fieldExistsInDB($query) {

        $result = $this->database->fieldExistsInDB($query);

        return $result;
    }

    // --------------------------------------------------------

    public function selectFieldValueWhereParams($query) {

        $result = $this->database->selectFieldValueWhereParams($query);

        return $result;
    }

    // --------------------------------------------------------

    public function selectMultipleRowsFetchAssoc($query) {

        $result = $this->database->selectMultipleRowsFetchAssoc($query);

        return $result;
    }

    // --------------------------------------------------------

    protected function sanitize($string) {

        $sanitized = $this->database->sanitize($string);

        return $sanitized;
    }

    // --------------------------------------------------------

    protected function arraySanitize($array) {

        $sanitized = $this->database->arraySanitize($array);

        return $sanitized;
    }

}
