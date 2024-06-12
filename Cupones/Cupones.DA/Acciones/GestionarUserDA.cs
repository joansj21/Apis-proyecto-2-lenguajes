using Cupones.DA.Contexto;
using Microsoft.EntityFrameworkCore;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using Tarea4.BC.Modelos;
using Tarea4.BW.Interfaces.DA;

using Tarea4.DA.Entidades;

namespace Tarea4.DA.Acciones
{
    public class GestionarUserDA : IGestionarUserDA
    {
        private readonly ProyectoCuponesContexts proyectoContext;

        public GestionarUserDA(ProyectoCuponesContexts proyectoContext)
        {
            this.proyectoContext = proyectoContext;
        }
        public async Task<User> getUSer(string email, string password)
        {
            // Buscar usuario por email y contraseña
            var userDA = await proyectoContext.Users
                .Where(u => u.Email == email && u.Password == password)
                .FirstOrDefaultAsync();

            if (userDA != null)
            {
                User user = new User()
                {
                    UserId = userDA.UserId,
                    Email = email,
                    Password = password,
                    DateOfBirth = userDA.DateOfBirth,
                    FirstName = userDA.FirstName,
                    LastName = userDA.LastName,

                };
                return user;
            }

          


            return null;
        }

        public async Task<bool> RegisterUser(User user)
        {
            // Verificar si el email ya está registrado
            var existingUser = await proyectoContext.Users
                .Where(u => u.Email == user.Email)
                .FirstOrDefaultAsync();

            if (existingUser != null)
            {
                return false; // El email ya está registrado
            }

            UserDA userDA = new UserDA()
            {
                UserId = user.UserId,
                Email = user.Email,
                Password = user.Password,
                DateOfBirth = user.DateOfBirth,
                FirstName = user.FirstName,
                LastName = user.LastName,
                Cedula = user.Cedula,

            };


            // Registrar nuevo usuario
            proyectoContext.Users.Add(userDA);
            await proyectoContext.SaveChangesAsync();

            return true; // Usuario registrado exitosamente
        }
    }
}
