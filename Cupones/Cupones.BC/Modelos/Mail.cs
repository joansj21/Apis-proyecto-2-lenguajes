using System;
using System.Collections.Generic;
using System.Linq;
using System.Net.Sockets;
using System.Text;
using System.Threading.Tasks;

namespace Cupones.BC.Modelos
{
    public class Mail
    {
        public string Para { get; set; } = string.Empty;

        public string Asunto { get; set; } = string.Empty;
        public string Contenido { get; set; } = string.Empty;

        public Pago pago { get; set; }
    }
}
