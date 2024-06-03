using Cupones.BW.CU;
using Cupones.BW.Interfaces.BW;
using Cupones.BW.Interfaces.SG;
using Cupones.DA.Contexto;
using Cupones.SG;
using Microsoft.EntityFrameworkCore;
using Tarea4.BW.CU;
using Tarea4.BW.Interfaces.BW;
using Tarea4.BW.Interfaces.DA;
using Tarea4.DA.Acciones;

var builder = WebApplication.CreateBuilder(args);

// Add services to the container.

builder.Services.AddControllers();
// Learn more about configuring Swagger/OpenAPI at https://aka.ms/aspnetcore/swashbuckle
builder.Services.AddEndpointsApiExplorer();
builder.Services.AddSwaggerGen();
builder.Services.AddHttpClient();

//Inyecci�n de dependencias
builder.Services.AddTransient<IGestionarCuponesBW, GestionarCuponesBW>();
builder.Services.AddTransient<IGestionarCuponesSG, GestionarCuponesSG>();

//user
builder.Services.AddTransient<IGestionarUserBW, GestionarUserBW>();
builder.Services.AddTransient<IGestionarUserDA, GestionarUserDA>();

builder.Services.AddDbContext<ProyectoCuponesContexts>(options =>
{
    var connectionsString = "Data Source=JOAN;Initial Catalog=cliente_cupones;Integrated Security=True; TrustServerCertificate=True";
    options.UseSqlServer(connectionsString);
});




var app = builder.Build();
app.UseCors("AllowOrigin");
app.UseCors(options =>
{
    options.AllowAnyOrigin();
    options.AllowAnyMethod();
    options.AllowAnyHeader();
});

// Configure the HTTP request pipeline.
if (app.Environment.IsDevelopment())
{
    app.UseSwagger();
    app.UseSwaggerUI();
}

app.UseAuthorization();

app.MapControllers();

app.Run();
