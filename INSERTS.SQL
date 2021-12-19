INSERT INTO `tb_inf_pessoal`(`ID_JPC`, `DS_NOME`, `DT_NASCIMENTO`, `DS_EMAIL`, `DS_TP_LOGRADOURO`, `DS_LOGRADOURO`, `NU_ENDERECO`, `DS_COMPLEMENTO`, `DS_BAIRRO`, `DS_CIDADE`, `DS_UF`, `NU_CEP`, `NU_TEL_RESIDENCIAL`, `NU_TEL_MOVEL`, `NU_TEL_COMERCIAL`, `ID_TP_DOCUMENTO`, `NU_DOCUMENTO`, `ID_ESCOLARIDADE`, `DS_OCUPACAO`, `IN_ATIVO`, `IN_CORREIO`, `ID_RESPONSAVEL`) 
select Código,nome, DataNascimento, email, null, endereco, null, null, bairro, cidade, uf, cep, telefone, null, null, null, rg, null, ocupacao, ativo, correio, null from movedb.cadastro


INSERT INTO jpc_dados.tb_inf_escoteira(`ID_JPC`, `NU_REGISTRO_UEB`, `DT_PROMESSA`, `DT_INICIO`, `ID_CATEGORIA`, `ID_RAMO`, `ID_SECAO`, `ID_FUNCAO`, `DT_AFASTAMENTO`, `DS_COMENTARIO`) 
select Código,reg_ueb,data_promessa, data_inicio, null, 
       case when cargo1 = 'escoteiro' then 2
	        when cargo1 = 'pioneiro' then 4
			when cargo1 = 'senior' or cargo1 = 'guia' then 3
			when cargo1 = 'Lobo' or Cargo3 = 'Ramo Lobinho' then 1
		  else 99
	   end,
	   case when cargo3 = 'Alcatéia I' then 1
	        when cargo3 = 'Alcatéia III' then 3
			when cargo3 = 'Alcatéia IV' then 4
			when cargo3 = 'Maat' then 5
			when cargo3 = 'Kilimanjaro' or cargo3 = 'Texugo' then 6
			when cargo3 = 'Tsavo' or cargo3 = 'Falcão' or cargo3 = 'Gaivota' or cargo3 = 'Gralha' then 7
	        when cargo3 = 'Calipso' or cargo3 = 'Txukarramãi' then 8
			when cargo3 = 'Guerreiros de Terra Cota' or cargo3 = 'Senior' or cargo3 = 'Diablotin' then 9
			when cargo3 = 'Pioneiros' or cargo3 = 'Clã Pioneiro' or cargo3 = 'Pioneira' then 10
		else 99
		end,
		null, data_afastamento, Comentários
from movedb.inf_scout



INSERT INTO jpc_dados.tb_ficha_medica(`ID_JPC`, `ID_TP_SANGUINEO`, `IN_NADAR`, `IN_ALERGIA`, `DS_ALERGIA`, `IN_CONVENIO`, `DS_CONVENIO`, `IN_ENFERMIDADE`, `DS_ENFERMIDADE`, `NU_TEL_EMERGENCIA`, `DS_COMENTARIO`) 
select Código, 
       case when Sangue = 'A +' or Sangue = 'A+' or Sangue = 'A positivo' or Sangue = 'A  +' or Sangue = 'A  positivo' or Sangue = 'A posoitivo' or Sangue = 'A posiitivo' then 1
	        when Sangue = 'A -' or Sangue = 'A  -' or Sangue = 'A _' or Sangue = 'A-' or Sangue = 'A negativo' then 2
			when Sangue = 'B +' or Sangue = 'B+' or Sangue = 'B positivo' then 3
			when Sangue = 'B -' or Sangue = 'B negativo' then 4
			when Sangue = 'AB +' or Sangue = 'AB+' or Sangue = 'AB positivo' then 5
			when Sangue = 'AB -' then 6
			when Sangue = 'Opositivo' or Sangue = 'O +' or Sangue = '0  +' or Sangue = 'O+' or Sangue = '0 +' or Sangue = 'O  +' or Sangue = 'O positivo' or Sangue = 'O postitivo' or Sangue = 'O posiitivo' then 7
			when Sangue = 'O -' or Sangue = 'O negativo' or Sangue = ' O -' or Sangue = '0 -' or Sangue = 'O-' or Sangue = '0 (-)' or Sangue = 'O (-)' then 8
		end,
	   null, 
	   case when alergia is not null then 1 else 0 end,
	   alergia, null, null,
	   case when enfermidades is not null then 1 else 0 end,
	   enfermidades, Tel_emergercia, Comentários
from movedb.inf_personal

UPDATE `tb_tp_sanguineo` SET `DS_TP_SANGUINEO`='A-' WHERE `ID_TP_SANGUINEO`=2