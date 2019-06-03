show tables;
CREATE consultas(
  id_consulta INT(11) NOT NULL AUTO_INCREMENT,
  motivo TEXT NULL DEFAULT NULL,
  patologias TEXT NULL DEFAULT NULL,
  fecha_creacion TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  primary key(id_consulta)


////////////////////////Reporte recupeardos

select p.nombres,c.monto,a.forma_pago,a.n_recibo,c.monto,a.monto_abono,c.saldo from pacientes as p inner join creditos as c on p.id_paciente=c.id_paciente inner join abonos as a on c.id_credito=a.id_credito;


///////////////////

select p.nombres,c.monto,a.forma_pago,a.n_recibo,c.monto,a.monto_abono,c.saldo,a.fecha_abono from pacientes as p inner join creditos as c on p.id_paciente=c.id_paciente inner join abonos as a on c.id_credito=a.id_credito where fecha_abono=now();

///////////////////////////////
select c.numero_venta,p.nombres,u.usuario,c.monto,a.monto_abono as abono,
a.forma_pago,c.forma_pago,c.saldo,a.fecha_abono from pacientes as p inner join  creditos as c 
on p.id_paciente=c.id_paciente inner join usuarios as u on u.id_usuario=c.id_usuario inner join abonos as a
 on c.id_credito=a.id_credito where fecha_abono=curdate();




