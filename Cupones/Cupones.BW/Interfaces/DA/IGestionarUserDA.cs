using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using Tarea4.BC.Modelos;

namespace Tarea4.BW.Interfaces.DA
{
    public interface IGestionarUserDA
    {
        Task<bool> RegisterUser(User user);

        Task<User> getUSer(string mail, string password);
    }
}
