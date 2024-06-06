using Cupones.BC.Modelos;

namespace Cupones.api.DTOs
{
    public class CuponClientDTO
    {
        public Cupon cupon { get; set; }
        public Promocion[] promociones { get; set; }
    }
}
