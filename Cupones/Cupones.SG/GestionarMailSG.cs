using MailKit.Security;
using Microsoft.Extensions.Configuration;
using MimeKit;
using MimeKit.Text;
using MailKit.Net.Smtp;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Net.Mail;
using System.Text;
using System.Threading.Tasks;
using Tarea4.BC.Modelos;
using Cupones.BW.Interfaces.SG;
using Cupones.BC.Modelos;


namespace Tarea4.SG
{
    public class GestionarMailSG : IGestionarMailSG
    {


        private readonly IConfiguration _configuration;

        public GestionarMailSG()
        {
            var builder = new ConfigurationBuilder()
                .SetBasePath(Directory.GetCurrentDirectory()) // O el path del proyecto .api si es diferente
                .AddJsonFile("appsettings.json", optional: false, reloadOnChange: true);

            _configuration = builder.Build();
        }


       

        public Task<bool> sendMail( Pago pago,string correo)
        {

            try
            {
                var email = new MimeMessage();
                email.From.Add(MailboxAddress.Parse(_configuration["Email:UserName"]));
                email.To.Add(MailboxAddress.Parse(correo));
                email.Subject = "ticket Pago";

                // Construye el cuerpo del correo electrónico con los datos del tiquete
                email.Body = new TextPart(TextFormat.Html)
                {
                    Text = $@"
<html>
<head>
    <title>Tiquete de Reserva</title>
    <style>
        /* Estilos CSS para el tiquete */
        body {{
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
        }}
        .ticket {{
            border: 1px solid #ccc;
            padding: 20px;
            max-width: 400px;
            margin: 0 auto;
            background-color: #fff;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }}
        .ticket h2 {{
            margin-top: 0;
            color: #007bff; /* Azul */
        }}
        .ticket p {{
            margin: 10px 0;
            color: #666;
        }}
        .ticket-info {{
            margin-bottom: 20px;
            padding: 10px;
            background-color: #e6f3ff; /* Azul claro */
            border-radius: 5px;
        }}
        .ticket-info p {{
            margin: 5px 0;
            color: #333;
        }}
    </style>
</head>
<body>
    <div class='ticket'>
        <h2>Tiquete de Reserva</h2>
        <div class='ticket-info'>
            <p><strong>User ID:</strong> {pago.UserId}</p>
            <p><strong>Precio:</strong> {pago.Price}</p>
            <p><strong>Fecha de Compra:</strong> {pago.PurchaseDate}</p>
        </div>
        <p>Gracias por tu compra de cupones.</p>
    </div>
</body>
</html>"
                };


                // Envía el correo electrónico
                using var smtp = new MailKit.Net.Smtp.SmtpClient();
                smtp.Connect(
                    _configuration["Email:Host"],
                    int.Parse(_configuration["Email:Port"]),
                    SecureSocketOptions.StartTls
                );

                smtp.Authenticate(_configuration["Email:UserName"], _configuration["Email:Password"]);
                smtp.Send(email);
                smtp.Disconnect(true);

                return Task.FromResult(true);
            }
            catch (Exception ex)
            {
                // Manejar la excepción
                Console.WriteLine($"Error al enviar el correo electrónico: {ex.Message}");
                return Task.FromResult(false);
            }
        }
    }
}
