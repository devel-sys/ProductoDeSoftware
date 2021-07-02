import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';

import { ProyectoCultivoRoutingModule } from './proyecto-cultivo-routing.module';
import { ProyectoCultivoComponent } from './proyecto-cultivo.component';

@NgModule({
  declarations: [
    ProyectoCultivoComponent
  ],
  imports: [
    CommonModule,
    ProyectoCultivoRoutingModule
  ]
})
export class ProyectoCultivoModule { }
