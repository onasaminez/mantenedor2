ï»¿<?php require_once('../connect/con_sql.php');  ?>
<script src="../js/jquery-1.11.1.min.js"></script>
<link rel="stylesheet" type="text/css" href="code/bootstrap/css/bootstrap.css" />


<script>
jQuery(document).ready(function(){
		jQuery('#form_t').submit(function(){
			var dados = jQuery( this ).serialize();
			var presenca = $('#presenca').val();

			jQuery.ajax({
				type: "POST",
				url: "code/presencaSql.php",
				data: dados,
				success: function( data )
				{
					if(presenca == 1){
					alert( 'PRESENÃ‡A confirmada.' );
					location.reload();
					}else{
						alert( 'FALTA confirmada.' );
						location.reload();
					}
				}
			});
			
			return false;
		});
	});


</script>




<style>
/* formataÃ§Ã£o das linhas e fontes padrÃ£o */
.titulo1 {
	font-family:'lucida grande',tahoma,verdana,arial,sans-serif;
    font-size:16px;
}
.titulo2 {
   font-family:"Lucida Sans Unicode", "Lucida Grande", sans-serif;
   font-size:14px;	
}
.linha1 {
   font-family:'lucida grande',tahoma,verdana,arial,sans-serif;
   font-size:13px;
   border: 1px solid black;
   border-style : solid;
   border-color : silver;
   color:#000;   
}
.linha1:hover {
	background-color: #eee;
	cursor: default;
	font-weight: bold;
}
.linha2 {
   font-family:'lucida grande',tahoma,verdana,arial,sans-serif;
   font-size:13px;
   border: 1px solid black;
   border-style : solid;
   border-color : silver;
   color:#000;   
}
.linha2:hover {
	background-color: #eee;
	cursor: default;
}
.input{
	width:50%;
}
.paragrafo{
	font-family:'lucida grande',tahoma,verdana,arial,sans-serif;
	font-size:small;
	color:#000000;
}

</style>

<?php 



$login = $_SESSION['Login'];

$resSQL = mysql_query("SELECT * FROM tb_residente LEFT JOIN tb_residente_trat ON id_res = residente_id_res WHERE ativo_res_trat = 1 AND especial_res = 0 ORDER BY nome_res ASC");  
$residente = mysql_fetch_assoc($resSQL);
$id = $residente['id_res'];

$array_semana = array ( "Domingo", "Segunda-Feira", "Terca-Feira", "Quarta-Feira", "Quinta-Feira", "Sexta-Feira", "Sabado" );

?>
<div class="container">
<div class="well">
<table width="99%" border="0">
  <form method="post" id="form_t" action="" >
    <tr>
    	<td class="titulo2">Lista de Alunos:</td>
    </tr>
    <tr>
    	<td>
        	<select  name="residente" class="input" required>
            	<option value="">SELECIONAR</option>
			<?php do{ ?>
            	<option value="<?php print $residente['id_res'];?>"><?php print $residente['nome_res'];?></option>
             <?php } while($residente = mysql_fetch_assoc($resSQL)); ?>
            </select>
        </td>
    </tr>
    <tr>
    	<td class="titulo2">Plataforma:</td>
    </tr>
    <tr>
    	<td>
        	<select name="plataforma" required>
            	<option value="">Selecione</option>
                <option value="IPED">IPED</option>
                <option value="MICROSOFT">MICROSOFT</option>
                <option value="PORTAL CRDP">PORTAL CRDP</option>
                <option value="SEBRAE">SEBRAE</option>
                <option value="HJ - DIGITACAO">HJ - DIGITACAO</option>
                <option value="EJA">EJA</option>
            </select>
        </td>
    </tr>
    <tr>
    	<td class="titulo2">Curso:</td>
    </tr>
    <tr>
    	<td><input type="text" name="curso" class="input" required></td>
    </tr>
    <tr>
    	<td class="titulo2">Horario:</td>
    </tr>
    <tr>
    	<td>
        	<select name="horario" id="" required>
                <option value="">Selecione</option>
                <option value="06:00">06:00h</option>
                <option value="06:30">06:30h </option>
                <option value="07:00">07:00h </option>
                <option value="07:30">07:30h </option>
                <option value="08:00">08:00h </option>
                <option value="08:30">08:30h </option>
                <option value="09:00">09:00h </option>
                <option value="09:30">09:30h </option>
                <option value="10:00">10:00h </option>
                <option value="10:30">10:30h </option>
                <option value="11:00">11:00h </option>
                <option value="11:30">11:30h </option>
                <option value="12:00">12:00h </option>
                <option value="12:30">12:30h </option>
                <option value="13:00">13:00h </option>
                <option value="13:30">13:30h </option>
                <option value="14:00">14:00h </option>
                <option value="14:30">14:30h </option>
                <option value="15:00">15:00h </option>
                <option value="15:30">15:30h </option>
                <option value="16:00">16:00h </option>
                <option value="16:30">16:30h </option>
                <option value="17:00">17:00h </option>
                <option value="17:30">17:30h </option>
                <option value="18:00">18:00h </option>
                <option value="18:30">18:30h </option>
                <option value="19:00">19:00h </option>
                <option value="19:30">19:30h </option>
                <option value="20:00">20:00h </option>
                <option value="20:30">20:30h </option>
                <option value="21:00">21:00h </option>
                <option value="21:30">21:30h </option>
              </select>
        </td>
    </tr>
    <tr>
    	<td class="titulo2">Dia:</td>
    </tr>
    <tr>
    	<td>
            	<select  name="dia" required>
                	<option value="">Selecionar</option>
                	<?php foreach($array_semana as $dia){ ?>
                    	<option value="<?php print $dia ;?>"><?php print $dia ;?></option>
               		<?php } ?>
                </select>
                
        </td>
    </tr>
     <tr>
    	<td class="titulo2">Tempo de Curso:</td>
    </tr>
    <tr>
    	<td>
        	<select name="tempo" id="" required>
                <option value="">Selecione</option>
                <option value="10">10%</option>
                <option value="20">20%</option>
                <option value="30">30%</option>
                <option value="40">40%</option>
                <option value="50">50%</option>
                <option value="60">60%</option>
                <option value="70">70%</option>
                <option value="80">80%</option>
                <option value="90">90%</option>
                <option value="Concluido">Concluido</option>
              </select>
        </td>
    </tr>
    <tr>
    	<td class="titulo2">PresenÃ§a:</td>
    </tr>
    <tr>
    	<td>
            <select name="presenca" id="presenca" required>
                <option value="1">Presente</option>
                <option value="0">Falta</option>
            </select>
        </td>
    </tr>
    <tr>
    	<td><input type="submit" value="Marcar" class="btn btn-primary" /></td><input type="hidden" name="login" value="<?php print $login; ?>" />
    </tr>
    
	</form>
</table>
</div>
</div>
