<?php

class Category
{
	# prywatne wartości klasy
	private $id;
	private $parent;
	private $category_name;

	# do sprawdzenia czy zostały wprowadzone zmiany w obiekcie
	private $hash;

	public function __construct() # o tutaj sprawdzenie
	{
		$this->hash = $this->getHash();
	}

	function add() # funkcja korzystająca z zapytania SQL dodającego wartości do tabeli categories
	{
		return 'INSERT INTO categories (category_name, parent) VALUES (\'' .$this->category_name. '\',' .$this->parent. ')';
	}

	function edit() # funkcja korzystająca z zapytania SQL edytującego wartości z tabeli categories
	{
		return 'UPDATE categories SET category_name=\'' .$this->category_name. '\', parent=' .$this->parent. ' WHERE id=' .$this->id;
	}

	function delete() # funkcja korzystająca z zapytania SQL usuwającego wartości z tabeli categories
	{
		return 'DELETE FROM categories WHERE id=' .$this->id;
	}

	# Gettery i Settery

	/**
	 * @return mixed
	 */
	public function getId()
	{
		return $this->id;
	}

	/**
	 * @param mixed $id
	 */
	public function setId($id)
	{
		$this->id = $id;
	}

	/**
	 * @return mixed
	 */
	public function getParent()
	{
		return $this->parent;
	}

	/**
	 * @param mixed $parent
	 */
	public function setParent($parent)
	{
		$this->parent = $parent;
	}

	/**
	 * @return mixed
	 */
	public function getCategoryName()
	{
		return $this->category_name;
	}

	/**
	 * @param mixed $category_name
	 */
	public function setCategoryName($category_name)
	{
		$this->category_name = $category_name;
	}

	private function getHash()
	{
		$sum = (string)$this->id . (string)$this->parent . $this->category_name;
		return hash("sha512", $sum);
	}

	# Sprawdza czy zostały zrobione zmiany w obiekcie po utworzeniu
	public function changed(){
		if(empty($this->id)){
			return false; # brak w bazie
		} else {
			if($this->hash !== $this->getHash()){
				return true;
			}
			return false;
		}
	}

}