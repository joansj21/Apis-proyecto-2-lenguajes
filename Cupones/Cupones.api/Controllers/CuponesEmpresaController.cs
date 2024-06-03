using Cupones.BW.Interfaces.BW;
using Microsoft.AspNetCore.Http;
using Microsoft.AspNetCore.Mvc;

namespace Cupones.api.Controllers
{
    [Route("api/[controller]")]
    [ApiController]
    public class CuponesEmpresaController : ControllerBase
    {

        private readonly IGestionarCuponesBW gestionarCuponesBW;

        public CuponesEmpresaController(IGestionarCuponesBW gestionarCuponesBW)
        {
            this.gestionarCuponesBW = gestionarCuponesBW;
        }
        [HttpGet]

        public Task<string> ObtenerTodosLosPersonajes()
        {

            return gestionarCuponesBW.getAll();
        }


        [HttpGet("{id}")]

        public Task<string> ObtenerTodosLosPersonajes(int id)
        {

            return gestionarCuponesBW.getcupon(id);
        }
    }
}
