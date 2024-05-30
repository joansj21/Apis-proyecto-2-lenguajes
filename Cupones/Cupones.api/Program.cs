using Cupones.BW.CU;
using Cupones.BW.Interfaces.BW;
using Cupones.BW.Interfaces.SG;
using Cupones.SG;

var builder = WebApplication.CreateBuilder(args);

// Add services to the container.

builder.Services.AddControllers();
// Learn more about configuring Swagger/OpenAPI at https://aka.ms/aspnetcore/swashbuckle
builder.Services.AddEndpointsApiExplorer();
builder.Services.AddSwaggerGen();
builder.Services.AddHttpClient();

//Inyección de dependencias
builder.Services.AddTransient<IGestionarCuponesBW, GestionarCuponesBW>();
builder.Services.AddTransient<IGestionarCuponesSG, GestionarCuponesSG>();


var app = builder.Build();

// Configure the HTTP request pipeline.
if (app.Environment.IsDevelopment())
{
    app.UseSwagger();
    app.UseSwaggerUI();
}

app.UseAuthorization();

app.MapControllers();

app.Run();
