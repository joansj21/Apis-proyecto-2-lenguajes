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

namespace Cupones.DA.Acciones
{
    public class GestionarPagoDA : IGestionarPagoDA
    {
        private readonly ProyectoCuponesContexts _context;

        public GestionarPagoDA(ProyectoCuponesContexts context)
        {
            _context = context;
        }

        public async Task<Pago> insertPago(Pago pago)
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
        }

    }
}
