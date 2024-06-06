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

        public Task<string> ObtenerTodosLosCupones()
        {

            return gestionarCuponesBW.getAll();
        }


        [HttpGet("{id}")]

        public Task<string> ObtenerCupon(int id)
        {

            return gestionarCuponesBW.getcupon(id);
        }

        [HttpGet("categorias")]
        public Task<string> ObtenerCategoria()
        {
            return gestionarCuponesBW.getAllCategorias();
        }
    }
}
