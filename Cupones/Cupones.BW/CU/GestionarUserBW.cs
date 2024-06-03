using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading;
using System.Threading.Tasks;
using Tarea4.BC.Modelos;
using Tarea4.BC.ReglasDeNegocios;
using Tarea4.BW.Interfaces.BW;
using Tarea4.BW.Interfaces.DA;

namespace Tarea4.BW.CU
{
    public class GestionarUserBW : IGestionarUserBW
    {
        private readonly IGestionarUserDA gestionarUserDA;
        public GestionarUserBW(IGestionarUserDA gestionarUserDA)
        {
            this.gestionarUserDA = gestionarUserDA;
        }
        public async Task<User> getUSer(string mail, string password)
        {

            (bool esValido, string mensaje) validacionReglaDeUser = ReglasDeUser.CorreoYContrasenaSonValidos(mail,password);

            if (!validacionReglaDeUser.esValido)
            {
                return null;
            }


            return await gestionarUserDA.getUSer(mail,password);
            
        }

        public async Task<bool> RegisterUser(User user)
        {
            (bool esValido, string mensaje) validacionReglaDeUser = ReglasDeUser.ElUsuarioEsValido(user);

            if (!validacionReglaDeUser.esValido )
            {
                return false;
            }

            return await gestionarUserDA.RegisterUser(user);

        }
    }
}
