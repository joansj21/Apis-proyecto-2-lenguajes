﻿using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Cupones.BW.Interfaces.SG
{
    public interface IGestionarCuponesSG
    {
        Task<string> getAll();
        Task<string> getcupon(int id);
        Task<string> getAllCategorias();
    }
}
