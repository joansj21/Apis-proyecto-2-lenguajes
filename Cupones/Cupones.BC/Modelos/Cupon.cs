using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Cupones.BC.Modelos
{
    public class Cupon
    {
        public int Id { get; set; }
        public string Empresa { get; set; }
        public string Nombre { get; set; }
        public string Ubicacion { get; set; }
        public string Categoria { get; set; }
        public string Precio { get; set; }
        public DateTime FechaExpira { get; set; }
        public int PagoID { get; set; }
        public string Img { get; set; }
        public int idUser { get; set; }
        public List<Promocion>? Promociones { get; set; }
    }
}
