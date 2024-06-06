using System;
using System.Collections.Generic;
using System.ComponentModel.DataAnnotations;
using System.ComponentModel.DataAnnotations.Schema;
using System.Linq;
using System.Runtime.InteropServices;
using System.Text;
using System.Threading.Tasks;

namespace Cupones.DA.Entidades
{
    [Table("promocion")]
    public class PromocionDA
    {
        [Key, DatabaseGenerated(DatabaseGeneratedOption.Identity)]
        public int Id { get; set; }

        [Required, MaxLength(100)]
        public string Nombre { get; set; }

        [Required]
        public int CuponID { get; set; }

        [ForeignKey("CuponID")]
        public CuponDA Cupon { get; set; }
    }
}
