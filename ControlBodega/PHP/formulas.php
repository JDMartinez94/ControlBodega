<?php

function menu($acceso){
	switch ($acceso) {
		case '1':
            echo "
        <div id='opcion'>
        <a href='prestamo.php'>
            <img
                src='media/prestamo.png'
                alt='prestamo'
                width='70px'
                height='70px'
                id='prestamo'/>
        </a>
		</div>
		<div id='opcion'>
		<a href='devolucion.php'>
			<img
				src='media/devolucion.png'
				alt='devolucion'
				width='70px'
				height='70px'/>
		</a>
		</div>
		<div id='opcion'>
		<a href='reportes.php'>
			<img
				src='media/reportes.png'
				alt='reportes'
				width='70px'
				height='70px'/>
		</a>
		</div>
		<div id='opcion'>
		<a href='personal.php'>
			<img
				src='media/nuevopers.png'
				alt='nuevopers'
				width='70px'
				height='70px'/>
		</a>					
		</div>
		<div id='opcion'>
		<a href='nuevasHerr.php'>
			<img
				src='media/nuevaherr.png'
				alt='nuevaherr'
				width='70px'
				height='70px'/>
		</a>
		</div>
		<div id='opcion'>
		<a href='herrDanadas.php'>
			<img
				src='media/herrdanada.png'
				alt='herrdanada'
				width='70px'
				height='70px'/>
		</a>
		</div>";
			break;

		case '2':
			echo "<div id='opcion'>				
			<img
				src='media/prestamo.png'
				alt='prestamo'
				width='70px'
				height='70px'
				id='prestamo'/>
		</div>
		<div id='opcion'>
		<a href='devolucion.php'>
			<img
				src='media/devolucion.png'
				alt='devolucion'
				width='70px'
				height='70px'/>
		</a>
		</div>
	
		<div id='opcion'>
		<a href='nuevasHerr.php'>
			<img
				src='media/nuevaherr.png'
				alt='nuevaherr'
				width='70px'
				height='70px'/>
		</a>
		</div>
		<div id='opcion'>
		<a href='herrDanadas.php'>
			<img
				src='media/herrdanada.png'
				alt='herrdanada'
				width='70px'
				height='70px'/>
		</a>
		</div>";
		break;		

		default:
			echo "Sesion terminada";
			break;
	}
}

?>