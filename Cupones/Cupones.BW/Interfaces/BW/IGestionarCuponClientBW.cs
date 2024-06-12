using Cupones.BC.Modelos;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Cupones.BW.Interfaces.BW
{
    public interface IGestionarCuponClientBW
    {
        Task<bool> RegisterCupon(Cupon cupon, Promocion[] promociones);

        Task<IEnumerable<Cupon>> getUSerCupon(int idUser,int pago);
    }
}
