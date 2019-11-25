<?php

/* Cada línea del carro de la compra */
class LineaProducto 
{
	private $nombre;
	private $precio;
	private $iva;
	private $cantidad;

	public function __construct($nombre,$precio,$iva=1.21) {
		$this->nombre = $nombre;
		$this->precio = $precio;
		$this->iva = $iva;
		$this->cantidad = 1;
	}

	//Pinta la línea del carro
	public function mostrar($posicion) {
		echo "<tr><td><a href='controlador.php?plus={$posicion}'>+&nbsp;</a>";
		echo "{$this->cantidad}";
		echo "<a href='controlador.php?minus={$posicion}'>&nbsp;-</a></td><td>";
		echo "{$this->nombre}</td><td>{$this->precio}&euro;</td><td>{$this->precioIVA()}&euro;</td><td><a href='controlador.php?delete={$posicion}'><i class='material-icons'>delete</i></a></td></tr>";
	}

	//Devuelve el precio
	public function precio() {
		return $this->precio;
	}

	//Devuelve el precio con el IVA
	public function precioIVA() {
		return ($this->precio * $this->iva);
	}

	//Añadir una unidad de este producto al carro
	public function sumar($cantidad=1) {
		$this->cantidad+=$cantidad;
	}

	//Añadir una unidad de este producto al carro
	public function restar($cantidad=1) {
		if ($this->cantidad > 1)
			$this->cantidad-=$cantidad;
	}

	//Devuelve el nombre del artículo
	public function getNombre() {
		return $this->nombre;
	}

	//Devuelve la cantidad de este artículo
	public function getCantidad() {
		return $this->cantidad;
	}

}


?>