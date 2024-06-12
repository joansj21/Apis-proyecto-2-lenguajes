using Cupones.api.DTOs;
using Cupones.api.Utilitarios;
using Cupones.BC.Modelos;
using Cupones.BW.Interfaces.BW;
using Microsoft.AspNetCore.Http;
using Microsoft.AspNetCore.Mvc;
using Tarea4.api.DTOs;
using Tarea4.api.Utilitarios;
using Tarea4.BC.Modelos;
using Tarea4.BW.CU;

namespace Cupones.api.Controllers
{
    [Route("api/[controller]")]
    [ApiController]
    public class PagoController : ControllerBase
    {

        private readonly IGestionarPagoBW gestionarPagoBW;

        public PagoController (IGestionarPagoBW gestionarPagoBW)
        {
            this.gestionarPagoBW = gestionarPagoBW;
        }

        [HttpPost]
        public async Task<ActionResult<PagoDTO>> resgisterUser(Pago pago)
        {
           

            var result = await gestionarPagoBW.insertPago(pago);

            

            return MapperPago.mapPagoDTO(result);
        }

        [HttpGet("{idUser}")]
        public async Task<ActionResult<List<Pago>>> GetPagos(int idUser)
        {
            var result = await gestionarPagoBW.getUSerPago(idUser);

            if (result == null || !result.Any())
            {
                return NotFound();
            }

            return Ok(result);
        }

    }
}
