using Cupones.BC.Modelos;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Net.Sockets;
using System.Text;
using System.Threading.Tasks;

namespace Cupones.BW.Interfaces.SG
{
    public interface IGestionarMailSG
    {
        Task<bool> sendMail( Pago pago,string correo);
    }
}
