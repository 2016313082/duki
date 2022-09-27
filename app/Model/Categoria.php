<?php
class Categoria extends AppModel {
	var $name = 'Categoria';
	//public $virtualFields = array('nombre_compuesto'=>'CONCAT(Producto.iniciales,"-",Producto.nombre)');
	public $hasAndBelongsToMany = array(
	    'Productos'=>array(
	        'className' => 'Producto',
	        'joinTable' => 'productos_categorias',
	        'foreignKey' => 'categoria_id',
	        'associationForeignKey' => 'producto_id',
	        'unique' => true,
	        'conditions' => array(
				'Productos.activo = 1',
				'Productos.inventario >= 0.5', 
				'Productos.unidad_principal IS NOT NULL',
				'Productos.precio_venta > 0',
				'Productos.conversion > 0 group by Productos.id'
				//'Productos.inventario > Productos.stock_minimo'
			),
	        'fields' => '',
	        'order' => 'Productos.nombre ASC',
	        'limit' => '',
	        'offset' => '',
	        'finderQuery' => '',
	        'with' => 'productos_categorias'
	    ),
	);

	public $hasMany = array(
		'Subcategorias'=>array(
			'className' => 'Subcategoria',
	        'joinTable' => 'productos_categorias',
	        'foreignKey' => 'id_categoria',
	        'associationForeignKey' => 'subcategoria_id'
		)
	);
}
?>