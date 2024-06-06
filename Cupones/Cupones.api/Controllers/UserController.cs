using Microsoft.AspNetCore.Http;
using Microsoft.AspNetCore.Mvc;
using Tarea4.api.DTOs;
using Tarea4.api.Utilitarios;
using Tarea4.BC.Modelos;
using Tarea4.BW.Interfaces.BW;

namespace Tarea4.api.Controllers
{
    [Route("api/[controller]")]
    [ApiController]
    public class UserController : ControllerBase
    {
        private readonly IGestionarUserBW gestionarUserBW;
        public UserController(IGestionarUserBW gestionarUserBW) {
            this.gestionarUserBW = gestionarUserBW;
        
        }

        
        [HttpGet]
        public async Task<ActionResult<UserDTO>> loginUser([FromQuery] string mail, [FromQuery] string password)
        {
            var user = await gestionarUserBW.getUSer(mail,password);
            if (user == null)
                return NotFound();

            return MapperUser.mapUSerDTO(user);
        }

        [HttpPost]
        public async Task<ActionResult<bool>> resgisterUser(UserDTO userDTO)
        {
           User user = MapperUser.mapUSer(userDTO);

            var result = await gestionarUserBW.RegisterUser(user);


            return result;
        }



    }
}
