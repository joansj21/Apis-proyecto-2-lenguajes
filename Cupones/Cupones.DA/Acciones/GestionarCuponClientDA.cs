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
    public class GestionarCuponClientDA:IGestionarCuponClientDA
    {
        private readonly ProyectoCuponesContexts _context;

        public GestionarCuponClientDA(ProyectoCuponesContexts context)
        {
            _context = context;
        }

      
        public async Task<IEnumerable<Cupon>> getUSerCupon(int idUser,int pago)
        {
            var cuponesDA = await _context.Cupones
      .Include(c => c.Promociones)
      .Where(c => c.idUser == idUser && c.PagoID == pago) // Filtra por ID de usuario y ID de pago
      .ToListAsync();

            var cupones = cuponesDA.Select(c => new Cupon
            {
                // Mapea las propiedades de CuponDA a Cupon
                Id = c.Id,
                Categoria = c.Categoria,
                Empresa = c.Empresa,
                Img = c.Img,
                Nombre = c.Nombre,
                PagoID = c.PagoID,
                Precio = c.Precio,
                Ubicacion = c.Ubicacion,
                FechaExpira = c.fecha_expira,
                idUser = c.idUser,
                // Asigna las promociones asociadas al cupón
                Promociones = c.Promociones.Select(p => new Promocion
                {
                    Id = p.Id,
                    Nombre = p.Nombre
                }).ToList()
            });

            return cupones;
        }

        /* {
             var cuponesDA = await _context.Cupones
                 .Where(c => c.idUser == idUser)
                 .ToListAsync();

             var cupones = cuponesDA.Select(c => new Cupon
             {
                 // Mapea las propiedades de CuponDA a Cupon
                 Id = c.Id,
                 Categoria = c.Categoria,
                 Empresa = c.Empresa,
                 Img = c.Img,
                 Nombre = c.Nombre,
                 PagoID = c.PagoID,
                 Precio = c.Precio,
                 Ubicacion = c.Ubicacion,
                 FechaExpira = c.fecha_expira,
                 idUser = c.idUser
             });

             return cupones;
         }*/

        public async Task<bool> RegisterCupon(Cupon cupon, Promocion[] promociones)
        {
            CuponDA cuponDA = new CuponDA
            {
                // Asignar las propiedades de Cupon a las propiedades correspondientes de CuponDA
                Empresa = cupon.Empresa,
                Nombre = cupon.Nombre,
                Ubicacion = cupon.Ubicacion,
                Categoria = cupon.Categoria,
                Precio = cupon.Precio,
                fecha_expira = cupon.FechaExpira,
                Img = cupon.Img,
                // Asumiendo que el ID de pago y el ID de usuario se mantienen iguales
                PagoID = cupon.PagoID,
                idUser = cupon.idUser
            };

            try
            {
                _context.Cupones.Add(cuponDA);
                await _context.SaveChangesAsync();

                // Verificar si hay promociones para agregar
                if (promociones != null && promociones.Length > 0)
                {
                    // Crear objetos PromocionDA y agregarlos al contexto
                    foreach (var promocion in promociones)
                    {
                        PromocionDA promocionDA = new PromocionDA
                        {
                            Nombre = promocion.Nombre,
                            CuponID = cuponDA.Id // Asignar el ID del cupón recién agregado
                        };

                        _context.Promociones.Add(promocionDA);
                    }

                    await _context.SaveChangesAsync();
                }

                return true;
            }
            catch (Exception)
            {
                // Manejar la excepción según sea necesario
                return false;
            }

        }

     
    }
}
