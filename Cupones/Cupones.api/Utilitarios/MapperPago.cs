using Cupones.api.DTOs;
using Cupones.BC.Modelos;
using Tarea4.api.DTOs;
using Tarea4.BC.Modelos;

namespace Cupones.api.Utilitarios
{
    public class MapperPago
    {

        public static PagoDTO mapPagoDTO(Pago pago)
        {
            PagoDTO pagoResult = new PagoDTO()
            {

                Id = pago.Id,
                UserId = pago.UserId,
            };

            return pagoResult;

        }
    }
}
