using Cupones.DA.Entidades;
using Microsoft.EntityFrameworkCore;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using Tarea4.DA.Entidades;

namespace Cupones.DA.Contexto
{
    public class ProyectoCuponesContexts : DbContext
    {

        public ProyectoCuponesContexts(DbContextOptions options) : base(options) { }

        public DbSet<UserDA> Users { get; set; }
        public DbSet<PagoDA> Pagos { get; set; }
        public DbSet<CuponDA> Cupones { get; set; }
        public DbSet<PromocionDA> Promociones { get; set; }

    }
}
