using Cupones.BW.Interfaces.BW;
using Cupones.BW.Interfaces.SG;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Cupones.BW.CU
{
    public class GestionarCuponesBW : IGestionarCuponesBW
    {

        private readonly IGestionarCuponesSG gestionarCuponesSG;

        public GestionarCuponesBW(IGestionarCuponesSG gestionarCuponesSG)
        {
            this.gestionarCuponesSG = gestionarCuponesSG;
        }


        public Task<string> getAll()
        {
            return gestionarCuponesSG.getAll();
        }

        public Task<string> getAllCategorias()
        {
            return gestionarCuponesSG.getAllCategorias();
        }

        public  Task<string> getcupon(int id)
        {
            return gestionarCuponesSG.getcupon(id);
        }
    }
}
