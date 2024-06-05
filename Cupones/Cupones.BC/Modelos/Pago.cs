using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Cupones.BC.Modelos
{
    public class Pago
    {
        public int Id { get; set; }
        public int UserId { get; set; }
        public string NameTarjeta { get; set; }
        public string Ccv { get; set; }
        public string FechaVencimiento { get; set; }
        public string Tarjeta { get; set; }
        public decimal Price { get; set; }
        public DateTime PurchaseDate { get; set; }
    }
}
