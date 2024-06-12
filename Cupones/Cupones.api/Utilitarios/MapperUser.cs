using Tarea4.api.DTOs;
using Tarea4.BC.Modelos;

namespace Tarea4.api.Utilitarios
{
    public class MapperUser
    {

        public static User mapUSer(UserDTO userDto)
        {
            User user = new User()
            {
                FirstName = userDto.FirstName,
                LastName = userDto.LastName,
                Email = userDto.Email,
                DateOfBirth = userDto.DateOfBirth,
                Password = userDto.Password,
                UserId = userDto.UserId,
                Cedula = userDto.Cedula,

            };

            return user;

        }



        public static UserDTO mapUSerDTO(User user)
        {
            UserDTO userDto = new UserDTO()
            {
                FirstName = user.FirstName,
                LastName = user.LastName,
                Email = user.Email,
                DateOfBirth = user.DateOfBirth,
                Password = user.Password,
                UserId = user.UserId,
                Cedula= user.Cedula,

            };

            return userDto;

        }


    }
}
