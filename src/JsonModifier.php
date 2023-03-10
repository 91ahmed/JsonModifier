<?php
	
	namespace Json;

	/**
	 *	PHP class for modifying JSON files.
	 *
	 *	@author (ahmed hassan)
	 *	@link https://91ahmed.github.com
	 */
	class JsonModifier
	{
		private $file;
		private $filePath;
		private $data;
		private $index;

		public function __construct ($file)
		{
			$file = str_replace(['/', '\\'], DIRECTORY_SEPARATOR, $file);

			$this->file = file_get_contents($file);
			$this->filePath = $file;
		}

		public function index ($index = null)
		{
			$json = $this->file;
			$json = json_decode($json, true);
			$data = (array) $json;

			$this->index = $index;

			if (isset($data[0][$this->index])) {
				$this->data = $data[0][$this->index];
			} else {
				$this->data = $data;
			}

			// Remove empty elements from array
			$this->data = array_filter($this->data);

			return $this;
		}

		public function count ()
		{
			return count($this->data);
		}

		public function search (array $search)
		{
			$data = [];

			foreach ($this->data as $key => $value) 
			{	
				if ($value[array_keys($search)[0]] == array_values($search)[0])
				{
					$data[] = $value;
				}
			}

			$this->data = $data;

			return $this;
		}

		public function add ($data)
		{
			array_push($this->data, $data);
			$json = array(array($this->index => $this->data));
			$jsonData = json_encode($json, JSON_UNESCAPED_UNICODE);
			file_put_contents($this->filePath, $jsonData);
		}

		public function update ($condition, $newUpdate)
		{
			$update = array();

			foreach ($this->data as $key => $value) 
			{
				if($value[$condition[0]] == $condition[1]) 
				{
					foreach ($newUpdate as $newkey => $newvalue) 
					{
						$value[array_keys($newvalue)[0]] = array_values($newvalue)[0];
					}
				}

				$update[] = $value;
			}

			$data = array([$this->index => $update]);
			
			$jsonData = json_encode($data, JSON_UNESCAPED_UNICODE);
			file_put_contents($this->filePath, $jsonData);
		}

		public function delete ($condition)
		{
			$delete = array();

			foreach ($this->data as $key => $value) 
			{
				if($value[$condition[0]] == $condition[1]) {
					$value = null;
				}

				$delete[] = $value;
			}

			$data = array([$this->index => $delete]);

			$jsonData = json_encode($data, JSON_UNESCAPED_UNICODE);
			file_put_contents($this->filePath, $jsonData);
		}

		public function get ()
		{
			return $this->data;
		}

		public function first ($index = 0)
		{
			return $this->data[$index];
		}
	}
?>