using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Text.RegularExpressions;
using System.Threading.Tasks;
using Tarea4.BC.Modelos;

namespace Tarea4.BC.ReglasDeNegocios
{
    public class ReglasDeUser
    {
        public static (bool, string) ElUsuarioEsValido(User user)
        {
            if (user.UserId < 0)
                return (false, "El usuario no es válido debido a que el ID es igual o menor a cero");

            if (string.IsNullOrWhiteSpace(user.FirstName))
                return (false, "El usuario no es válido debido a que el nombre es nulo o está vacío");

            if (string.IsNullOrWhiteSpace(user.LastName))
                return (false, "El usuario no es válido debido a que el apellido es nulo o está vacío");

            if (!EsCorreoValido(user.Email))
                return (false, "El usuario no es válido debido a que el correo electrónico no tiene un formato válido");

            if (string.IsNullOrWhiteSpace(user.Password))
                return (false, "El usuario no es válido debido a que la contraseña está vacía");

            return (true, string.Empty);
        }

        public static (bool, string) CorreoYContrasenaSonValidos(string email, string password)
        {
            if (string.IsNullOrWhiteSpace(email))
                return (false, "El correo electrónico es nulo o está vacío");

            if (!EsCorreoValido(email))
                return (false, "El correo electrónico no tiene un formato válido");

            if (string.IsNullOrWhiteSpace(password))
                return (false, "La contraseña es nula o está vacía");

            return (true, string.Empty);
        }

        private static bool EsCorreoValido(string correo)
        {
            if (string.IsNullOrWhiteSpace(correo))
                return false;

            // Usar una expresión regular para validar el formato del correo electrónico
            string patronCorreo = @"^[^@\s]+@[^@\s]+\.[^@\s]+$";
            return Regex.IsMatch(correo, patronCorreo);
        }

    }
}
