<?php
session_start();
  if($_SESSION['statusLogin'] == 0)
     header('location:index.php');
      else
        $saudacao=$_SESSION['msg'];
?>
<html>
  <head>
  	<meta charset="UTF-8">	
    <title>Administração da Loja</title>
    <link rel="stylesheet" type="text/css" href="css/administra.css"></link>
    <link rel="stylesheet" type="text/css" href="css/tabs.css"></link>
    <script type="text/javascript" src="js/administra.js"></script>
  </head>
<body>
<center>
<table border="1" width="869px" cellspacing="0" cellpadding="0">
    <tr>
      <td id="include" width="33%" height="19">
        <p align="center">
            <b>Incluir no Banco de Dados (Mysql)</b>
        </p>  
      </td>
    </tr>
    <tr>
        <td>
					<div class="tabs">
					   <div class="tab">
					       <input type="radio" id="tab1" name="tab-group-1" checked>
					       	<label for="tab1">Materiais</label>
					      
					       <div class="content">
					        	<form method="post" action="include_materiais.php">
					        	 <center>
					        	 		<?php
					        			 include "conecta_mysql.php";
					        			 $resultado = mysql_query("SELECT cod_material 
					        			 						   from materiais
					        			 						   order by cod_material desc limit 1");
					        			 $reg = mysql_fetch_row($resultado);
					        			 mysql_close($conexao);
					        			?>
					        			<p>
					        			Código do material:
					        				<input type="text" name="codigo" size="5"/>
					        				<?php echo "<b>$reg[0] encontrados.</b>";?>
										</p>
										<p>
											Cód. linha material:
										<?php

										include "conecta_mysql.php";
									 
										$resultado = mysql_query("SELECT cod_linha_material, 
														dsc_linha_material 
												FROM linhas_materiais 
												ORDER BY cod_linha_material");
										$linhas = mysql_num_rows($resultado);
										if($linhas>0){
											$print ="<select name='linha'>";
											for($i=0; $i<$linhas; $i++){
												$reg = mysql_fetch_row($resultado);
												$print.="		<option value='$reg[0]'>$reg[0]-$reg[1]</option>"; 
											   
											    }			 
												$print.="	</select>";
											   	echo $print;
										}else{	
										mysql_close($conexao);
										}							
									   ?>
										Cód. unidade material: 
										<?php

										include "conecta_mysql.php";
									 
										$resultado = mysql_query("SELECT cod_unidade_medida, 
														dsc_unidade_medida 
												FROM unidades_medidas 
												ORDER BY cod_unidade_medida");
										$linhas = mysql_num_rows($resultado);
										if($linhas>0){
											$print ="<select name='unidade'>";
											for($i=0; $i<$linhas; $i++){
												$reg = mysql_fetch_row($resultado);
												$print.="		<option value='$reg[0]'>$reg[0]-$reg[1]</option>"; 
											   
											    }			 
												$print.="	</select>";
											   	echo $print;
										}else{	
										mysql_close($conexao);
										}							
									   ?>
										</p>
										<p>
										Status do material:
											<select name="status">
											<option value="A"><b>Ativo</b></option>
											<option value="I"><b>Inativo</b></option>
											</select>
										Descrição do material:
											 <input type="text" name="descricao" />
										</p>
										<?php

										include "conecta_mysql.php";
									 
										$resultado = mysql_query("SELECT m.cod_material , 
																		m.dsc_material, 
																		l.dsc_linha_material, 
																		u.dsc_unidade_medida, 
																		m.sta_material 
																FROM 	materiais m,
																		linhas_materiais l,
																		unidades_medidas u
																WHERE 	m.cod_linha_material = l.cod_linha_material
																AND 	m.cod_unidade_medida = u.cod_unidade_medida

															  order by m.cod_material desc limit 2");		
										$linhas = mysql_num_rows ($resultado);
										if($linhas == 0){
											echo "Nenhum resgistro encontrado!";
										}
										else{
										echo "<b>Tabela com os últimos 2 produtos da loja</b>";
										$tab="<table border='1' cellspacing='0' cellpadding='0'>";
										$tab.="<tr>";
											$tab.= "<td>Codigo</td>";
											$tab.= "<td>Nome</td>";
											$tab.= "<td>Linha do Material</td>";
											$tab.= "<td>Unidade de Material</td>";
											$tab.= "<td>Status</td>";
										$tab.= "</tr>";
											for ($i=0 ; $i<$linhas ; $i++)
											{
												$reg = mysql_fetch_row($resultado);  
												
												$tab.=	"<tr>";
												$tab.=		"<td width='150px'> $reg[0]</td>";
												$tab.=		"<td width='150px'> $reg[1]</td>";
											    $tab.=		"<td width='150px'> $reg[2]</td>";
									            $tab.=		"<td width='150px'> $reg[3]</td>";
									            $tab.=		"<td width='150px'> $reg[4]</td>";
												$tab.=	"</tr>" ;			
											}
										}
										$tab.="</table>";
										echo $tab;
									   ?>
					       				<p>
						 				 <input type="submit" name="incluir" value="Incluir Produto" >
						  				<input type="submit" name="atualizar" value="Atualizar Produto">
									</p>
									</center>
								 </form>
					       </div> 
					   </div>

					   <div class="tab">
					       <input type="radio" id="tab-2" name="tab-group-1">
					       <label for="tab-2">Linhas Materiais</label>
					     
					       <div class="content">
					         <form method="post" action="include_linhas.php">
					        	 <center>
					        	 		<?php
					        			 include "conecta_mysql.php";
					        			 $resultado = mysql_query("SELECT cod_linha_material 
					        			 						   from linhas_materiais
					        			 						   order by cod_linha_material desc limit 1");
					        			 $reg = mysql_fetch_row($resultado);
					        			 mysql_close($conexao);
					        			?>
					        			<p>
					        			Cód. linha material::
					        				<input type="text" name="codigo" size="5"/>
					        				<?php echo "<b>$reg[0] encontrados.</b>";?>
										</p>
										<p>
											Desc. linha material:
											<input type="text" name="descricao" />
									   </p>
									   	<?php

										include "conecta_mysql.php";
									 
										$resultado = mysql_query("SELECT cod_linha_material, 
														dsc_linha_material 
												FROM linhas_materiais
												ORDER BY cod_linha_material");
										$linhas = mysql_num_rows($resultado);
										if($linhas>0){
											$print =	"<table border='1' cellspacing='0' cellpadding='0'>".
															"<tr>".
															"<td>Código</td>".
															"<td>Descrição</td>".
															"</tr>";
											for($i=0; $i<$linhas; $i++){
												$reg = mysql_fetch_row($resultado);
											     $print.= "<tr>".
															"<td>$reg[0]</td>".
															"<td>$reg[1]</td>". 
															"</tr>"; 
											    }			 													
												$print.="</table>";
											   	echo $print;
										}else{	
										mysql_close($conexao);
										}							
									   ?>
									   	<p>
						 				 <input type="submit" name="incluir_linha" value="Incluir linha" >
						  				<input type="submit" name="atualizar_linha" value="Atualizar linha">
									</p>
									</center>
								 </form>
					       </div> 
					   </div>

					    <div class="tab">
					       <input type="radio" id="tab-3" name="tab-group-1">
					       <label for="tab-3">Unidades Medidas</label>
					     
					       <div class="content">
					            <form method="post" action="include_unidades.php">
					        	 <center>
					        			<p>
					        			Cód. unidade medida:
					        				<input type="text" name="codigo" size="5"/>
										</p>
										<p>
											Desc. unidade medida:
											<input type="text" name="descricao" />
									   </p>
									   	<?php

										include "conecta_mysql.php";
									 
										$resultado = mysql_query("SELECT cod_unidade_medida,
																		 dsc_unidade_medida	
																FROM unidades_medidas
																ORDER BY cod_unidade_medida");
										$linhas = mysql_num_rows($resultado);
										if($linhas>0){
											$print =	"<table border='1' cellspacing='0' cellpadding='0'>".
															"<tr>".
															"<td>Código</td>".
															"<td>Descrição</td>".
															"</tr>";
											for($i=0; $i<$linhas; $i++){
												$reg = mysql_fetch_row($resultado);
											     $print.= "<tr>".
															"<td>$reg[0]</td>".
															"<td>$reg[1]</td>". 
															"</tr>"; 
											    }			 													
												$print.="</table>";
											   	echo $print;
										}else{	
										mysql_close($conexao);
										}							
									   ?>
									   	<p>
						 				 <input type="submit" name="incluir_unidade" value="Incluir unidade" >
						  				<input type="submit" name="atualizar_unidade" value="Atualizar unidade">
									</p>
									</center>
								 </form>
					       </div> 
					   </div>

					   <div class="tab">
					       <input type="radio" id="tab-4" name="tab-group-1">
					       <label for="tab-4">Estoques</label>
					       
					       <div class="content">
					            <form method="post" action="include_estoques.php">
					            <center>
					            		<p>
											Cód. empresa:	
											<?php

											include "conecta_mysql.php";
										 
											$resultado = mysql_query("SELECT cod_empresa, 
																		     dsc_empresa 
															   FROM empresas
															ORDER BY cod_empresa ");
											$linhas = mysql_num_rows($resultado);
											if($linhas>0){
												$print ="<select name='empresa'>";
												for($i=0; $i<$linhas; $i++){
													$reg = mysql_fetch_row($resultado);
													$print.="		<option value='$reg[0]'>$reg[0]-$reg[1]</option>"; 
												   
												    }			 
													$print.="	</select>";
												   	echo $print;
											}else{	
											mysql_close($conexao);
											}							
										   ?>
										   Cód. material:
										   <?php

											include "conecta_mysql.php";
										 
											$resultado = mysql_query("SELECT cod_material, 
																		     dsc_material
															   FROM materiais
															ORDER BY cod_material ");
											$linhas = mysql_num_rows($resultado);
											if($linhas>0){
												$print ="<select name='material'>";
												for($i=0; $i<$linhas; $i++){
													$reg = mysql_fetch_row($resultado);
													$print.="		<option value='$reg[0]'>$reg[0]-$reg[1]</option>"; 
												   
												    }			 
													$print.="	</select>";
												   	echo $print;
											}else{	
											mysql_close($conexao);
											}							
										   ?>
										   </p>
										   <p>
										   Cód. localização:
										   <?php

											include "conecta_mysql.php";
										 
											$resultado = mysql_query("SELECT cod_localizacao, 
																		     dsc_localizacao
															   FROM localizacoes
															ORDER BY cod_localizacao ");
											$linhas = mysql_num_rows($resultado);
											if($linhas>0){
												$print ="<select name='localizacao'>";
												for($i=0; $i<$linhas; $i++){
													$reg = mysql_fetch_row($resultado);
													$print.="		<option value='$reg[0]'>$reg[0]-$reg[1]</option>"; 
												   
												    }			 
													$print.="	</select>";
												   	echo $print;
											}else{	
											mysql_close($conexao);
											}							
										   ?>
										   Cód. fornecedor:
										   <?php

											include "conecta_mysql.php";
										 
											$resultado = mysql_query("SELECT cod_fornecedor, 
																		     dsc_fornecedor
															   FROM fornecedores
															ORDER BY cod_fornecedor ");
											$linhas = mysql_num_rows($resultado);
											if($linhas>0){
												$print ="<select name='fornecedor'>";
												for($i=0; $i<$linhas; $i++){
													$reg = mysql_fetch_row($resultado);
													$print.="		<option value='$reg[0]'>$reg[0]-$reg[1]</option>"; 
												   
												    }			 
													$print.="	</select>";
												   	echo $print;
											}else{	
											mysql_close($conexao);
											}							
										   ?>
										   </p>
										   <p>
										   Qtd. Real: 
										   <input type="text" name="qtd_real" size="5">
										   Qtd. Minima:
										   <select name="qtd_min">
										   	<option value="10">10 dez</option>
										   	<option value="100">100 cem</option>
										   </select>
										   Qtd. Maxima:
										   <select name="qtd_max">
										   	<option value="1000">1000 mil</option>
										   	<option value="5000">5000 mil</option>
										   </select>
										   Qtd. Reposição:
										   <select name="qtd_rep">
										   	<option value="1000">300 trezentos</option>
										   	<option value="5000">500 quinhentos</option>
										   </select>
										   </p>
										   <?php

										include "conecta_mysql.php";
									 
										$resultado = mysql_query("SELECT e.dsc_empresa,
																		 m.dsc_material,
																		 l.dsc_localizacao,
																		 f.dsc_fornecedor,
																		 s.qtd_real,
																		 s.qtd_minima,
																		 s.qtd_maxima,
																		 s.qtd_reposicao	
																FROM 	empresas e,
																		materiais m,
																		localizacoes l,
																		fornecedores f,
																		estoques s
																WHERE 	e.cod_empresa=s.cod_empresa
																AND 	m.cod_material=s.cod_material
																AND 	l.cod_localizacao=s.cod_localizacao
																AND 	f.cod_fornecedor=s.cod_fornecedor			
																ORDER BY m.cod_material desc limit 2");
										$linhas = mysql_num_rows($resultado);
										if($linhas>0){
											$print =	"<table border='1' cellspacing='0' cellpadding='0'>".
															"<tr>".
															"<td>Empresa</td>".
															"<td>Material</td>".
															"<td>Localização</td>".
															"<td>Fornecedor</td>".
															"<td>Qtd_Real</td>".
															"<td>Qtd_Minima</td>".
															"<td>Qtd_Maxima</td>".
															"<td>Qtd_Reposição</td>".
															"</tr>";
											for($i=0; $i<$linhas; $i++){
												$reg = mysql_fetch_row($resultado);
											     $print.= "<tr>".
															"<td>$reg[0]</td>".
															"<td>$reg[1]</td>".
															"<td>$reg[2]</td>".
															"<td>$reg[3]</td>".
															"<td>$reg[4]</td>". 
															"<td>$reg[5]</td>". 
															"<td>$reg[6]</td>". 
															"<td>$reg[7]</td>".    
															"</tr>"; 
											    }			 													
												$print.="</table>";
											   	echo $print;
										}else{	
										mysql_close($conexao);
										}							
									   ?>
										   <p>
							 				 <input type="submit" name="incluir_estoque" value="Incluir no estoque" >
							  				<input type="submit" name="atualizar_estoque" value="Atualizar estoque">
									</p>
					            </center>
								</form>  
					       </div> 
					   </div>
					    
					    <div class="tab">
					       <input type="radio" id="tab-5" name="tab-group-1">
					       <label for="tab-5">Fornecedores</label>
					     
					       <div class="content">
					           <form method="post" action="include_fornecedores.php">
					        	 <center>
					        			<p>
					        			Cód. fornecedor:
					        				<input type="text" name="codigo" size="2"/>
										Desc. do fornecedor:
											<input type="text" name="descricao" />
										</p>
										<p>
											Cód. UF:	
											<?php

											include "conecta_mysql.php";
										 
											$resultado = mysql_query("SELECT cod_uf, 
																		     dsc_uf 
															   FROM unidades_federais 
															ORDER BY cod_uf ");
											$linhas = mysql_num_rows($resultado);
											if($linhas>0){
												$print ="<select name='federais'>";
												for($i=0; $i<$linhas; $i++){
													$reg = mysql_fetch_row($resultado);
													$print.="		<option value='$reg[0]'>$reg[0]-$reg[1]</option>"; 
												   
												    }			 
													$print.="	</select>";
												   	echo $print;
											}else{	
											mysql_close($conexao);
											}							
										   ?>
										   Tipo de fornecedor:
										    <select name="status">
												<option value="F"><b>P.Física</b></option>
												<option value="J"><b>P.Juridica</b></option>
											</select> 	
									   </p>

									   	<?php

										include "conecta_mysql.php";
									 
										$resultado = mysql_query("SELECT cod_fornecedor,
																		 dsc_fornecedor,
																		 cod_uf,
																		 tpo_fornecedor	
																FROM fornecedores
																ORDER BY cod_fornecedor desc limit 6");
										$linhas = mysql_num_rows($resultado);
										if($linhas>0){
											$print =	"<table border='1' cellspacing='0' cellpadding='0'>".
															"<tr>".
															"<td>Código</td>".
															"<td>Descrição</td>".
															"<td>UF</td>".
															"<td>Tipo</td>".
															"</tr>";
											for($i=0; $i<$linhas; $i++){
												$reg = mysql_fetch_row($resultado);
											     $print.= "<tr>".
															"<td>$reg[0]</td>".
															"<td>$reg[1]</td>".
															"<td>$reg[2]</td>".
															"<td>$reg[3]</td>".   
															"</tr>"; 
											    }			 													
												$print.="</table>";
											   	echo $print;
										}else{	
										mysql_close($conexao);
										}							
									   ?>
									   	<p>
						 				 <input type="submit" name="incluir_fornecedor" value="Incluir fornecedor" >
						  				<input type="submit" name="atualizar_fornecedor" value="Atualizar fornecedor">
									</p>
									</center>
								 </form> 
					       </div> 
					   </div>
					    
					     <div class="tab">
					       <input type="radio" id="tab-6" name="tab-group-1">
					       <label for="tab-6">Empresas</label>
					     
					       <div class="content">
					           <form method="post" action="include_empresas.php">
					        	 <center>
					        			<p>
					        			Cód. empresa:
					        				<input type="text" name="codigo" size="2"/>
										</p>
										<p>
											Desc. da empresa:
											<input type="text" name="descricao" />
									
											Cód. UF:	
											<?php

											include "conecta_mysql.php";
										 
											$resultado = mysql_query("SELECT cod_uf, 
																		     dsc_uf 
															   FROM unidades_federais 
															ORDER BY cod_uf ");
											$linhas = mysql_num_rows($resultado);
											if($linhas>0){
												$print ="<select name='federais'>";
												for($i=0; $i<$linhas; $i++){
													$reg = mysql_fetch_row($resultado);
													$print.="		<option value='$reg[0]'>$reg[0]-$reg[1]</option>"; 
												   
												    }			 
													$print.="	</select>";
												   	echo $print;
											}else{	
											mysql_close($conexao);
											}							
										   ?>
									   </p>
									   	<?php

										include "conecta_mysql.php";
									 
										$resultado = mysql_query("SELECT cod_empresa,
																		 dsc_empresa,
																		 cod_uf	
																FROM empresas
																ORDER BY cod_empresa desc limit 6");
										$linhas = mysql_num_rows($resultado);
										if($linhas>0){
											$print =	"<table border='1' cellspacing='0' cellpadding='0'>".
															"<tr>".
															"<td>Código</td>".
															"<td>Descrição</td>".
															"<td>UF</td>".
															"</tr>";
											for($i=0; $i<$linhas; $i++){
												$reg = mysql_fetch_row($resultado);
											     $print.= "<tr>".
															"<td>$reg[0]</td>".
															"<td>$reg[1]</td>".
															"<td>$reg[2]</td>".  
															"</tr>"; 
											    }			 													
												$print.="</table>";
											   	echo $print;
										}else{	
										mysql_close($conexao);
										}							
									   ?>
									   	<p>
						 				 <input type="submit" name="incluir_empresa" value="Incluir empresa" >
						  				<input type="submit" name="atualizar_empresa" value="Atualizar empresa ">
									</p>
									</center>
								 </form> 
					       </div> 
					   </div>

					    <div class="tab">
					       <input type="radio" id="tab-7" name="tab-group-1">
					       <label for="tab-7">Localizações</label>
					     
					       <div class="content">
					            <form method="post" action="include_localizacoes.php">
					        	 <center>
					        			<p>
					        			Cód. localização:
					        				<input type="text" name="codigo" size="2"/>
										</p>
										<p>
											Desc. localização:
											<input type="text" name="descricao" />
									   </p>
									   	<?php

										include "conecta_mysql.php";
									 
										$resultado = mysql_query("SELECT cod_localizacao,
																		 dsc_localizacao	
																FROM localizacoes
																ORDER BY cod_localizacao desc limit 6");
										$linhas = mysql_num_rows($resultado);
										if($linhas>0){
											$print =	"<table border='1' cellspacing='0' cellpadding='0'>".
															"<tr>".
															"<td>Setor</td>".
															"<td>Descrição</td>".
															"</tr>";
											for($i=0; $i<$linhas; $i++){
												$reg = mysql_fetch_row($resultado);
											     $print.= "<tr>".
															"<td>$reg[0]</td>".
															"<td>$reg[1]</td>". 
															"</tr>"; 
											    }			 													
												$print.="</table>";
											   	echo $print;
										}else{	
										mysql_close($conexao);
										}							
									   ?>
									   	<p>
						 				 <input type="submit" name="incluir_local" value="Incluir " >
						  				<input type="submit" name="atualizar_local" value="Atualizar ">
									</p>
									</center>
								 </form> 
					       </div> 
					   </div>

					      <div class="tab">
					       <input type="radio" id="tab-8" name="tab-group-1">
					       <label for="tab-8">Unidades Federais</label>
					     
					       <div class="content">
					           <form method="post" action="include_federais.php">
					        	 <center>
					        			<p>
					        			Cód. UF:
					        				<input type="text" name="codigo" size="2"/>
										</p>
										<p>
											Desc. UF:
											<input type="text" name="descricao" />
									   </p>
									   	<?php

										include "conecta_mysql.php";
									 
										$resultado = mysql_query("SELECT cod_uf,
																		 dsc_uf	
																FROM unidades_federais
																ORDER BY cod_uf desc limit 6");
										$linhas = mysql_num_rows($resultado);
										if($linhas>0){
											$print =	"<table border='1' cellspacing='0' cellpadding='0'>".
															"<tr>".
															"<td>Sigla</td>".
															"<td>Descrição</td>".
															"</tr>";
											for($i=0; $i<$linhas; $i++){
												$reg = mysql_fetch_row($resultado);
											     $print.= "<tr>".
															"<td>$reg[0]</td>".
															"<td>$reg[1]</td>". 
															"</tr>"; 
											    }			 													
												$print.="</table>";
											   	echo $print;
										}else{	
										mysql_close($conexao);
										}							
									   ?>
									   	<p>
						 				 <input type="submit" name="incluir_federal" value="Incluir UF" >
						  				<input type="submit" name="atualizar_federal" value="Atualizar UF">
									</p>
									</center>
								 </form> 
					       </div> 
					   </div>

					</div>
        </td>
    </tr>
    </table>
    <table border="1" width="869px" cellspacing="0" cellpadding="0">
	    <tr>
	      <td id="delete" width="33%" height="19">
	        <p align="center">
	            <b>Excluir Produto</b>
	        </p>    
	      </td> 
	      <td>
				<p align="center">
					<b>Mostrar Produtos</b>  
				</p>
	        </td>
	    </tr>
	    <tr>	    
	        <td>
				<p align="center">
				  <br>Código do produto a ser excluído:
				</p>		
				<form method="POST" action="delete.php">
					  <p align="center">
						  <input type="text" name="codigo" size="5">
					  </p>
					  <p align="center">
						 <input type="submit" value="Excluir Produto" name="excluir">
					  </p>
				  </form>
						<p align="center"><br>
	    		</td>
	    	<td> 
				<p align="center">
				  <br>
				  Clique no botão abaixo para exibir todos os produtos da loja:
				</p>
				<form method="POST" action="show.php">
					<p align="center">
					 <input type="submit" value="Mostrar Produtos" name="mostrar">
					</p>
				</form>
	        </td>	
	    </tr>
	</table>
<table border="1" width="869px" cellspacing="0" cellpadding="0">    
    <tr>
    	<td>
    		<p align="center">
    		<b>Selecionar Produtos</b>
    		</p>	
    	</td>
    </tr>
    <tr>
    	<td>
    		<p align="center">
    			Escreve nesta área de texto logo abaixo, o comando 'SELECT' avançado:
    		</p>
    		<form method="POST" action="select.php">
				<p align="center">
					<textarea name="select" rows="5" cols="50"></textarea>
					</br>
					<input type="submit" value="Executar" name="executar"> 	
				</p>
			</form>
    	</td>
    </tr>
  </table>
  <div id="rodape">
   <?php echo "$saudacao";?>
          </br>
          <input id="criar" type="button" value="Cadastrar novo usuário"  onClick="Nova()"/>
          <input id="sair" type="button" value="Sair"  onClick="Sair()"/>
  </div> 
 </center>
</body>
</html>
