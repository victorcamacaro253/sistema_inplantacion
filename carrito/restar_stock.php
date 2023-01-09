<?php
session_start();
$conexion=new mysqli('localhost','root','','implantacion');
$id_usuario=$_SESSION['id'];



foreach ($_SESSION['cart'] as $key => $value) {
	$cantidad=$value['item_quantity'];
	$id=$value['id_producto'];
	$precio=$value['precio'];
	$Precio_dolares=$value['Precio_dolares'];
	$Nombre_producto=$value['nombre_producto'];


	$sql="UPDATE producto SET cantidad_total=cantidad_total-'$cantidad' where Id_producto='$id'";
	$query=$conexion->query($sql);


	if ($query){


     $sql1="INSERT INTO ventas(Id_producto,Nombre_producto,cantidad,Precio,Precio_dolares,Id_usuario) VALUES ('$id','$Nombre_producto','$cantidad','$precio','$Precio_dolares','$id_usuario')";
		$query1=$conexion->prepare($sql1);
		$query1->execute();
		
		
        if ($query1){
        	

        	echo "<script>alert('Compra exitosa')

        	    window.location.href='cart.php'</script>";

        	    unset($_SESSION['cart']);
        }else{
        	echo "ha dado error";
        }
   

	}else{
		echo "nos ha dado error";
	}



   
		


}








?>