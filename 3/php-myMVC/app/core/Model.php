<?php

class Model{
	
	protected function insertInto($query){

		$repository = new MySqlRepository();

		$result = $repository->insertInto($query);

		return $result;
	}

	// --------------------------------------------------------

	protected function fieldExistsInDB($query){

		$repository = new MySqlRepository();

		$result = $repository->fieldExistsInDB($query);

		return $result;
	}

	// --------------------------------------------------------

	public function selectFieldValueWhereParams($query){

		$repository = new MySqlRepository();

		$result = $repository->selectFieldValueWhereParams($query);

		return $result;
	}

    // --------------------------------------------------------

    protected function sanitize($string){

        $repository = new MySqlRepository();

        $sanitized = $repository->sanitize($string);

        return $sanitized;
    }

    // --------------------------------------------------------

    protected function arraySanitize($array){

        $repository = new MySqlRepository();

        $sanitized = $repository->arraySanitize($array);

        return $sanitized;
    }
}