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




select c.numero_venta,a.n_recibo,p.nombres,u.usuario,c.monto,a.monto_abono as abono,a.forma_pago,c.forma_pago,c.saldo,a.fecha_abono,count(monto_abono) as abonos from pacientes as p inner join  creditos as c on p.id_paciente=c.id_paciente inner join usuarios as u on u.id_usuario=c.id_usuario inner join abonos as a on c.id_credito=a.id_credito where fecha_abono=curdate()  group by c.numero_venta having count(monto_abono)<=1 order by c.forma_pago desc;

////////////////RECUPERADO

select c.id_credito,c.numero_venta,a.n_recibo,c.monto, max(a.fecha_abono),a.monto_abono from creditos as c inner join abonos as a 
on c.id_credito=a.id_credito group by fecha_abono having count(monto_abono)>1 and fecha_abono=curdate();

select c.id_credito,c.numero_venta,a.n_recibo,p.nombres,u.usuario,c.monto, max(a.fecha_abono),a.monto_abono from  pacientes as p inner join creditos as c on p.id_paciente=c.id_paciente inner join usuarios as u on u.id_usuario=c.id_usuario inner join abonos as a  on c.id_credito=a.id_credito group by fecha_abono having count(monto_abono)>1 and fecha_abono=curdate();

select c.id_credito,c.numero_venta,a.n_recibo,p.nombres,u.usuario,c.monto, a.fecha_abono,a.monto_abono from  pacientes as p inner join creditos as c on p.id_paciente=c.id_paciente inner join usuarios as u on u.id_usuario=c.id_usuario inner join abonos as a  on c.id_credito=a.id_credito group by a.n_recibo having count(monto_abono)>1;

select c.id_credito,c.numero_venta,a.n_recibo,p.nombres,u.usuario,c.monto,a.fecha_abono,a.monto_abono from  pacientes as p inner join creditos as c on p.id_paciente=c.id_paciente inner join usuarios as u on u.id_usuario=c.id_usuario inner join abonos as a  on c.id_credito=a.id_credito  where a.fecha_abono=curdate() order by a.fecha_abono DESC;

select c.id_credito,c.numero_venta,a.n_recibo,p.nombres,u.usuario,c.monto,max(a.fecha_abono),a.monto_abono,a.id_paciente, count(c.id_credito) from  pacientes as p inner join creditos as c on p.id_paciente=c.id_paciente inner join usuarios as u on u.id_usuario=c.id_usuario inner join abonos as a  on c.id_credito=a.id_credito  group by id_paciente having count(c.id_credito)>1 and max(a.fecha_abono) = curdate() order by a.fecha_abono DESC;




