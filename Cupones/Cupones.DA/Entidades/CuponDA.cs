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
    [Table("cupone")]
    public class CuponDA
    {
        [Key, DatabaseGenerated(DatabaseGeneratedOption.Identity)]
        public int Id { get; set; }

        [Required, MaxLength(100)]
        public string Empresa { get; set; }

        [Required, MaxLength(100)]
        public string Nombre { get; set; }

        [Required, MaxLength(100)]
        public string Ubicacion { get; set; }

        [Required, MaxLength(100)]
        public string Categoria { get; set; }

        [Required]
        public string Precio { get; set; }
        public DateTime fecha_expira { get; set; } = DateTime.Now;
        [Required, MaxLength(500)]
        public string Img { get; set; }

        [Required]
        public int PagoID { get; set; }
        [Required]
        public int idUser { get; set; }

        [ForeignKey("idUser")]
        public UserDA user { get; set; }

        [ForeignKey("PagoID")]
        public PagoDA Pago { get; set; }

        public virtual ICollection<PromocionDA> Promociones { get; set; }
    }
}
