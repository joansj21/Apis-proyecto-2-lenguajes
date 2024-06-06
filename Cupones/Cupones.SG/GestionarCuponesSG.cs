using Cupones.BC.Constantes;
using Cupones.BW.Interfaces.SG;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Cupones.SG
{
    public class GestionarCuponesSG : IGestionarCuponesSG
    {

        private readonly HttpClient clienteHttp;

        public GestionarCuponesSG(HttpClient clienteHttp)
        {
            this.clienteHttp = clienteHttp;
        }

        public async Task<string> getAll()
        {
            HttpResponseMessage respuesta = await clienteHttp.GetAsync(URLCuponesConstante.URL);

            if (!respuesta.IsSuccessStatusCode)
                throw new HttpRequestException($"Error en {URLCuponesConstante.URL} al obtener el mensaje");

            return await respuesta.Content.ReadAsStringAsync();
        }

        public async Task<string> getAllCategorias()
        {
            HttpResponseMessage respuesta = await clienteHttp.GetAsync(URLCuponesConstante.URLCategoria);

            if (!respuesta.IsSuccessStatusCode)
                throw new HttpRequestException($"Error en {URLCuponesConstante.URL} al obtener el mensaje");

            return await respuesta.Content.ReadAsStringAsync();
        }

        public async Task<string> getcupon(int id)
        {
            Console.WriteLine(URLCuponesConstante.URL + $"?id={id}");

            HttpResponseMessage respuesta = await clienteHttp.GetAsync(URLCuponesConstante.URL+ $"?id={id}");

            if (!respuesta.IsSuccessStatusCode)
                throw new HttpRequestException($"Error en {URLCuponesConstante.URL} al obtener el mensaje");

            return await respuesta.Content.ReadAsStringAsync();
        }
    }
}
