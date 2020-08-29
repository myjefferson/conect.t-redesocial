<?php
class LoginCli
{
	public function selectUsuario()
	{
		"SELECT * FROM id, nome, foto FROM cliente WHERE email = '$email' AND senha = '$senha'";

		$this->MySql->ExecSql($query);
	}
}
?>