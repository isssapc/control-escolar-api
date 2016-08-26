CREATE DATABASE escuela;
use escuela;

create table inscripciones (
	escuela 	  		varchar(2)		not null, 
	curp		  		varchar(18)		not null,
	nombre		  		varchar(60)		not null, 
	sexo		  		varchar(1),
	fecha_nac	  		date,
	tipo_sangre	  		varchar(20),
	enfermedad	  		varchar(60),
	revalidacion		varchar(1),
	procedencia	  		varchar(2),
	fecha_ingreso		date,
	domicilio	  		varchar(60),
	colonia		  		varchar(60),
	ciudad		  		varchar(60),
	carrera		  		varchar(10),
	turno		  		varchar(1),
	semestre	  		int,
	grupo		  		varchar(1),
	promovido	  		varchar(1),
	cuota_especial		varchar(1),
	inscripcion	  		decimal(9,2),
	colegiatura	  		decimal(9,2),
	dia_pago	  		int,
	regular		  		varchar(1),
	recargo		  		varchar(1),
	costo_materia		decimal(9,2),
	mantenimiento		varchar(1),
	tutor		  		varchar(60),
	trabajo_tutor		varchar(60),
	telefono_casa		varchar(20),
	telefono_trabajo  	varchar(20),
	celular_tutor	  	varchar(20),
	correo_tutor	  	varchar(60),
	acta_nacimiento	  	varchar(1),
	cert_secundaria	  	varchar(1),
	documento_curp	  	varchar(1),
	cert_parcial		varchar(1),
	fotos		  		varchar(1),
	folio_inscripcion 	int,
	estatus		  		varchar(1),
	PRIMARY KEY (escuela, curp));

create table alumno_general (
	escuela		  		varchar(2)		not null,
	curp	 	  		varchar(18)		not null,
	nombre 		  		varchar(60)		not null,
	num_control	  		varchar(14),
	sexo		  		varchar(1),
	fecha_nac	  		date,
	tipo_sangre	  		varchar(20),
	enfermedad	  		varchar(60),
	escuela_def	  		varchar(2),
	estatus		  		varchar(1),
	PRIMARY KEY (escuela, curp));

create table alumno_personal (
	curp		  		varchar(18)		not null,
	domicilio	  		varchar(60),
	colonia		  		varchar(60),
	ciudad		  		varchar(60),
	tutor		  		varchar(60),
	trabajo_tutor	  	varchar(60),
	celular_tutor	  	varchar(15),
	telefono_trabajo  	varchar(20),
	telefono_casa	  	varchar(15),
	correo_tutor	  	varchar(60),
	PRIMARY KEY (curp));

create table alumno_escuela (
	escuela		  		varchar(2)		not null,
	curp		  		varchar(18)		not null,
	revalidacion	  	varchar(1),
	fecha_rev	  		date,
	procedencia	  		varchar(2),
	fecha_ingreso	  	date,
	carrera		  		varchar(10),
	turno		  		varchar(1),
	semestre	  		int,
	grupo		  		varchar(1),
	regular		  		varchar(1),
	semestre_ingreso  	int,
	periodo_ingreso	  	varchar(10),
	ingreso_subsistema  int,
	perido_egreso	  	varchar(10),
	promedio	  		decimal(4,1),
	folio_generacion  	varchar(4),
	semestre_baja	  	int,
	fecha_baja	  		date,
	PRIMARY KEY (escuela, curp));

create table alumno_cuota (
	escuela		  		varchar(2)		not null,
	curp		  		varchar(18)		not null,
	promovido	  		varchar(1),
	cuota_especial	  	varchar(1),
	inscripcion	  		decimal(9,2),
	colegiatura	  		decimal(9,2),
	adeudo_anterior	  	decimal(9,2),
	adeudo_actual	  	decimal(9,2),
	forma_pago	  		int,
	dia_pago	  		int,
	ultimo_pago	  		date,
	recargo		  		varchar(1),
	costo_materia	  	decimal(9,2),
	mantenimiento_otro  varchar(1),
	PRIMARY KEY (escuela, curp));

create table alumno_documento (
	escuela		  		varchar(2)		not null,
	curp		  		varchar(18)		not null,
	acta_nacimiento	  	varchar(1),
	certificado		  	varchar(1),
	curp_documento 		varchar(1),
	cert_parcial	  	varchar(1),
	fotos		  		varchar(1),
	folio_inscripcion 	int,
	credencial	  		int,
	tipo_constancia	  	varchar(1),
	num_constancia	  	int,
	oficio_constancia 	varchar(10),
	PRIMARY KEY (escuela, curp));

