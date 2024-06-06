using Cupones.api.DTOs;
using Cupones.BC.Modelos;
using Cupones.BW.Interfaces.BW;
using Microsoft.AspNetCore.Http;
using Microsoft.AspNetCore.Mvc;
using System.Net.Sockets;

namespace Cupones.api.Controllers
{
    [Route("api/[controller]")]
    [ApiController]
    public class CuponClientController : ControllerBase
    {

        private readonly IGestionarCuponClientBW gestionarCuponClientBW;

        public CuponClientController(IGestionarCuponClientBW gestionarCuponClientBW)
        {
            this.gestionarCuponClientBW = gestionarCuponClientBW;
        }


        [HttpGet("{id}")]
        public async Task<IEnumerable<Cupon>> GetAllTicketUser(int id)
        {
            var cuponList = await gestionarCuponClientBW.getUSerCupon(id);

            return cuponList;
           // return MapperTicket.converListTicketDTO(ticketList);
        }

        [HttpPost]
        public async Task<IActionResult> RegisterTicket(CuponClientDTO cuponDTO)
        {
            if (cuponDTO.cupon == null)
            {
                return BadRequest("El objeto Cupon no puede ser nulo.");
            }
            /*
            if (cuponDTO.promociones == null)
            {
                return BadRequest("El array de Promocion no puede ser nulo.");
            }*/

            // Llamar al método para registrar el cupón y las promociones
            bool cuponRegistrado = await gestionarCuponClientBW.RegisterCupon(cuponDTO.cupon, cuponDTO.promociones);

            if (cuponRegistrado)
            {
                return Ok("Cupón registrado correctamente.");
            }
            else
            {
                return StatusCode(500, "Error al registrar el cupón.");
            }
        }
    }
}
