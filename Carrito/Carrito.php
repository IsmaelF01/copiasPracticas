<?php 

class Carrito 
{
	private $carrito;

	public function __construct() {
		$this->carrito = array();
	}

	/* Añadir un producto al carrito */
	public function meter($producto) {
		$this->carrito[] = $producto;
	}

	/* Incrementar cantidad de una linea del carro */
	public function sumar($posicion,$cantidad=1) {
		$this->carrito[$posicion]->sumar($cantidad);
	}

	/* Decrementar cantidad de una linea del carro */
	public function restar($posicion,$cantidad=1) {
		$this->carrito[$posicion]->restar($cantidad);
	}

	/* Eliminar producto del carro */
	public function eliminar($posicion) {
		unset($this->carrito[$posicion]);
		//IMPORTANTE: si no reiniciamos los índices falla el borrar por posición
		$this->carrito = array_values($this->carrito);
	}

	/* Comprobar si un producto está ya en el carro. Si está devuelve su key */
	public function comprobar($nombre_producto) {
		foreach($this->carrito as $key => $miproducto) {
			if ($miproducto->getNombre() == $nombre_producto) {
				return $key;
			}
		}
		return -1;
	}

	/* Pintamos los productos del carrito */
	public function mostrar() {

		$total=0;
		$totalIVA=0;
		//Pintamos uno a uno los productos del carro
		echo "<table class='table'>";
		echo "<tr><th>Cantidad</th><th>Nombre</th><th>Precio</th><th>Precio IVA</th><th>Borrar</th></tr>";
		$posicion=0;
		foreach($this->carrito as $producto) {
			echo $producto->mostrar($posicion);
			$posicion++;

			$total+=($producto->precio()*$producto->getCantidad());
			$totalIVA+=($producto->precioIVA()*$producto->getCantidad());
		}
		echo "</table>";	
		echo "<h4>Total = $total&euro; &nbsp;&nbsp; $totalIVA&euro;(IVA)</h4>";

	}




}



 ?>