create table cargo_abono ( 
	escuela		  		varchar(2)		not null,
	curp		  		varchar(18)		not null,
	fecha		  		date			not null,
	tipo_concepto	  	varchar(1) 		not null,
	concepto	  		varchar(4)		not null,
	mes		  			int				not null,
	serial		  		int				not null,
	folio		  		int,
	importe		  		decimal(9, 2),
	nombre_concepto	  	varchar(60),
	fecha_baja	  		date,
	PRIMARY KEY (escuela, curp, fecha, tipo_concepto, concepto, mes, serial));

create table kardex (
	escuela		  		varchar(2)		not null,
	curp		  		varchar(18)		not null,
	mes		  			int				not null,
	clave		  		varchar(5)		not null,
	semestre	  		int,
	grupo		 		varchar(1),
	descrip		  		varchar(60),
	cargo		  		decimal(9, 2),
	abono		  		decimal(9, 2),
	ultimo_abono	  	date,
	PRIMARY KEY (escuela, curp, mes, clave));

create table calificacion ( 
	escuela		  		varchar(02)		not null,
	curp		  		varchar(18)		not null,
	carrera		 		varchar(10)		not null,
	turno		  		varchar(1)		not null,
	semestre	  		int 			not null,
	grupo		  		varchar(01)		not null,
	serial		  		int		not	 null,
	nombre_materia	  	varchar(60)		not null,
	parcial01	  		decimal(4,1),
	parcial02	  		decimal(4,1),
	parcial03	  		decimal(4,1),
	promedio	  		decimal(4,1),
	calif_final	  		int,
	calif_extra	  		decimal(2),
	oportunidad	  		decimal(1),
	fecha_extra	  		date,
	periodo_extra	  	varchar(10),
	materia_regula	  	varchar(1),
	PRIMARY KEY (escuela, curp, carrera, turno, semestre, grupo, serial));

create table control_pago (
	escuela				varchar(2)		not null,
	curp				varchar(18)		not null,
	inscripcion_bach02	decimal(9,2),
	estatus_insc_bach02	varchar(1),
	inscripcion_bach08	decimal(9,2),
	estatus_insc_bach08	varchar(1),
	inscripcion_lic01	decimal(9,2),
	estatus_insc_lic01	varchar(1),
	inscripcion_lic05	decimal(09,02),
	estatus_insc_lic05	varchar(1),
	inscripcion_lic09	decimal(9,2),
	estatus_insc_lic09	varchar(1),
	laboratorio_bach02	decimal(9,2),
	estatus_lab_bach02	varchar(1),
	laboratorio_bach08	decimal(9,2),
	estatus_lab_bach08	varchar(1),
	certifica_bach04	decimal(9,2),
	estatus_cert_bach04	varchar(1),
	certifica_bach10	decimal(9,2),
	estatus_cert_bach10	varchar(1),
	certifica_lic01		decimal(9,2),
	estatus_cert_lic01	varchar(1),
	certifica_lic05		decimal(9,2),
	estatus_cert_lic05	varchar(1),
	certifica_lic09		decimal(9,2),
	estatus_cert_lic09	varchar(1),
	colegiatura_bach01	decimal(9,2),
	estatus_col_bach01	varchar(1),
	colegiatura_bach02	decimal(9,2),
	estatus_col_bach02	varchar(1),
	colegiatura_bach03	decimal(9,2),
	estatus_col_bach03	varchar(1),
	colegiatura_bach04	decimal(9,2),
	estatus_col_bach04	varchar(1),
	colegiatura_bach05	decimal(9,2),
	estatus_col_bach05	varchar(1),
	colegiatura_bach06	decimal(9,2),
	estatus_col_bach06	varchar(1),
	colegiatura_bach07	decimal(9,2),
	estatus_col_bach07	varchar(1),
	colegiatura_bach08	decimal(9,2),
	estatus_col_bach08	varchar(1),
	colegiatura_bach09	decimal(9,2),
	estatus_col_bach09	varchar(1),
	colegiatura_bach010	decimal(9,2),
	estatus_col_bach010	varchar(1),
	colegiatura_bach011	decimal(9,2),
	estatus_col_bach011	varchar(1),
	colegiatura_bach012	decimal(9,2),
	estatus_col_bach012	varchar(1),
	PRIMARY KEY (escuela, curp));

