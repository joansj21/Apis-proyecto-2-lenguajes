using Cupones.BC.Modelos;
using Cupones.BW.Interfaces.DA;
using Cupones.DA.Contexto;
using Cupones.DA.Entidades;
using Microsoft.EntityFrameworkCore;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using Tarea4.SG;

namespace Cupones.DA.Acciones
{
    public class GestionarPagoDA : IGestionarPagoDA
    {
        private readonly ProyectoCuponesContexts _context;
        private readonly GestionarMailSG _mailService;



        public GestionarPagoDA(ProyectoCuponesContexts context, GestionarMailSG _mailService)
        {
            _context = context;
            this._mailService = _mailService;
        }

        public async Task<IEnumerable<Pago>> getUSerPago(int idUser)
        {
            var pagosDA = await _context.Pagos
            .Where(p => p.UserId == idUser)
            .ToListAsync();

            return pagosDA.Select(p => new Pago
            {
                Id = p.Id,
                UserId = p.UserId,
                NameTarjeta = p.NameTarjeta,
                Ccv = p.Ccv,
                FechaVencimiento = p.FechaVencimiento,
                Tarjeta = p.Tarjeta,
                Price = p.Price,
                PurchaseDate = p.PurchaseDate
            }).ToList();

        }

        public async Task<Pago> insertPago(Pago pago)
        {
            // Verificar si ya existe un pago similar
            var existingPago = await _context.Pagos
                .Where(p => p.UserId == pago.UserId && p.Tarjeta == pago.Tarjeta)
                .FirstOrDefaultAsync();

            if (existingPago != null)
            {
                return null; // Ya existe un pago similar
            }

            // Crear nuevo pago
            PagoDA newPago = new PagoDA
            {
                UserId = pago.UserId,
                NameTarjeta = pago.NameTarjeta,
                Ccv = pago.Ccv,
                FechaVencimiento = pago.FechaVencimiento,
                Tarjeta = pago.Tarjeta,
                Price = pago.Price,
                PurchaseDate = pago.PurchaseDate
            };

            // Añadir el objeto pago al contexto
            _context.Pagos.Add(newPago);

            // Guardar los cambios en la base de datos
            await _context.SaveChangesAsync();

            // Obtener el correo electrónico del usuario correspondiente al pago
            var userEmail = await _context.Users
                .Where(u => u.UserId == pago.UserId)
                .Select(u => u.Email)
                .FirstOrDefaultAsync();

            if (userEmail == null)
            {
                // Manejar el caso cuando no se encuentra el correo electrónico del usuario
                // Aquí puedes lanzar una excepción, mostrar un mensaje de error, etc.
                return null;
            }

            // Envía el correo electrónico utilizando el método sendMail de GestionarMailSG
            await _mailService.sendMail(pago, userEmail);

            // Devolver el pago registrado exitosamente
            return new Pago
            {
                Id = newPago.Id,
                UserId = newPago.UserId,
                NameTarjeta = newPago.NameTarjeta,
                Ccv = newPago.Ccv,
                FechaVencimiento = newPago.FechaVencimiento,
                Tarjeta = newPago.Tarjeta,
                Price = newPago.Price,
                PurchaseDate = newPago.PurchaseDate
            };
        }



        /*public async Task<Pago> insertPago(Pago pago)
        {
            // Verificar si ya existe un pago similar (puedes ajustar la lógica según tus requisitos)
            var existingPago = await _context.Pagos
                .Where(p => p.UserId == pago.UserId && p.Tarjeta == pago.Tarjeta)
                .FirstOrDefaultAsync();

            if (existingPago != null)
            {
                return null; // Ya existe un pago similar
            }

            // Crear nuevo pago
            PagoDA newPago = new PagoDA
            {
                UserId = pago.UserId,
                NameTarjeta = pago.NameTarjeta,
                Ccv = pago.Ccv,
                FechaVencimiento = pago.FechaVencimiento,
                Tarjeta = pago.Tarjeta,
                Price = pago.Price,
                PurchaseDate = pago.PurchaseDate
            };

            // Añadir el objeto pago al contexto
            _context.Pagos.Add(newPago);

            // Guardar los cambios en la base de datos
            await _context.SaveChangesAsync();

            Pago ResultPago = new Pago()
            {
                Id = newPago.Id,
                UserId = newPago.UserId,
                NameTarjeta = newPago.NameTarjeta,
                Ccv = newPago.Ccv,
                FechaVencimiento = newPago.FechaVencimiento,
                Tarjeta = newPago.Tarjeta,
                Price = newPago.Price,
                PurchaseDate = newPago.PurchaseDate
            };

            return ResultPago; // Pago registrado exitosamente
        }*/
    }

}
