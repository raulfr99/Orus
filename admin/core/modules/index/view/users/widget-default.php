<div class="row">
	<div class="col-md-12">
	<a href="index.php?view=newuser" class="btn btn-default pull-right"><i class='glyphicon glyphicon-user'></i> Nuevo Usuario</a>
		<h1>Lista de Usuarios</h1>
<br>
		<?php
		/*
		$u = new UserData();
		print_r($u);
		$u->name = "Roque";
		$u->apellido = "Alberto";
		$u->email = "elotrebla@gmail.com";
		$u->password = sha1(md5("l00lapal00za"));
		$u->add();


		$f = $u->createForm();
		print_r($f);
		echo $f->label("name")." ".$f->render("name");
		*/
		?>
		<?php

		$usuarios = UserData::getAll();
		if(count($usuarios)>0){
			// si hay usuarios
			?>
			<table class="table table-bordered table-hover">
			<thead>
			<th>Nombre completo</th>
			<th>Usuario</th>
			<th>Email</th>
			<th>Activo</th>
			<th>Admin</th>
			<th></th>
			</thead>
			<?php
			foreach($usuarios as $usuario){
				?>
				<tr>
				<td><?php echo $usuario->nombre." ".$usuario->apellido; ?></td>
				<td><?php echo $usuario->usuario; ?></td>
				<td><?php echo $usuario->correo; ?></td>
				<td>
					<?php if($usuario->is_activo):?>
						<i class="glyphicon glyphicon-ok"></i>
					<?php endif; ?>
				</td>
				<td>
					<?php if($usuario->is_admin):?>
						<i class="glyphicon glyphicon-ok"></i>
					<?php endif; ?>
				</td>
				<td style="width:120px;">
				<a href="index.php?view=edituser&id=<?php echo $user->id;?>" class="btn btn-warning btn-xs">Editar</a>
				<a href="index.php?action=deluser&id=<?php echo $user->id;?>" class="btn btn-danger btn-xs">Eliminar</a></td>
				</td>
				</tr>
				<?php

			}
			?>
			</table>
			<?php
		}else{
			// no hay usuarios
		}


		?>


	</div>
</div>
