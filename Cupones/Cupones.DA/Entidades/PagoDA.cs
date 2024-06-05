using System;
using System.Collections.Generic;
using System.ComponentModel.DataAnnotations;
using System.ComponentModel.DataAnnotations.Schema;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using Tarea4.DA.Entidades;

namespace Cupones.DA.Entidades
{
    [Table("Pago")]
    public class PagoDA
    {

        [Key, DatabaseGenerated(DatabaseGeneratedOption.Identity)]
        public int Id { get; set; }

        [Required]
        public int UserId { get; set; }

        [Required, MaxLength(50)]
        public string NameTarjeta { get; set; }

        [Required, MaxLength(3)]
        public string Ccv { get; set; }

        [Required, MaxLength(50)]
        public string FechaVencimiento { get; set; }

        [Required, MaxLength(50)]
        public string Tarjeta { get; set; }

        [Required]
        public decimal Price { get; set; }

        [Required]
        public DateTime PurchaseDate { get; set; }

        [ForeignKey("UserId")]
        public UserDA User { get; set; }
    }
}
