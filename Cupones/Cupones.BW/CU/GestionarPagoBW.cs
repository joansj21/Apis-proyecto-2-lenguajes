using Cupones.BC.Modelos;
using Cupones.BC.ReglasDeNegocios;
using Cupones.BW.Interfaces.BW;
using Cupones.BW.Interfaces.DA;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using Tarea4.BC.ReglasDeNegocios;

namespace Cupones.BW.CU
{
    public class GestionarPagoBW : IGestionarPagoBW
    {
        private readonly IGestionarPagoDA gestionarPagoDA;

        public GestionarPagoBW(IGestionarPagoDA gestionarPagoDA) {
            this.gestionarPagoDA = gestionarPagoDA;
                }

        public async Task<IEnumerable<Pago>> getUSerPago(int idUser)
        {
            return await this.gestionarPagoDA.getUSerPago(idUser);
        }

        public async Task<Pago> insertPago(Pago pago)
        {
            (bool esValido, string mensaje) validacionReglaDeUser = ReglasDePago.ElPagoEsValido(pago);

           /* if (!validacionReglaDeUser.esValido)
            {
                return pago= new Pago();
            }*/

           return await this.gestionarPagoDA.insertPago(pago);
        }
    }
}
