using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Cupones.BW.Interfaces.BW
{
    public interface IGestionarCuponesBW
    {
        Task<string> getAll();
    }
}
