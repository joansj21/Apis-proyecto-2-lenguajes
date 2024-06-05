using Cupones.BC.Modelos;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Cupones.BW.Interfaces.BW
{
    public interface IGestionarPagoBW
    {
        Task<Pago> insertPago(Pago pago);
    }
}
