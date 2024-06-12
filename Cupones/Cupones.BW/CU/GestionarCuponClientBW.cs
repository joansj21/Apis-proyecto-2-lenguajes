using Cupones.BC.Modelos;
using Cupones.BW.Interfaces.BW;
using Cupones.BW.Interfaces.DA;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Cupones.BW.CU
{
    public class GestionarCuponClientBW : IGestionarCuponClientBW
    {
        private readonly IGestionarCuponClientDA _client;

        public GestionarCuponClientBW(IGestionarCuponClientDA _client)
        {
            this._client = _client; 
        }
        public async Task<IEnumerable<Cupon>> getUSerCupon(int idUser,int pago)
        {
            return await _client.getUSerCupon(idUser,pago);
        }

        public async Task<bool> RegisterCupon(Cupon cupon, Promocion[] promociones)
        {

            return await _client.RegisterCupon(cupon, promociones);
           
        }
    }
}
