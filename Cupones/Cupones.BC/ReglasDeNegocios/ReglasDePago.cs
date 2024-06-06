using Cupones.BC.Modelos;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Text.RegularExpressions;
using System.Threading.Tasks;

namespace Cupones.BC.ReglasDeNegocios
{
    public class ReglasDePago
    {
        public static (bool, string) ElPagoEsValido(Pago pago)
        {
            if (pago.UserId <= 0)
                return (false, "El ID de usuario no es válido.");

            if (string.IsNullOrWhiteSpace(pago.NameTarjeta))
                return (false, "El nombre en la tarjeta es requerido.");

            if (!EsNumeroTarjetaValido(pago.Tarjeta))
                return (false, "El número de tarjeta debe tener 16 dígitos y ser válido.");

            if (!EsFechaVencimientoValida(pago.FechaVencimiento))
                return (false, "La fecha de expiración debe estar en el formato MM/YY y ser válida.");

            if (!EsCvvValido(pago.Ccv))
                return (false, "El CVV debe tener 3 dígitos.");

            return (true, string.Empty);
        }

        private static bool EsNumeroTarjetaValido(string numeroTarjeta)
        {
            if (string.IsNullOrWhiteSpace(numeroTarjeta) || !Regex.IsMatch(numeroTarjeta, @"^\d{16}$"))
                return false;

            return EsNumeroTarjetaValidoAlgoritmo(numeroTarjeta);
        }

        private static bool EsNumeroTarjetaValidoAlgoritmo(string numeroTarjeta)
        {
            int suma = 0;
            bool debeDuplicarse = false;

            for (int i = numeroTarjeta.Length - 1; i >= 0; i--)
            {
                int digito = int.Parse(numeroTarjeta[i].ToString());

                if (debeDuplicarse)
                {
                    digito *= 2;
                    if (digito > 9)
                    {
                        digito -= 9;
                    }
                }

                suma += digito;
                debeDuplicarse = !debeDuplicarse;
            }

            return suma % 10 == 0;
        }

        private static bool EsFechaVencimientoValida(string fechaVencimiento)
        {
            if (string.IsNullOrWhiteSpace(fechaVencimiento) || !Regex.IsMatch(fechaVencimiento, @"^(0[1-9]|1[0-2])\/\d{2}$"))
                return false;

            var partes = fechaVencimiento.Split('/');
            var fechaExpiracion = new DateTime(int.Parse("20" + partes[1]), int.Parse(partes[0]), 1);

            return fechaExpiracion >= DateTime.Now;
        }

        private static bool EsCvvValido(string cvv)
        {
            return !string.IsNullOrWhiteSpace(cvv) && Regex.IsMatch(cvv, @"^\d{3}$");
        }
    }
}
