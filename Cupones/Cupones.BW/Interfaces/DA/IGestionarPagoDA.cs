using Cupones.BC.Modelos;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using Tarea4.BC.Modelos;

namespace Cupones.BW.Interfaces.DA
{
    public interface IGestionarPagoDA
    {
        Task<Pago> insertPago(Pago pago);
    }
}