create table carrera (
	escuela		  		varchar(2)		not null,
	carrera		  		varchar(10)		not null,
	nombre_carrera	  	varchar(60),
	nombre_area	  		varchar(60),
	creditos	  		int,
	PRIMARY KEY (escuela, carrera));

create table escuela (
	escuela		  		varchar(2)		 not null,
	nombre_escuela	  	varchar(60),
	domicilio	  		varchar(60),
	clave		  		varchar(15),
	tipo_periodo	  	varchar(1),
	numero_periodo	  	int,
	director	  		varchar(60),
	control_escolar	  	varchar(60),
	PRIMARY KEY (escuela));

create table grupo (
	escuela		  		varchar(2)		not null,
	carrera		  		varchar(10)		not null,
	turno		  		varchar(1)		not null,
	semestre	  		int				not null,
	grupo		  		varchar(1)		not null,
	nombre_grupo	  	varchar(60),
	folio		  		varchar(5),
	activo		  		varchar(1),
	PRIMARY KEY (escuela, carrera, turno, semestre, grupo));

create table plan ( 
	carrera		  		varchar(10)		not null,
	semestre	  		int				not null,
	serial		  		int				not null,
	nombre_materia	  	varchar(140),
	total_hora	  		int,
	credito_materia	  	int,
	PRIMARY KEY (carrera, semestre, serial));


create table concepto (
	escuela		  		varchar(2)		not null,
	tipo_concepto	  	varchar(1)		not null,
	concepto	 		varchar(4)		not null,
	descripcion_conc  	varchar(60),
	importe		  		decimal(9,2),
	seleccionado	  	varchar(1),
	PRIMARY KEY (escuela, tipo_concepto, concepto));

create table parametro (
	saldo_inicial		decimal(9,2),
	fecha_inicio		date,
	mes_inicio_periodo	int,
	ano_inicio_periodo	int,
	mes_fin_periodo		int,
	ano_fin_periodo		int,
	oficio_constancia	int,
	inicio_semestre		date,
	fin_semestre		date,
	actualiza_recargo	date);

create table texto_constancia (
	sigla_promedio		varchar(5),
	dirigido_promedio	varchar(60),
	texto1_promedio		varchar(200),
	texto2_promedio		varchar(200),
	texto3_promedio		varchar(200),
	sigla_sin_prom		varchar(5),
	dirigido_sin_prom	varchar(60),
	texto1_sin_prom		varchar(200),
	texto2_sin_prom		varchar(200),
	texto3_sin_prom		varchar(200),
	sigla_conducta		varchar(5),
	dirigido_conducta	varchar(60),
	texto1_conducta		varchar(200),
	texto2_conducta		varchar(200),
	texto3_conducta		varchar(200));

create table folio_generacion (
	folio				varchar(4)	not null,
	nombre_folio		varchar(60),
	generacion			varchar(9),
	periodo1	 		varchar(7),
	periodo2	 		varchar(7),
	periodo3	 		varchar(7),
	periodo4	 		varchar(7),
	periodo5	 		varchar(7),
	periodo6	 		varchar(7),
	periodo7	 		varchar(7),
	periodo8	 		varchar(7),
	PRIMARY KEY (folio));

create table titulo (
	titulo1		  		varchar(100),
	titulo2		  		varchar(100),
	titulo3		  		varchar(100),
	titulo4		  		varchar(100),
	titulo5		  		varchar(100));

create table titulo_boleta (
	titulo1				varchar(100),
	titulo2				varchar(100),
	titulo3				varchar(100),
	titulo4				varchar(100),
	titulo5				varchar(100));

create table acceso (
	clave_permiso		varchar(10)	not null,
	PRIMARY KEY (clave_permiso));

create table permiso (
	clave_permiso		varchar(10)	not null,
	actividad			varchar(8)	not null,
	descripcion			varchar(60),
	acceso				varchar(1),
	nuevo				varchar(1),
	editar				varchar(1),
	grabar				varchar(1),
	borrar				varchar(1),
	visualizar			varchar(1),
	reporte				varchar(1),
	proceso				varchar(1),
	PRIMARY KEY (clave_permiso, actividad));

create table matriz_permiso (
	clave_permiso		varchar(10)	not null,
	actividad			varchar(8)	not null,
	descripcion			varchar(60),
	acceso				varchar(1),
	nuevo				varchar(1),
	editar				varchar(1),
	grabar				varchar(1),
	borrar				varchar(1),
	visualizar			varchar(1),
	reporte				varchar(1),
	proceso				varchar(1),
	PRIMARY KEY (clave_permiso, actividad));
